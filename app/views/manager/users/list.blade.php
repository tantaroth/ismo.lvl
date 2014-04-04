@extends('layouts.manager')

@section('body')
	<div class="clearfix" align="right">
		{{ link_to('manager/role', 'Nuevo Rol', array('class' => 'btn btn-default')) }}
		{{ link_to('manager/user', 'Nuevo Usuario', array('class' => 'btn btn-primary')) }}
	</div>

	<ol class="breadcrumb">
		<li>{{ link_to('manager', 'Inicio') }}</li>
		<li class="active">Usuarios</li>
	</ol>

	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="table-responsive">
					<table width="100%" class="table table-striped">
						<tr>
							<th>#</th>
							<th>Rol</th>
							<th>Foto</th>
							<th>Nombre</th>
							<th>Apellidos</th>
							<th>Correo Electrónico</th>
							<th>Estado</th>
							<th>Acciones</th>
						</tr>
						@foreach ($users as $kuser => $user)
						<?php
						if(isset($user_frm)){
							$rowSelect = ($user->id == $user_frm->id) ? true : false;
						}else $rowSelect = false;
						?>
						@if($rowSelect)
						<tr class="warning">
						@else
						<tr>
						@endif
							<td>{{ $user->id }}</td>
							<td>
								<?php $role = Roles::find($user->roles_id);?>
								{{ $role->title }}
							</td>
							<td><img src="{{ asset('img/bg_transparent.png') }}" class="img-rounded" alt="{{ $user->title }}" style="width: 60px; height: 60px; background-color: #E9E9E9; background-image: url(data:image/{{$user->image_ext}};base64,{{$user->image}}); background-repeat:  no-repeat; background-size: 50px auto; background-position: center;"></td>
							<td>{{ $user->fname }}</td>
							<td>{{ $user->lname }}</td>
							<td>{{ $user->email }}</td>
							<td>
								<?php $status = Statuses::find($user->statuses_id);?>
								{{ $status->title }}
							</td>
							<td>
								<a href="{{ url('manager/user/edit/'.$user->id) }}" class="btn btn-default">
									<span class="glyphicon glyphicon-pencil"></span>
								</a>
								<a href="javascript: $('#optConfirmTrash_{{$user->id}}').show();" class="btn btn-default">
									<span class="glyphicon glyphicon-trash"></span>
								</a>
								<div id="optConfirmTrash_{{$user->id}}" style="display: none; position: absolute; margin-top:2px;">
									<a href="{{ url('manager/processuser/delete/'.$user->id) }}" class="btn btn-success">
										<span class="glyphicon glyphicon-ok"></span>
									</a>
									<a href="javascript: $('#optConfirmTrash_{{$user->id}}').hide();" class="btn btn-danger">
										<span class="glyphicon glyphicon-remove"></span>
									</a>
								</div>
							</td>
						</tr>
						@endforeach
					</table>
				</div>
			</div>
			<div class="col-md-4">
				<div class="well">
					{{ Form::open(array('url' => 'manager/processuser' . ( ( isset($params_selected) ) ? '/edit/'.$params_selected['id'] : '' ), 'user'=>'form', 'files'=> true)) }}
					<div class="form-group">
						{{ Form::label('role', 'Rol') }}
						{{ Form::select('role', $roles, ( ( isset($user_frm) ) ? $user_frm->roles_id : '' ), array('class'=>'form-control')) }}
					</div>
					<div class="form-group">
						{{ Form::label('image', 'Foto') }}
						{{ Form::file('image') }}
					</div>
					<div class="form-group">
						{{ Form::label('fname', 'Nombre') }}
						{{ Form::text('fname', ( ( isset($user_frm) ) ? $user_frm->fname : '' ), array('class'=>'form-control', 'placeholder'=>'Nombre')) }}
					</div>
					<div class="form-group">
						{{ Form::label('lname', 'Apellidos') }}
						{{ Form::text('lname', ( ( isset($user_frm) ) ? $user_frm->lname : '' ), array('class'=>'form-control', 'placeholder'=>'Apellidos')) }}
					</div>
					<div class="form-group">
						{{ Form::label('company', 'Empresa') }}
						{{ Form::text('company', ( ( isset($user_frm) ) ? $user_frm->company : '' ), array('class'=>'form-control', 'placeholder'=>'Compañia')) }}
					</div>
					<div class="form-group">
						{{ Form::label('phone', 'Teléfono') }}
						{{ Form::text('phone', ( ( isset($user_frm) ) ? $user_frm->phone : '' ), array('class'=>'form-control', 'placeholder'=>'Teléfono')) }}
					</div>
					<div class="form-group">
						{{ Form::label('email', 'Correo Electrónico') }}
						{{ Form::text('email', ( ( isset($user_frm) ) ? $user_frm->email : '' ), array('class'=>'form-control', 'placeholder'=>'Correo Electrónico')) }}
					</div>
					<div class="form-group">
						{{ Form::label('password', 'Contraseña') }}
						{{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Contraseña')) }}
					</div>
					<div class="form-group">
						{{ Form::label('password', 'Repite Contraseña') }}
						{{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Repite Contraseña')) }}
					</div>
					<div class="form-group">
						{{ Form::label('status', 'Estado') }}
						{{ Form::select('status', $statuses, ( ( isset($user_frm) ) ? $user_frm->statuses_id : '' ), array('class'=>'form-control')) }}
					</div>
					<div class="clearfix">
						{{ Form::submit('Aplicar', array('class'=>'btn btn-primary pull-right')) }}
					</div>
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@stop