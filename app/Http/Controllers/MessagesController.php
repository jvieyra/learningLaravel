<?php

namespace App\Http\Controllers;

use DB;
use Mail;
use App\Message;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Events\MessageWasReceived;

class MessagesController extends Controller{

	public function __construct(){
		$this->middleware('auth',['except'=>['create','store']]);
	}

	public function index(){
		$key = "messages.page.". request('page',1);
		$messages = Cache::rememberForever($key,function(){
			return Message::with(['user','note','tags'])
		 							->orderBy('created_at',request('sorted','DESC'))
		 							->paginate(10);
		});
								
		
		return view('messages.index',compact('messages'));
	}

	public function create(){
		return view('messages.create');
	}

	public function store(Request $request){
		//dd($request->all());
		$message = Message::create($request->all());
		$message->user_id = auth()->id();
		$message->save();


		Cache::flush();
		//event
		//event(class(constructor))
		event(new MessageWasReceived($message));

		//enviar correo 
		//Mail::send('La vista','Arreglo con variables para pasar a la vista','Funcion anonima ($message)')
		// Mail::send('emails.contact',['msg' => $message],function($m) use($message){
		// 	//dd($message);
		// 	$m->to($message->email, $message->name)
		// 		->subject('Tu mensaje fue recibido');
		// });

		return redirect()
				->route('mensajes.create')
				->with('info','Hemos recibido tu mensaje');
	}

	public function show($id){

		$message = Cache::rememberForever("messages.{$id}", function() use($id){
			return $message = Message::findOrFail($id);
		});
		
		return view('messages.show',compact('message'));
	}

	public function edit($id){
		$message = Cache::rememberForever("messages.{$id}", function() use($id){
			return $message = Message::findOrFail($id);
		});
		return view('messages.edit',compact('message'));
	}

	public function update(Request $request, $id){
		$message = Message::findOrFail($id);
		$message->update($request->all());

		Cache::flush();
		return redirect()->route('mensajes.index');
	}

	public function destroy($id){
		$message = Message::findOrFail($id)->delete();
		Cache::flush();
		return redirect()->route('mensajes.index');
	}
}
