<!DOCTYPE>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Fastproject</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
<meta name="Keywords" lang="es" content="palabras clave" />
<meta name="Description" lang="es" content="texto empresarial" />
<meta name="date" content="2013" />
<meta name="author" content="diseño web: imaginamos.com / Jhonathan Calvo" />
<meta name="robots" content="All" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Bootstrap -->
<link rel="stylesheet" href="css/bootstrap.min.css" />
<!---->

<!-- Bootstrap Non-responsive
<link href="css/non-responsive.css" rel="stylesheet">
---->


<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
<![endif]-->

<!-- stylos globales -->
<link rel="stylesheet" href="css/FastProject-all.css" />
<link rel="stylesheet" href="css/custom.css" />
<!--link href="css/style.css" rel="stylesheet" /-->
<!---->

<!-- Icomoon -->
<link rel="stylesheet" type="text/css" href="plugins/icomoon/icomoon.css" />
<!--[if lt IE 8]><!-->
<link rel="stylesheet" href="plugins/icomoon/ie7/ie7.css">
<!--<![endif]-->

<!-- Plugins -->
<link href="plugins/bootstrap-uploader/css/bootstrap-fileupload.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="plugins/fancybox/source/jquery.fancybox.css" />
<link rel="stylesheet" type="text/css" href="plugins/uniform/css/uniform.default.css" />
<link rel="stylesheet" type="text/css" href="plugins/chosen-bootstrap/chosen/chosen.css" />
<link rel="stylesheet" type="text/css" href="plugins/jquery-tags-input/jquery.tagsinput.css" />
<link rel="stylesheet" type="text/css" href="plugins/clockface/css/clockface.css" />
<link rel="stylesheet" type="text/css" href="plugins/bootstrap-datepicker/css/datepicker.css" />
<link rel="stylesheet" type="text/css" href="plugins/bootstrap-timepicker/compiled/timepicker.css" />
<link rel="stylesheet" type="text/css" href="plugins/bootstrap-colorpicker/css/colorpicker.css" />
<link rel="stylesheet" type="text/css" href="plugins/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" />
<link rel="stylesheet" type="text/css" href="plugins/bootstrap-daterangepicker/daterangepicker.css" />
<link rel="stylesheet" type="text/css" href="css/input-append.css" />
<link rel="stylesheet" type="text/css" href="plugins/coolcarousel/carouselFredSel.css" />
<link rel="stylesheet" type="text/css" href="plugins/nestable/jquery.nestable.css" />
<link rel="stylesheet" type="text/css" href="plugins/data-tables/DT_bootstrap.css" />
<link rel="stylesheet" type="text/css" href="plugins/metr-folio/css/metro-gallery.css" />
<link rel="stylesheet" type="text/css" href="plugins/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" />
<link rel="stylesheet" type="text/css" href="css/breadcrumbs.css" />
<link rel="stylesheet" type="text/css" href="css/shadows.css" />

<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />


<!-- LIbreria jquery -->
<script type="text/javascript" src="js/librerias/jquery-1.8.2.min.js"></script>

</head>
<body>
    <div class="wrap"><!-- always footer below -->
    <!-- Barra de navegacion
    ================================================== -->
    <div class="menu">
        <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 logo">
                        <a href="{{ url('/') }}"><img class="img_menu" src="img/logo.png"></a>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                   
                        <div class="redes">
                            @foreach ($socials as $social)
                                <a href="{{ $social->url }}" title="{{ $social->title }}" target="_blank"><img src="data:image/{{$social->image_ext}};base64,{{$social->image}}" onmouseover="$(this).attr('src', 'data:image/{{$social->image_hover_ext}};base64,{{$social->image_hover}}');" onmouseout="$(this).attr('src', 'data:image/{{$social->image_ext}};base64,{{$social->image}}');" alt="{{ $social->title }}"></a>
                            @endforeach
                        </div>

                        <div class="navbar-collapse collapse">
                            <ul class="nav navbar-nav">
                                <li class="active">{{ link_to('/', 'Inicio') }}</li>
                                <li>{{ link_to('about_us', 'Nosotros') }}</li>
                                <li>{{ link_to('products', 'Productos') }}</li>
                                <li>{{ link_to('news', 'Noticias') }}</li>
                                <li>{{ link_to('out_team', 'Nuestro Equipo') }}</li>
                                <li>{{ link_to('contact_us', 'Contactenos') }}</li>
                            </ul>                        
                        </div>
                    </div>
                </div>
                    
                </div>    

    </div> 




        