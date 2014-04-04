@extends('layouts.manager')

@section('body')
	<div class="clearfix" align="right">
		{{ link_to('manager/social', 'Nueva Red Social', array('class' => 'btn btn-primary')) }}
	</div>

	<ol class="breadcrumb">
		<li>{{ link_to('manager', 'Inicio') }}</li>
		<li class="active">Redes Sociales</li>
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
							<th>Orden</th>
							<th>Estado</th>
							<th>Acciones</th>
						</tr>
						@foreach ($socials as $ksocial => $social)
						<?php
						if(isset($social_frm)){
							$rowSelect = ($social->id == $social_frm->id) ? true : false;
						}else $rowSelect = false;
						?>
						@if($rowSelect)
						<tr class="warning">
						@else
						<tr>
						@endif
							<td>{{ $social->id }}</td>
							<td>
								<img onmouseover="$(this).css('background-image', 'url(data:image/{{$social->image_hover_ext}};base64,{{$social->image_hover}})');" onmouseout="$(this).css('background-image', 'url(data:image/{{$social->image_ext}};base64,{{$social->image}})');" src="{{ asset('img/bg_transparent.png') }}" class="img-rounded" alt="{{ $social->title }}" style="width: 60px; height: 60px; background-color: #E9E9E9; background-image: url(data:image/{{$social->image_ext}};base64,{{$social->image}}); background-repeat:  no-repeat; background-size: 50px auto; background-position: center;">
							</td>
							<td>{{ $social->title }}</td>
							<td>{{ $social->order }}</td>
							<td>
								<?php $status = Statuses::find($social->statuses_id);?>
								{{ $status->title }}
							</td>
							<td>
								<a href="{{ url('manager/social/edit/'.$social->id) }}" class="btn btn-default">
									<span class="glyphicon glyphicon-pencil"></span>
								</a>
								<a href="javascript: $('#optConfirmTrash_{{$social->id}}').show();" class="btn btn-default">
									<span class="glyphicon glyphicon-trash"></span>
								</a>
								<div id="optConfirmTrash_{{$social->id}}" style="display: none; position: absolute; margin-top:2px;">
									<a href="{{ url('manager/processsocial/delete/'.$social->id) }}" class="btn btn-success">
										<span class="glyphicon glyphicon-ok"></span>
									</a>
									<a href="javascript: $('#optConfirmTrash_{{$social->id}}').hide();" class="btn btn-danger">
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
					{{ Form::open(array('url' => 'manager/processsocial' . ( ( isset($params_selected) ) ? '/edit/'.$params_selected['id'] : '' ), 'social'=>'form', 'files'=> true)) }}
					<div class="form-group">
						{{ Form::label('image', 'Imágen') }}
						{{ Form::file('image') }}
					</div>
					<div class="form-group">
						{{ Form::label('image_hover', 'Imágen Sobre') }}
						{{ Form::file('image_hover') }}
					</div>
					<div class="form-group">
						{{ Form::label('order', 'Orden') }}
						{{ Form::text('order', ( ( isset($social_frm) ) ? $social_frm->order : '0' ), array('class'=>'form-control', 'placeholder'=>'Orden')) }}
					</div>
					<div class="form-group">
						{{ Form::label('title', 'Título') }}
						{{ Form::text('title', ( ( isset($social_frm) ) ? $social_frm->title : '' ), array('class'=>'form-control', 'placeholder'=>'Título')) }}
					</div>
					<div class="form-group">
						{{ Form::label('url', 'Url') }}
						{{ Form::text('url', ( ( isset($social_frm) ) ? $social_frm->url : '' ), array('class'=>'form-control', 'placeholder'=>'http://')) }}
					</div>
					<div class="form-group">
						{{ Form::label('status', 'Estado') }}
						{{ Form::select('status', $statuses, ( ( isset($social_frm) ) ? $social_frm->statuses_id : '' ), array('class'=>'form-control')) }}
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