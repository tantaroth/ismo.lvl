@include('layouts/public-header')

<div class="container mtop30">
	<div class="row">
       <div class="col-lg-12 col-md-12 col-sm-12">
            <h2 class="bor-1px">Nuestro equipo</h2>
       </div>
    </div>
    <div class="clearfix">
    	@foreach ($news as $new)
		<div class="mtop10 pull-left" style="width: 350px; margin-right: 30px;">
			<h4 class="over-line">{{ $new->title }}</h4>
			<p class="over-description">{{ $new->description }}</p>
			<img class="tam-service sombra-img" src="data:image/{{$new->image_ext}};base64,{{$new->image}}" alt="{{ $new->title }}">
			<p class="over-text2 mtop10">{{ $new->body }}</p>
		</div>
    	@endforeach
    </div>
</div>
<div class="push"></div>

@include('layouts/public-footer')