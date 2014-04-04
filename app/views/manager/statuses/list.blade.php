@extends('layouts.manager')

@section('body')
	<div class="clearfix" align="right">
		{{ link_to('manager/status', 'Nuevo Estado', array('class' => 'btn btn-primary')) }}
	</div>

	<ol class="breadcrumb">
		<li>{{ link_to('manager', 'Inicio') }}</li>
		<li class="active">Estados</li>
	</ol>

	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="table-responsive">
					<table class="table table-hover">
						<tr>
							<th>#</th>
							<th>Título</th>
							<th>Descripción</th>
							<th>Estado</th>
							<th>Acciones</th>
						</tr>
						@foreach ($statuses as $kStatus => $status)
						<?php
						if(isset($status_frm)){
							$rowSelect = ($status->id == $status_frm->id) ? true : false;
						}else $rowSelect = false;
						?>
						@if($rowSelect)
						<tr class="warning">
						@else
						<tr class="{{ ($status->status) ? 'success' : 'danger' }}">
						@endif
							<td>{{ $status->id }}</td>
							<td>{{ $status->title }}</td>
							<td>{{ $status->description }}</td>
							<td>
								@if($status->status)
									<span class="glyphicon glyphicon-ok-circle text-success" style="font-size: 20px"></span>
								@else
									<span class="glyphicon glyphicon-remove-circle text-danger" style="font-size: 20px"></span>
								@endif
							</td>
							<td>
								@if($status->id != 1)
								<a href="{{ url('manager/status/edit/'.$status->id) }}" class="btn btn-default">
									<span class="glyphicon glyphicon-pencil"></span>
								</a>
								<a href="javascript: $('#optConfirmTrash_{{$status->id}}').show();" class="btn btn-default">
									<span class="glyphicon glyphicon-trash"></span>
								</a>
								<div id="optConfirmTrash_{{$status->id}}" style="display: none; position: absolute; margin-top: 2px;">
									<a href="{{ url('manager/processStatus/delete/'.$status->id) }}" class="btn btn-success">
										<span class="glyphicon glyphicon-ok"></span>
									</a>
									<a href="javascript: $('#optConfirmTrash_{{$status->id}}').hide();" class="btn btn-danger">
										<span class="glyphicon glyphicon-remove"></span>
									</a>
								</div>
								@endif
							</td>
						</tr>
						@endforeach
					</table>
				</div>
			</div>
			<div class="col-md-4">
				<div class="well">
					{{ Form::open(array('url' => 'manager/processStatus' . ( ( isset($params_selected) ) ? '/edit/'.$params_selected['id'] : '' ), 'role'=>'form')) }}
					<div class="form-group">
						{{ Form::label('title', 'Título') }}
						{{ Form::text('title', ( ( isset($status_frm) ) ? $status_frm->title : '' ), array('class'=>'form-control', 'placeholder'=>'Título')) }}
					</div>
					<div class="form-group">
						{{ Form::label('description', 'Descripción') }}
						{{ Form::text('description', ( ( isset($status_frm) ) ? $status_frm->description : '' ), array('class'=>'form-control', 'placeholder'=>'Descripción')) }}
					</div>
					<div class="checkbox">
						<label>
							{{ Form::checkbox('status', true, ( ( isset($status_frm) ) ? $status_frm->status : true )) }} Estado
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