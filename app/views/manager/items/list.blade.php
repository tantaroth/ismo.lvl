@extends('layouts.manager')

@section('body')
	<div class="clearfix" align="right">
		{{ link_to('manager/category', 'Nueva Categoría', array('class' => 'btn btn-default')) }}
		{{ link_to('manager/item', 'Nuevo Producto', array('class' => 'btn btn-primary')) }}
	</div>

	<ol class="breadcrumb">
		<li>{{ link_to('manager', 'Inicio') }}</li>
		<li class="active">Productos</li>
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
						@foreach ($items as $kItem => $item)
						<?php
						if(isset($item_frm)){
							$rowSelect = ($item->id == $item_frm->id) ? true : false;
						}else $rowSelect = false;
						?>
						@if($rowSelect)
						<tr class="warning">
						@else
						<tr>
						@endif
							<td>{{ $item->id }}</td>
							<td>
								<?php $module = Modules::find($item->modules_id);?>
								{{ $module->title }}
							</td>
							<td><img src="{{ asset('img/bg_transparent.png') }}" class="img-rounded" alt="{{ $item->title }}" style="width: 60px; height: 60px; background-color: #E9E9E9; background-image: url(data:image/{{$item->image_ext}};base64,{{$item->image}}); background-repeat:  no-repeat; background-size: 50px auto; background-position: center;"></td>
							<td>{{ $item->title }}</td>
							<td>
								<?php $status = Statuses::find($item->statuses_id);?>
								{{ $status->title }}
							</td>
							<td>
								<a href="{{ url('manager/item/edit/'.$item->id) }}" class="btn btn-default">
									<span class="glyphicon glyphicon-pencil"></span>
								</a>
								<a href="javascript: $('#optConfirmTrash_{{$item->id}}').show();" class="btn btn-default">
									<span class="glyphicon glyphicon-trash"></span>
								</a>
								<div id="optConfirmTrash_{{$item->id}}" style="display: none; position: absolute; margin-top:2px;">
									<a href="{{ url('manager/processitem/delete/'.$item->id) }}" class="btn btn-success">
										<span class="glyphicon glyphicon-ok"></span>
									</a>
									<a href="javascript: $('#optConfirmTrash_{{$item->id}}').hide();" class="btn btn-danger">
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
					{{ Form::open(array('url' => 'manager/processitem' . ( ( isset($params_selected) ) ? '/edit/'.$params_selected['id'] : '' ), 'item'=>'form', 'files'=> true)) }}
					
					<div class="form-group">
						{{ Form::label('module', 'Módulo') }}
						{{ Form::select('module', $modules, ( ( isset($item_frm) ) ? $item_frm->modules_id : '' ), array('class'=>'form-control')) }}
					</div>
					<div class="form-group">
						{{ Form::label('category', 'Categorías') }}
						{{ Form::select('category', $categories, ( ( isset($item_frm) ) ? $item_frm->categories_id : '' ), array('class'=>'form-control')) }}
					</div>
					<div class="form-group">
						{{ Form::label('image', 'Imágen') }}
						{{ Form::file('image') }}
					</div>
					<div class="form-group">
						{{ Form::label('title', 'Título') }}
						{{ Form::text('title', ( ( isset($item_frm) ) ? $item_frm->title : '' ), array('class'=>'form-control', 'placeholder'=>'Título')) }}
					</div>
					<div class="form-group">
						{{ Form::label('url', 'Url') }}
						{{ Form::text('url', ( ( isset($item_frm) ) ? $item_frm->url : '' ), array('class'=>'form-control', 'placeholder'=>'http://')) }}
					</div>
					<div class="form-group">
						{{ Form::label('description', 'Descripción') }}
						{{ Form::textarea('description', ( ( isset($item_frm) ) ? $item_frm->description : '' ), array('class'=>'form-control', 'placeholder'=>'Descripción')) }}
					</div>
					<div class="form-group">
						{{ Form::label('body', 'Cuerpo') }}
						{{ Form::textarea('body', ( ( isset($item_frm) ) ? $item_frm->body : '' ), array('class'=>'form-control tinymce', 'placeholder'=>'Cuerpo')) }}
					</div>
					<div class="form-group">
						{{ Form::label('status', 'Estado') }}
						{{ Form::select('status', $statuses, ( ( isset($item_frm) ) ? $item_frm->statuses_id : '' ), array('class'=>'form-control')) }}
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