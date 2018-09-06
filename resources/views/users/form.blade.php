		{!! csrf_field() !!}
		<div class="form-group">
			<label for="nombre">Nombre</label>
			<input class="form-control" type="text" name="name" value="{{ $user->name or old('name')}}">
			{!! $errors->first(
				'name',
				'<span class=error>:message</span>') 
			!!}
			<p></p>
		</div>
		
		<div class="form-group">
			<label for="email">Email </label>
			<input class="form-control" type="text" name="email" value="{{ $user->email or old('email') }}">
			{!! $errors->first('email','<span class=error>:message</span>') !!}
			<p></p>
		</div>

		@unless($user->id)
			<div class="form-group">
				<label for="nombre">Password</label>
				<input class="form-control" type="password" name="password">
				{!! $errors->first(
					'password',
					'<span class=error>:message</span>') 
				!!}
				<p></p>
			</div>
			<div class="form-group">
				<label for="nombre">Confirmacion de password</label>
				<input class="form-control" type="password" name="password_confirmation">
				{!! $errors->first(
					'password_confirmation',
					'<span class=error>:message</span>') 
				!!}
				<p></p>
			</div>
		@endunless
		
		@foreach($roles as $id => $name)
			<div class="form-group">
		    <div class="form-check">
		      <input class="form-check-input" 
		      			 type="checkbox" 
		      			 value="{{ $id }}" 
		      			 name="roles[]" 
		      			 id="invalidCheck2"
		      			 {{ $user->roles->pluck('id')->contains($id) ? 'checked':'' }}>
		      <label class="form-check-label" for="invalidCheck2">
		       {{ $name }}
		      </label>
		    </div>
  		</div>
		@endforeach
		{!! $errors->first(
				'roles',
				'<span class=error>:message</span>') 
			!!}
		<hr>
