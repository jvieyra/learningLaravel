<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateUserRequest;

class UsersController extends Controller{

		public function __construct(){
			$this->middleware('auth',['except'=>['show']]);
			/*pasar parametros al middleware*/
			$this->middleware('roles:admin',['except'=>['edit','update','show']]);
		}

		public function index(){
			$users = \App\User::all();
			return view('users.index',compact('users'));
		}

		/**
		 * Show the form for creating a new resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function create()
		{
				//
		}

		/**
		 * Store a newly created resource in storage.
		 *
		 * @param  \Illuminate\Http\Request  $request
		 * @return \Illuminate\Http\Response
		 */
		public function store(Request $request)
		{
				//
		}

		/**
		 * Display the specified resource.
		 *
		 * @param  int  $id
		 * @return \Illuminate\Http\Response
		 */
		public function show($id)
		{
				$user = User::findOrFail($id);

				return view('users.show',compact('user'));
		}

		/**
		 * Show the form for editing the specified resource.
		 *
		 * @param  int  $id
		 * @return \Illuminate\Http\Response
		 */
		public function edit($id)
		{
			$user = User::findOrFail($id);

			/*policy*/
			$this->authorize('edit',$user);
			return view('users.edit',compact('user'));
		}

		/**
		 * Update the specified resource in storage.
		 *
		 * @param  \Illuminate\Http\Request  $request
		 * @param  int  $id
		 * @return \Illuminate\Http\Response
		 */
		public function update(UpdateUserRequest $request, $id)
		{
			$user = User::findOrFail($id);
			$this->authorize('update',$user);
			$user->update($request->all());
			return back()->with('info','Usuario Actualizado');
		}

		/**
		 * Remove the specified resource from storage.
		 *
		 * @param  int  $id
		 * @return \Illuminate\Http\Response
		 */
		public function destroy($id){
			$user = User::findOrFail($id);
			$this->authorize('destroy',$user);
			$user->delete();
			return back();
		}
}