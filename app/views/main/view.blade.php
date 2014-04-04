@include('layouts/public-header')

<?php
function nameMonth($month){
    switch($month)
    {
        case 1:
            return array('es'=>'Enero');
        break;
        case 2:
            return array('es'=>'Febrero');
        break;
        case 3:
            return array('es'=>'Marzo');
        break;
        case 4:
            return array('es'=>'Abril');
        break;
        case 5:
            return array('es'=>'Mayo');
        break;
        case 6:
            return array('es'=>'Junio');
        break;
        case 7:
            return array('es'=>'Julio');
        break;
        case 8:
            return array('es'=>'Agosto');
        break;
        case 9:
            return array('es'=>'Septiembre');
        break;
        case 10:
            return array('es'=>'Octubre');
        break;
        case 11:
            return array('es'=>'Noviembre');
        break;
        case 12:
            return array('es'=>'Diciembre');
        break;
    }
}
?>
<!-- Carousel FullWidth
================================================== -->
<div id="myCarousel" class="home2 carousel slide banner">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        @foreach ($galleries_top as $kgallery_top=>$gallery_top)
        <li data-target="#myCarousel" data-slide-to="{{ $kgallery_top }}" class="{{ ($kgallery_top == 0) ? 'active' : '' }}"></li>
        @endforeach
    </ol>
    <!-- contet -->
    <div class="carousel-inner">
        @foreach ($galleries_top as $kgallery_top=>$gallery_top)
        <div class="item {{ ($kgallery_top == 0) ? 'active' : '' }}">
            <img src="data:image/{{$gallery_top->image_ext}};base64,{{$gallery_top->image}}" alt="{{ $gallery_top->title }}">
            <div class="container">
                <div class="carousel-caption text_banner">
                    <p class="line_text">{{ $gallery_top->title }}</p>
                    <p class="line_text2">{{ $gallery_top->description }}</p>
                    <p><a class="btn btn-large btn-primary boton_banner" href="#"><span class="ver_banner">Ver m&aacute;s</span><span class="icon-plus3"></span></a></p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!-- arrows -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="flecha-banner icon-arrow-left7 "></span></a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="flecha-banner icon-uniE89B"></span></a>
</div><!-- /END carousel FullWidth-->


<!-- content general
================================================== -->

<div class="container marketing">

    <!-- Modulo destacados imagen redonda se puede cambiar por cuadrada quitando  class="img-circle" -->
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 ">
        <div class="wrap_news_home">
            <div class="noticias_home"><h2>Noticias</h2></div> 
                @foreach ($news_noStarted as $new_noStarted)
                <div class="div_noticia_home">
                    <?php $dateFormat = strtotime($new_noStarted->updated_at);?>
                    <div class="noticias_fecha_home"><span>{{ date("d", $dateFormat) }}</span> {{ nameMonth(date("m", $dateFormat))['es'] }}-{{ date("Y", $dateFormat) }}</div>
                    <hr class="noticias_hr">            
                    <div class="noticias_text_home">
                        <div class="titulo_noticias_home">{{ $new_noStarted->title }}</div>               
                        <p>{{ $new_noStarted->description }}</p>
                        <div class="boton_noticias_home"><a class="btn btn-default" href="#">Leer noticia<span class="icon-plus3"></span></a></div>
                    </div>
                </div>
                @endforeach
            </div>  
        </div>
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            @if(isset($news_started[0]) || isset($news_started[1]))
            <div class="row">
                @if(isset($news_started[0]))
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="lupa-hidden animada img_destacado">
                            <a href="#" class="row">
                                <span class="icon-destacado icono-animado" style="margin-top: -233px; opacity: 1; top: 0px;"></span>
                                <img class="img-animada" src="data:image/{{$news_started[0]->image_ext}};base64,{{$news_started[0]->image}}">
                            </a>
                        </div>
                     <h2 class="titulo_destacado">{{ $news_started[0]->title }}</h2>
                    <p class="text_destacado">{{ $news_started[0]->description }}</p>
                    <div class="boton_destacado"><a class="btn btn-default" href="#">Ver m&aacute;s<span class="icon-plus3"></span></a></div>
                </div>
                @endif
                @if(isset($news_started[1]))
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="lupa-hidden animada img_destacado">
                            <a href="#" class="row">
                                <span class="icon-destacado icono-animado" style="margin-top: -233px; opacity: 1; top: 0px;"></span>
                                <img class="img-animada" src="data:image/{{$news_started[1]->image_ext}};base64,{{$news_started[1]->image}}">
                            </a>
                        </div>
                    <h2 class="titulo_destacado">{{ $news_started[1]->title }}</h2>
                    <p class="text_destacado">{{ $news_started[1]->description }}</p>
                    <div class="boton_destacado"><a class="btn btn-default" href="#">Ver m&aacute;s<span class="icon-plus3"></span></a></div>
                </div>
                @endif
            </div>
            @endif

            @if(isset($news_started[2]) || isset($news_started[3]))
            <div class="row">
                @if(isset($news_started[2]))
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 margin">
                    <div class="lupa-hidden animada img_destacado">
                            <a href="#" class="row">
                                <span class="icon-destacado icono-animado" style="margin-top: -233px; opacity: 1; top: 0px;"></span>
                                <img class="img-animada" src="data:image/{{$news_started[2]->image_ext}};base64,{{$news_started[2]->image}}">
                            </a>
                        </div>
                    <h2 class="titulo_destacado">{{ $news_started[2]->title }}</h2>
                    <p class="text_destacado">{{ $news_started[2]->description }}</p>
                    <div class="boton_destacado"><a class="btn btn-default" href="#">Ver m&aacute;s<span class="icon-plus3"></span></a></div>
                </div>
                @endif
                @if(isset($news_started[3]))
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 margin">
                    <div class="lupa-hidden animada img_destacado">
                            <a href="#" class="row">
                                <span class="icon-destacado icono-animado" style="margin-top: -233px; opacity: 1; top: 0px;"></span>
                                <img class="img-animada" src="data:image/{{$news_started[3]->image_ext}};base64,{{$news_started[3]->image}}">
                            </a>
                        </div>
                    <h2 class="titulo_destacado">{{ $news_started[3]->title }}</h2>
                    <p class="text_destacado">{{ $news_started[3]->description }}</p>
                    <div class="boton_destacado"><a class="btn btn-default" href="#">Ver m&aacute;s<span class="icon-plus3"></span></a></div>
                </div>
                @endif
            </div>
            @endif

        </div>
        <hr class="divisor">
        <!-- /END Modulo destacados -->
        <div class="container">
            <div id="sliderContent" class="ui-corner-all">      
              <div class="viewer ui-corner-all">
                <div class="content-conveyor ui-helper-clearfix">
                    @foreach ($galleries_bottom as $gallery_bottom)
                    <div class="item1">
                        <img src="data:image/{{$gallery_bottom->image_ext}};base64,{{$gallery_bottom->image}}">
                    </div>
                    @endforeach
                </div>
                </div>
              </div>
              <div id="slider"></div>
    </div>
<!-- Divisor de modulo -->

</div><!-- /END container -->

@include('layouts/public-footer')