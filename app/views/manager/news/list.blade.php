@extends('layouts.manager')

@section('body')
	<div class="clearfix" align="right">
		{{ link_to('manager/status', 'Nuevo Estado', array('class' => 'btn btn-default')) }}
		{{ link_to('manager/module', 'Nuevo Módulo', array('class' => 'btn btn-default')) }}
		{{ link_to('manager/new', 'Nueva Noticia', array('class' => 'btn btn-primary')) }}
	</div>

	<ol class="breadcrumb">
		<li>{{ link_to('manager', 'Inicio') }}</li>
		<li class="active">Noticias</li>
	</ol>
	
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="table-responsive">
					<table width="100%" class="table table-striped">
						<tr>
							<th>#</th>
							<th>Módulo</th>
							<th>Imágen</th>
							<th>Título</th>
							<th>Estado</th>
							<th>Acciones</th>
						</tr>
						@foreach ($news as $knew => $new)
						<?php
						if(isset($new_frm)){
							$rowSelect = ($new->id == $new_frm->id) ? true : false;
						}else $rowSelect = false;
						?>
						@if($rowSelect)
						<tr class="warning">
						@else
						<tr>
						@endif
							<td>{{ $new->id }}</td>
							<td>
								<?php $module = Modules::find($new->modules_id);?>
								{{ $module->title }}
							</td>
							<td><img src="{{ asset('img/bg_transparent.png') }}" class="img-rounded" alt="{{ $new->title }}" style="width: 60px; height: 60px; background-color: #E9E9E9; background-image: url(data:image/{{$new->image_ext}};base64,{{$new->image}}); background-repeat:  no-repeat; background-size: 50px auto; background-position: center;"></td>
							<td>{{ $new->title }}</td>
							<td>
								<?php $status = Statuses::find($new->statuses_id);?>
								{{ $status->title }}
							</td>
							<td>
								<a href="{{ url('manager/new/edit/'.$new->id) }}" class="btn btn-default">
									<span class="glyphicon glyphicon-pencil"></span>
								</a>
								<a href="javascript: $('#optConfirmTrash_{{$new->id}}').show();" class="btn btn-default">
									<span class="glyphicon glyphicon-trash"></span>
								</a>
								<div id="optConfirmTrash_{{$new->id}}" style="display: none; position: absolute; margin-top:2px;">
									<a href="{{ url('manager/processnew/delete/'.$new->id) }}" class="btn btn-success">
										<span class="glyphicon glyphicon-ok"></span>
									</a>
									<a href="javascript: $('#optConfirmTrash_{{$new->id}}').hide();" class="btn btn-danger">
										<span class="glyphicon glyphicon-remove"></span>
									</a>
								</div>
							</td>
						</tr>
						@endforeach
					</table>
				</div>
			</div>
			<div class="col-md-6">
				<div class="well">
					{{ Form::open(array('url' => 'manager/processnew' . ( ( isset($params_selected) ) ? '/edit/'.$params_selected['id'] : '' ), 'new'=>'form', 'files'=> true)) }}
					<div class="form-group">
						{{ Form::label('module', 'Módulo') }}
						{{ Form::select('module', $modules, ( ( isset($new_frm) ) ? $new_frm->modules_id : '' ), array('class'=>'form-control')) }}
					</div>
					<div class="form-group">
						{{ Form::label('image', 'Imágen') }}
						{{ Form::file('image') }}
					</div>
					<div class="checkbox">
						<label>
							{{ Form::checkbox('started', true, ( ( isset($new_frm) ) ? $new_frm->started : false )) }} Destacada
						</label>
					</div>
					<div class="form-group">
						{{ Form::label('name', 'Nombre') }}
						{{ Form::text('name', ( ( isset($new_frm) ) ? $new_frm->name : '' ), array('class'=>'form-control', 'placeholder'=>'Nombre')) }}
					</div>
					<div class="form-group">
						{{ Form::label('title', 'Título') }}
						{{ Form::text('title', ( ( isset($new_frm) ) ? $new_frm->title : '' ), array('class'=>'form-control', 'placeholder'=>'Título')) }}
					</div>
					<div class="form-group">
						{{ Form::label('description', 'Descripción') }}
						{{ Form::textarea('description', ( ( isset($new_frm) ) ? $new_frm->description : '' ), array('class'=>'form-control', 'placeholder'=>'Descripción')) }}
					</div>
					<div class="form-group">
						{{ Form::label('body', 'Cuerpo') }}
						{{ Form::textarea('body', ( ( isset($new_frm) ) ? $new_frm->body : '' ), array('class'=>'form-control tinymce', 'placeholder'=>'Cuerpo')) }}
					</div>
					<div class="form-group">
						{{ Form::label('container', 'Contenedor') }}
						{{ Form::text('container', ( ( isset($content_frm) ) ? $content_frm->container : 0 ), array('class'=>'form-control', 'placeholder'=>'Contenedor')) }}
					</div>
					<div class="form-group">
						{{ Form::label('status', 'Estado') }}
						{{ Form::select('status', $statuses, ( ( isset($new_frm) ) ? $new_frm->statuses_id : '' ), array('class'=>'form-control')) }}
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