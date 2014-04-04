@extends('layouts.manager')

@section('body')
	<div class="clearfix" align="right">
		{{ link_to('manager/item', 'Nuevo Producto', array('class' => 'btn btn-default')) }}
		{{ link_to('manager/category', 'Nueva category', array('class' => 'btn btn-primary')) }}
	</div>

	<ol class="breadcrumb">
		<li>{{ link_to('manager', 'Inicio') }}</li>
		<li class="active">Categorías</li>
	</ol>
	
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="table-responsive">
					<table width="100%" class="table table-striped">
						<tr>
							<th>#</th>
							<th>Título</th>
							<th>Estado</th>
							<th>Acciones</th>
						</tr>
						@foreach ($categories as $kcategory => $category)
						<?php
						if(isset($category_frm)){
							$rowSelect = ($category->id == $category_frm->id) ? true : false;
						}else $rowSelect = false;
						?>
						@if($rowSelect)
						<tr class="warning">
						@else
						<tr>
						@endif
							<td>{{ $category->id }}</td>
							<td>{{ $category->title }}</td>
							<td>
								<?php $status = Statuses::find($category->statuses_id);?>
								{{ $status->title }}
							</td>
							<td>
								<a href="{{ url('manager/category/edit/'.$category->id) }}" class="btn btn-default">
									<span class="glyphicon glyphicon-pencil"></span>
								</a>
								<a href="javascript: $('#optConfirmTrash_{{$category->id}}').show();" class="btn btn-default">
									<span class="glyphicon glyphicon-trash"></span>
								</a>
								<div id="optConfirmTrash_{{$category->id}}" style="display: none; position: absolute; margin-top:2px;">
									<a href="{{ url('manager/processcategory/delete/'.$category->id) }}" class="btn btn-success">
										<span class="glyphicon glyphicon-ok"></span>
									</a>
									<a href="javascript: $('#optConfirmTrash_{{$category->id}}').hide();" class="btn btn-danger">
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
					{{ Form::open(array('url' => 'manager/processcategory' . ( ( isset($params_selected) ) ? '/edit/'.$params_selected['id'] : '' ), 'category'=>'form', 'files'=> true)) }}
					<div class="form-group">
						{{ Form::label('title', 'Título') }}
						{{ Form::text('title', ( ( isset($category_frm) ) ? $category_frm->title : '' ), array('class'=>'form-control', 'placeholder'=>'Título')) }}
					</div>
					<div class="form-group">
						{{ Form::label('description', 'Descripción') }}
						{{ Form::textarea('description', ( ( isset($category_frm) ) ? $category_frm->description : '' ), array('class'=>'form-control', 'placeholder'=>'Descripción')) }}
					</div>
					<div class="form-group">
						{{ Form::label('status', 'Estado') }}
						{{ Form::select('status', $statuses, ( ( isset($category_frm) ) ? $category_frm->statuses_id : '' ), array('class'=>'form-control')) }}
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