<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable{
		use Notifiable;

		protected $fillable = [
				'name', 'email', 'password',
		];

		protected $hidden = [
				'password', 'remember_token','role'
		];

		//un mutador, para guardar un atributo especifico, con funcionalidad siempre.
		public function setPasswordAttribute($password){
			$this->attributes['password'] = bcrypt($password);
		}

		public function roles(){

			return $this->belongsToMany(Role::class,'assigned_roles');
		}
		

		//valida si tiene algun rol
		public function hasRoles(array $roles){

			foreach ($roles as $role) {
				return $this->roles->pluck('name')->intersect($roles)->count(); 
			}

			return false;
			
		}

		public function isAdmin(){
			return $this->hasRoles(['admin']);
		}


		public function messages(){
			//un usuario puede tener varios mensajes.,
			return $this->hasMany(Message::class);
		}

		//padre, relaciones polimorficas hasOne
	  public function note(){
	  	return $this->morphOne(Note::class,'notable');
	  }

	  //relaciones polimorficas
	  public function tags(){
	    return $this->morphToMany(Tag::class,'taggable')->withTimestamps();
	  }


}
