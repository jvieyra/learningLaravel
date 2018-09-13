<?php

namespace App\Http\Controllers;

use DB;
use Mail;
use App\Message;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Repositories\Messages;
use App\Events\MessageWasReceived;
use App\Repositories\CacheMessages;
use Illuminate\Support\Facades\Cache;
use App\Repositories\MessagesInterface;


class MessagesController extends Controller{

	protected $messages;
	
	public function __construct(MessagesInterface $messages){
		$this->messages = $messages;
		$this->middleware('auth',['except'=>['create','store']]);
	}

	public function index(){
		$messages = $this->messages->getPaginated();
		return view('messages.index',compact('messages'));
	}

	public function create(){
		return view('messages.create');
	}

	public function store(Request $request){
		//dd($request->all());
		$message = $this->messages->store($request );
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
		$message = $this->messages->findById($id);
		return view('messages.show',compact('message'));
	}

	public function edit($id){
		$message = $this->messages->findById($id);
		return view('messages.edit',compact('message'));
	}

	public function update(Request $request, $id){
		$message = $this->messages->update($request, $id);
		return redirect()->route('mensajes.index');
	}

	public function destroy($id){
		$this->messages->destroy($id);
		return redirect()->route('mensajes.index');
	}
}
