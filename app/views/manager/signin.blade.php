@extends('layouts.manager-clean')

@section('body')
<div class="container" style="max-width: 400px;">
	{{ Form::open(array('url'=>'manager/login')) }}
 
	        @if ($errors->has('login'))
	                <div class="alert alert-error">{{ $errors->first('login', ':message') }}</div>
	        @endif

			<div class="form-group">
				{{ Form::label('email', 'Correo Electrónico') }}
				{{ Form::text('email', ( ( isset($user_frm) ) ? $user_frm->email : '' ), array('class'=>'form-control', 'placeholder'=>'Correo Electrónico')) }}
			</div>
			<div class="form-group">
				{{ Form::label('password', 'Contraseña') }}
				{{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Contraseña')) }}
			</div>

			<div class="clearfix">
				{{ Form::submit('Acceder', array('class'=>'btn btn-primary pull-right')) }}
			</div>

	{{ Form::close() }}
</div>
@stop