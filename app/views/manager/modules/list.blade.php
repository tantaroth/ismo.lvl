@extends('layouts.manager')

@section('body')
	<div class="clearfix" align="right">
		{{ link_to('manager/status', 'Nuevo Estado', array('class' => 'btn btn-default')) }}
		{{ link_to('manager/module', 'Nuevo Módulo', array('class' => 'btn btn-primary')) }}
	</div>

	<ol class="breadcrumb">
		<li>{{ link_to('manager', 'Inicio') }}</li>
		<li class="active">Módulos</li>
	</ol>

	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="table-responsive">
					<table width="100%" class="table table-striped">
						<tr>
							<th>#</th>
							<th>Nombre</th>
							<th>Título</th>
							<th>Descripción</th>
							<th>Estado</th>
							<th>Acciones</th>
						</tr>
						@foreach ($modules as $kModule => $module)
						<?php
						if(isset($module_frm)){
							$rowSelect = ($module->id == $module_frm->id) ? true : false;
						}else $rowSelect = false;
						?>
						@if($rowSelect)
						<tr class="warning">
						@else
						<tr>
						@endif
							<td>{{ $module->id }}</td>
							<td>{{ $module->name }}</td>
							<td>{{ $module->title }}</td>
							<td>{{ $module->description }}</td>
							<td>
								<?php $status = Statuses::find($module->statuses_id);?>
								{{ $status->title }}
							</td>
							<td>
								<a href="{{ url('manager/module/edit/'.$module->id) }}" class="btn btn-default">
									<span class="glyphicon glyphicon-pencil"></span>
								</a>
								<a href="javascript: $('#optConfirmTrash_{{$module->id}}').show();" class="btn btn-default">
									<span class="glyphicon glyphicon-trash"></span>
								</a>
								<div id="optConfirmTrash_{{$module->id}}" style="display: none; position: absolute; margin-top:2px;">
									<a href="{{ url('manager/processModule/delete/'.$module->id) }}" class="btn btn-success">
										<span class="glyphicon glyphicon-ok"></span>
									</a>
									<a href="javascript: $('#optConfirmTrash_{{$module->id}}').hide();" class="btn btn-danger">
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
					{{ Form::open(array('url' => 'manager/processModule' . ( ( isset($params_selected) ) ? '/edit/'.$params_selected['id'] : '' ), 'role'=>'form')) }}
					<div class="form-group">
						{{ Form::label('title', 'Título') }}
						{{ Form::text('title', ( ( isset($module_frm) ) ? $module_frm->title : '' ), array('class'=>'form-control', 'placeholder'=>'Título')) }}
					</div>
					<div class="form-group">
						{{ Form::label('description', 'Descripción') }}
						{{ Form::textarea('description', ( ( isset($module_frm) ) ? $module_frm->description : '' ), array('class'=>'form-control', 'placeholder'=>'Descripción')) }}
					</div>
					<div class="form-group">
						{{ Form::label('status', 'Estado') }}
						{{ Form::select('status', $statuses, ( ( isset($module_frm) ) ? $module_frm->statuses_id : '' ), array('class'=>'form-control')) }}
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