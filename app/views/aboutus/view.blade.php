@include('layouts/public-header')

<div class="container">
    @foreach ($contents as $content)
    <!-- Modulo Titulo -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <h2 class="bor-1px"><strong>{{ $content->title }}</strong></h2>
            </div>
        </div><!-- /END Modulo Titulo -->       
        
        {{ $content->body }}
    @endforeach
</div>
<div class="push"></div>

@include('layouts/public-footer')