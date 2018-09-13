<?php
namespace App\Repositories;

 use Illuminate\Support\Facades\Cache;

 class CacheMessages implements MessagesInterface {

 	protected $messages;

 	public function __construct(Messages $messages){
 		$this->messages = $messages;
 	}

 	public function getPaginated(){
 		$key = "messages.page.". request('page',1);
		return Cache::rememberForever($key,function(){
			//decorador
			return $this->messages->getPaginated();
		});
 	}

 	public function store($request){
 		//decorador
 		$messages = $this->messages->store($request);
 		Cache::flush();
 		return $messages;
 	}

 	public function findById($id){
 		return Cache::rememberForever("messages.{$id}", function() use($id){
				return $message = $this->messages->findById($id);
			});
 	}

 	public function update($request, $id){
 		$message = $this->message->update($request,$id);
 		Cache::flush();
 	}

 	public function destroy($id){

 	}
 }