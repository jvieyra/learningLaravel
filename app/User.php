<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
		use Notifiable;

		/**
		 * The attributes that are mass assignable.
		 *
		 * @var array
		 */
		protected $fillable = [
				'name', 'email', 'password',
		];

		/**
		 * The attributes that should be hidden for arrays.
		 *
		 * @var array
		 */
		protected $hidden = [
				'password', 'remember_token','role'
		];

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
}
