@extends('layouts.manager')

@section('body')
	<div class="clearfix" align="right">
		{{ link_to('manager/gallery', 'Nueva Galería', array('class' => 'btn btn-primary')) }}
	</div>

	<ol class="breadcrumb">
		<li>{{ link_to('manager', 'Inicio') }}</li>
		<li class="active">Galerías</li>
	</ol>
	
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="table-responsive">
					<table width="100%" class="table table-striped">
						<tr>
							<th>#</th>
							<th>Módulo</th>
							<th>Imágen</th>
							<th>Contenedor</th>
							<th>Título</th>
							<th>Estado</th>
							<th>Acciones</th>
						</tr>
						@foreach ($galleries as $kgallery => $gallery)
						<?php
						if(isset($gallery_frm)){
							$rowSelect = ($gallery->id == $gallery_frm->id) ? true : false;
						}else $rowSelect = false;
						?>
						@if($rowSelect)
						<tr class="warning">
						@else
						<tr>
						@endif
							<td>{{ $gallery->id }}</td>
							<td>
								<?php $module = Modules::find($gallery->modules_id);?>
								{{ $module->title }}
							</td>
							<td><img src="{{ asset('img/bg_transparent.png') }}" class="img-rounded" alt="{{ $gallery->title }}" style="width: 60px; height: 60px; background-color: #E9E9E9; background-image: url(data:image/{{$gallery->image_ext}};base64,{{$gallery->image}}); background-repeat:  no-repeat; background-size: 50px auto; background-position: center;"></td>
							<td>{{ $gallery->container }}</td>
							<td>{{ $gallery->title }}</td>
							<td>
								<?php $status = Statuses::find($gallery->statuses_id);?>
								{{ $status->title }}
							</td>
							<td>
								<a href="{{ url('manager/gallery/edit/'.$gallery->id) }}" class="btn btn-default">
									<span class="glyphicon glyphicon-pencil"></span>
								</a>
								<a href="javascript: $('#optConfirmTrash_{{$gallery->id}}').show();" class="btn btn-default">
									<span class="glyphicon glyphicon-trash"></span>
								</a>
								<div id="optConfirmTrash_{{$gallery->id}}" style="display: none; position: absolute; margin-top: 2px;">
									<a href="{{ url('manager/processgallery/delete/'.$gallery->id) }}" class="btn btn-success">
										<span class="glyphicon glyphicon-ok"></span>
									</a>
									<a href="javascript: $('#optConfirmTrash_{{$gallery->id}}').hide();" class="btn btn-danger">
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
					{{ Form::open(array('url' => 'manager/processgallery' . ( ( isset($params_selected) ) ? '/edit/'.$params_selected['id'] : '' ), 'gallery'=>'form', 'files'=> true)) }}
					<div class="form-group">
						{{ Form::label('module', 'Módulo') }}
						{{ Form::select('module', $modules, ( ( isset($gallery_frm) ) ? $gallery_frm->modules_id : '' ), array('class'=>'form-control')) }}
					</div>
					<div class="form-group">
						{{ Form::label('image', 'Imágen') }}
						{{ Form::file('image') }}
					</div>
					<div class="form-group">
						{{ Form::label('container', 'Contenedor') }}
						{{ Form::text('container', ( ( isset($gallery_frm) ) ? $gallery_frm->container : 0 ), array('class'=>'form-control', 'placeholder'=>'Contenedor')) }}
					</div>
					<div class="form-group">
						{{ Form::label('title', 'Título') }}
						{{ Form::text('title', ( ( isset($gallery_frm) ) ? $gallery_frm->title : '' ), array('class'=>'form-control', 'placeholder'=>'Título')) }}
					</div>
					<div class="form-group">
						{{ Form::label('description', 'Descripción') }}
						{{ Form::textarea('description', ( ( isset($gallery_frm) ) ? $gallery_frm->description : '' ), array('class'=>'form-control', 'placeholder'=>'Descripción')) }}
					</div>
					<div class="form-group">
						{{ Form::label('status', 'Estado') }}
						{{ Form::select('status', $statuses, ( ( isset($gallery_frm) ) ? $gallery_frm->statuses_id : '' ), array('class'=>'form-control')) }}
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