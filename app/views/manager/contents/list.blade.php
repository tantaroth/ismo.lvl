@extends('layouts.manager')

@section('body')
	<script>
		$(document).ready(function() {
			$('#summernote').summernote();
		});
	</script>
	<div class="clearfix" align="right">
		{{ link_to('manager/content', 'Nueva content', array('class' => 'btn btn-primary')) }}
	</div>

	<ol class="breadcrumb">
		<li>{{ link_to('manager', 'Inicio') }}</li>
		<li class="active">Información</li>
	</ol>
	
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="table-responsive">
					<table width="100%" class="table table-striped">
						<tr>
							<th>#</th>
							<th>Título</th>
							<th>Estado</th>
							<th>Acciones</th>
						</tr>
						@foreach ($contents as $kcontent => $content)
						<?php
						if(isset($content_frm)){
							$rowSelect = ($content->id == $content_frm->id) ? true : false;
						}else $rowSelect = false;
						?>
						@if($rowSelect)
						<tr class="warning">
						@else
						<tr>
						@endif
							<td>{{ $content->id }}</td>
							<td>{{ $content->title }}</td>
							<td>
								<?php $status = Statuses::find($content->statuses_id);?>
								{{ $status->title }}
							</td>
							<td>
								<a href="{{ url('manager/content/edit/'.$content->id) }}" class="btn btn-default">
									<span class="glyphicon glyphicon-pencil"></span>
								</a>
								<a href="javascript: $('#optConfirmTrash_{{$content->id}}').show();" class="btn btn-default">
									<span class="glyphicon glyphicon-trash"></span>
								</a>
								<div id="optConfirmTrash_{{$content->id}}" style="display: none; position: absolute; margin-top:2px;">
									<a href="{{ url('manager/processcontent/delete/'.$content->id) }}" class="btn btn-success">
										<span class="glyphicon glyphicon-ok"></span>
									</a>
									<a href="javascript: $('#optConfirmTrash_{{$content->id}}').hide();" class="btn btn-danger">
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
					{{ Form::open(array('url' => 'manager/processcontent' . ( ( isset($params_selected) ) ? '/edit/'.$params_selected['id'] : '' ), 'content'=>'form', 'files'=> true)) }}
					<div class="form-group">
						{{ Form::label('module', 'Módulo') }}
						{{ Form::select('module', $modules, ( ( isset($content_frm) ) ? $content_frm->modules_id : '' ), array('class'=>'form-control')) }}
					</div>
					<div class="form-group">
						{{ Form::label('name', 'Nombre') }}
						{{ Form::text('name', ( ( isset($content_frm) ) ? $content_frm->name : '' ), array('class'=>'form-control', 'placeholder'=>'Nombre')) }}
					</div>
					<div class="form-group">
						{{ Form::label('title', 'Título') }}
						{{ Form::text('title', ( ( isset($content_frm) ) ? $content_frm->title : '' ), array('class'=>'form-control', 'placeholder'=>'Título')) }}
					</div>
					<div class="form-group">
						{{ Form::label('body', 'Cuerpo') }}
						{{ Form::textarea('body', ( ( isset($content_frm) ) ? $content_frm->body : '' ), array('class'=>'form-control tinymce', 'placeholder'=>'Cuerpo')) }}
					</div>
					<div class="form-group">
						{{ Form::label('container', 'Contenedor') }}
						{{ Form::text('container', ( ( isset($content_frm) ) ? $content_frm->container : 0 ), array('class'=>'form-control', 'placeholder'=>'Contenedor')) }}
					</div>
					<div class="form-group">
						{{ Form::label('status', 'Estado') }}
						{{ Form::select('status', $statuses, ( ( isset($content_frm) ) ? $content_frm->statuses_id : '' ), array('class'=>'form-control')) }}
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