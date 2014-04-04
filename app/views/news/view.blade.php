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

<!-- content general    ================================================== -->

<div class="container scroll-infinito">
            <!-- Modulo Titulo centrado -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <h2 class="bor-1px"><strong>Noticias</strong></h2>
            </div>
        </div><!-- /END Modulo Titulo centrado -->

        <!-- Scroll infinito -->

    <div class="clearfix">
        @foreach ($news as $new)
        <div class="pull-left mtop30" style="margin-right: 20px;">
            <div class="thumbnail  border alignleft">
                <h4 class="over-line titulo_sec_noticias">{{ $new->title }}</h4>
                <?php $strTime = strtotime($new->created_at);?>
                <p class="over-line"><strong>Escrito en: </strong>{{ nameMonth(date("m", $strTime))['es'] }} {{ date("d", $strTime) }} de {{ date("Y", $strTime) }}</p>
                <img class="tam-service" src="data:image/{{$new->image_ext}};base64,{{$new->image}}" alt="...">

                <div class="caption">
                    <p class="over-text1 text_noticias">{{ $new->description }}</p>
                    <p class="boton_destacado"><a class="btn btn-default" href="detalle_noticias.php">Ver Más<span class="icon-plus3"></span></a></p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<div class="push"></div>

@include('layouts/public-footer')