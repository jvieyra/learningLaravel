<?php

namespace App\Http\Controllers;

use DB;
use App\Message;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MessagesController extends Controller{

	public function __construct(){
		$this->middleware('auth',['except'=>['create','store']]);
	}

	public function index(){
		$messages = Message::all();
		
		return view('messages.index',compact('messages'));
	}

	public function create(){
		return view('messages.create');
	}

	public function store(Request $request){
		$message = Message::create($request->all());
		$message->user_id = auth()->id();
		$message->save();
		return redirect()
				->route('mensajes.create')
				->with('info','Hemos recibido tu mensaje');
	}

	public function show($id){
		$message = Message::findOrFail($id);
		return view('messages.show',compact('message'));
	}

	public function edit($id){
		$message = Message::findOrFail($id);
		return view('messages.edit',compact('message'));
	}

	public function update(Request $request, $id){
		$message = Message::findOrFail($id);
		$message->update($request->all());
		return redirect()->route('mensajes.index');
	}

	public function destroy($id){
		$message = Message::findOrFail($id)->delete();
		return redirect()->route('mensajes.index');
	}
}
