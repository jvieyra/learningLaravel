<?php 
namespace App\Repositories;

use App\Message;
use Illuminate\Support\Facades\Cache;

class Messages implements MessagesInterface {

	public function getPaginated(){
		 Message::with(['user','note','tags'])
	 							->orderBy('created_at',request('sorted','DESC'))
	 							->paginate(10);
	}

	public function store($request){
		$message =  Message::create($request->all());
		$message->user_id = auth()->id();
		$message->save();
		return $message;
	}

	public function findById($id){ 
		return $message = Message::findOrFail($id);
	}

	public function update($request, $id){

		$message = Message::findOrFail($id)->update($request->all());
		return  $message;
	}

	public function destroy($id){
		Cache::flush();
		return Message::findOrFail($id)->delete();
	}

}

