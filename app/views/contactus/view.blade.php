@include('layouts/public-header')

<!-- Carousel FullWidth

================================================== -->

<div class="container mtop30">
	<div class="row">
       <div class="col-lg-12 col-md-12 col-sm-12  col-xs-12">
            <h2 class="bor-1px">Contáctanos</h2>
       </div>
    </div>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6">
			<div class="">
				{{ Form::open(array('url' => 'contact_us', 'role'=>'form')) }}

					<h4 class="over-line bor-1px">Escríbenos Ahora</h4>

					<div class="bord">
						<label for="nombre" class="control-label">Nombre y Apellidos</label>
						<input type="text" name="nombre" class="form-control input_envi">
					</div>

					<div class="form">
						<label for="nombre" class="control-label">Asunto</label>
						<input type="text" name="asunto" class="form-control input_envi">
					</div>

					<div class="form">
						<label for="nombre" class="control-label">Email</label>
						<input type="email" name="email" class="form-control input_envi">
					</div>

					<div class="form">
						<label for="nombre" class="control-label">Telefono</label>
						<input type="text" name="telefono" class="form-control input_envi">
					</div>

					<div class="form">
						<label for="nombre" class="control-label">Empresa</label>
						<input type="text" name="empresa" class="form-control input_envi" rows="5">
					</div>

					<div class="form">
						<label for="nombre" class="control-label">Mensaje</label>
						<textarea class="form-control msm" rows="5" name="mensaje" id=""></textarea>
					</div>
					<div class="boton_destacado"><button type="submit" class="btn btn-default">Enviar</button></div>
				{{ Form::close() }}
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<h4 class="over-line bor-1px">Como Llegar:</h4>
					<iframe class="img_mapa drop-shadow mtop25" width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.es/maps?f=q&amp;source=s_q&amp;hl=es&amp;geocode=&amp;q=Bogot%C3%A1,+Colombia&amp;aq=0&amp;oq=bogo&amp;sll=40.396764,-3.713379&amp;sspn=9.769253,21.51123&amp;ie=UTF8&amp;hq=&amp;hnear=Bogot%C3%A1,+Colombia&amp;t=m&amp;z=8&amp;ll=4.598056,-74.075833&amp;output=embed"></iframe>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mtop15">
					<h4 class="over-line bor-1px">Nombre empresa</h4>
					<div class="paddinlados mtop10">
						<div class="over-line-17"><strong>1234 Main Street,</strong></div>
						<div class="over-line-17"><strong>Anytown,</strong></div>
						<div class="over-line-17"><strong>USA</strong></div>
						<div class="over-line-17"><strong>Phone: </strong>123 456 7890</div>
						<div class="over-line-17"><strong>Fax: </strong>+49 123 456 7890</div>
						<div class="over-line-17"><strong>Email: </strong><a href="#">hello@example.com</a></div>
						<div class="over-line-17"><strong>Web: </strong><a href="#">example.com</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>	
</div>
<div class="push"></div>

@include('layouts/public-footer')