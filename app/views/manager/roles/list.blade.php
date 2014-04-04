@extends('layouts.manager')

@section('body')
	<div class="clearfix" align="right">
		{{ link_to('manager/role', 'Nuevo Rol', array('class' => 'btn btn-primary')) }}
	</div>

	<ol class="breadcrumb">
		<li>{{ link_to('manager', 'Inicio') }}</li>
		<li>{{ link_to('manager/user', 'Usuarios') }}</li>
		<li class="active">Roles</li>
	</ol>
	
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="table-responsive">
					<table width="100%" class="table table-striped">
						<tr>
							<th>#</th>
							<th>Imágen</th>
							<th>Título</th>
							<th>Estado</th>
							<th>Permisos</th>
							<th>Acciones</th>
						</tr>
						@foreach ($roles as $kRole => $role)
						<?php
						if(isset($role_frm)){
							$rowSelect = ($role->id == $role_frm->id) ? true : false;
						}else $rowSelect = false;
						?>
						@if($rowSelect)
						<tr class="warning">
						@else
						<tr>
						@endif
							<td>{{ $role->id }}</td>
							<td><img src="{{ asset('img/bg_transparent.png') }}" class="img-rounded" alt="{{ $role->title }}" style="width: 60px; height: 60px; background-color: #E9E9E9; background-image: url(data:image/{{$role->image_ext}};base64,{{$role->image}}); background-repeat:  no-repeat; background-size: 50px auto; background-position: center;"></td>
							<td>{{ $role->title }}</td>
							<td>
								<?php $status = Statuses::find($role->statuses_id);?>
								{{ $status->title }}
							</td>
							<td>
								<div class="clearfix">
									<?php $leveExp = explode('-', $role->level) ?>
									<div class="pull-left" style="padding: 5px;">
										<b title="Consulta">Co</b><br>{{ Form::checkbox('consult', ( ($leveExp[0]) ? true : '0' ), ( ($leveExp[0]) ? true : false ), array('disabled'=>true)) }}
									</div>
									<div class="pull-left" style="padding: 5px;">
										<b title="Inserción">In</b><br>{{ Form::checkbox('consult', ( ($leveExp[1]) ? true : '0' ), ( ($leveExp[1]) ? true : false ), array('disabled'=>true)) }}
									</div>
									<div class="pull-left" style="padding: 5px;">
										<b title="Edición">Ed</b><br>{{ Form::checkbox('consult', ( ($leveExp[2]) ? true : '0' ), ( ($leveExp[2]) ? true : false ), array('disabled'=>true)) }}
									</div>
									<div class="pull-left" style="padding: 5px;">
										<b title="Eliminación">El</b><br>{{ Form::checkbox('consult', ( ($leveExp[3]) ? true : '0' ), ( ($leveExp[3]) ? true : false ), array('disabled'=>true)) }}
									</div>
								</div>
							</td>
							<td>
								<a href="{{ url('manager/role/edit/'.$role->id) }}" class="btn btn-default">
									<span class="glyphicon glyphicon-pencil"></span>
								</a>
								<a href="javascript: $('#optConfirmTrash_{{$role->id}}').show();" class="btn btn-default">
									<span class="glyphicon glyphicon-trash"></span>
								</a>
								<div id="optConfirmTrash_{{$role->id}}" style="display: none; position: absolute; margin-top:2px;">
									<a href="{{ url('manager/processrole/delete/'.$role->id) }}" class="btn btn-success">
										<span class="glyphicon glyphicon-ok"></span>
									</a>
									<a href="javascript: $('#optConfirmTrash_{{$role->id}}').hide();" class="btn btn-danger">
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
					{{ Form::open(array('url' => 'manager/processrole' . ( ( isset($params_selected) ) ? '/edit/'.$params_selected['id'] : '' ), 'role'=>'form', 'files'=> true)) }}
					<div class="form-group">
						{{ Form::label('image', 'Imágen') }}
						{{ Form::file('image') }}
					</div>
					<div class="form-group">
						{{ Form::label('title', 'Título') }}
						{{ Form::text('title', ( ( isset($role_frm) ) ? $role_frm->title : '' ), array('class'=>'form-control', 'placeholder'=>'Título')) }}
					</div>
					<div class="form-group">
						{{ Form::label('description', 'Descripción') }}
						{{ Form::textarea('description', ( ( isset($role_frm) ) ? $role_frm->description : '' ), array('class'=>'form-control', 'placeholder'=>'Descripción')) }}
					</div>
					<div class="form-group">
						{{ Form::label('status', 'Estado') }}
						{{ Form::select('status', $statuses, ( ( isset($role_frm) ) ? $role_frm->statuses_id : '' ), array('class'=>'form-control')) }}
					</div>
					<?php
						if (isset($role_frm)) {
							$leveExp = explode('-', $role_frm->level);
							$consult_lv = $leveExp[0];
							$insert_lv = $leveExp[1];
							$edit_lv = $leveExp[2];
							$delete_lv = $leveExp[3];
						}else{
							$consult_lv = 1;
							$insert_lv = 1;
							$edit_lv = 1;
							$delete_lv = 1;
						}
					?>
					<div class="checkbox">
						<label>
							{{ Form::checkbox('consult', true, $consult_lv) }} Consulta
						</label>
					</div>
					<div class="checkbox">
						<label>
							{{ Form::checkbox('insert', true, $insert_lv) }} Inserción
						</label>
					</div>
					<div class="checkbox">
						<label>
							{{ Form::checkbox('edit', true, $edit_lv) }} Edición
						</label>
					</div>
					<div class="checkbox">
						<label>
							{{ Form::checkbox('delete', true, $delete_lv) }} Eliminación
						</label>
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