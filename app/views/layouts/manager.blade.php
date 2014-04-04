<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Fastproject :: Manager</title>

        <!-- Bootstrap -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/uikit.min.css') }}" />
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style type="text/css" media="screen"> 
        @font-face {
            font-family: 'Conv_AUDIMRG_';
            src: url('{{ asset('css/fonts/AUDIMRG_.eot') }}');
            src: local('☺'), url('{{ asset('css/fonts/AUDIMRG_.woff') }}') format('woff'), url('{{ asset('css/fonts/AUDIMRG_.ttf') }}') format('truetype'), url('{{ asset('css/fonts/AUDIMRG_.svg') }}') format('svg');
            font-weight: normal;
            font-style: normal;
        }

        /*----- footer Marca imaginamos ----*/

        .footer-autor {
            font-family: 'Conv_AUDIMRG_';
            height: 40px;
            width: auto;
            overflow: hidden;
        }
        .footer-autor a {
            color:rgba(0,186,204, 0.7);
            font-size: 16px;
            font-weight: 500;
            text-decoration: none;
        }
        .footer-autor #ahorranito2 {
            background: url("http://www.imaginamos.com/derechos_autor_gris/ahorranito-2.png") no-repeat scroll 0 0 transparent;
            display: block;
            height: 22px;
            margin: 10px 7px 0 7px;
            width: 21px;
        }
        .footer-autor a span {
            color: #000;
        }
        .navbar{
            border-radius: 0px;
        }
        </style>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="{{ asset('js/librerias/jquery-1.9.0.min.js') }}"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/uikit.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
        <script type="text/javascript">
        tinymce.init({
            selector: "textarea.tinymce",
            theme: "modern",
            height: 300,
            plugins: [
                 "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                 "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                 "save table contextmenu directionality emoticons template paste textcolor"
           ],
           content_css: "css/content.css",
           toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons", 
           style_formats: [
                {title: 'Bold text', inline: 'b'},
                {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                {title: 'Example 1', inline: 'span', classes: 'example1'},
                {title: 'Example 2', inline: 'span', classes: 'example2'},
                {title: 'Table styles'},
                {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
            ]
         }); 
        /*tinymce.init({
                selector: "textarea.tinymce",
                plugins: [
                        "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
                        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                        "table contextmenu directionality emoticons template textcolor paste fullpage textcolor"
                ],

                toolbar1: "styleselect formatselect fontselect fontsizeselect",
                toolbar2: "cut copy paste | bullist numlist | outdent indent blockquote | undo redo | bold italic underline strikethrough",
                toolbar3: "alignleft aligncenter alignright alignjustify | forecolor backcolor | link unlink anchor image media code | inserttime preview",
                toolbar4: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft",

                menubar: false,
                toolbar_items_size: 'small',

                style_formats: [
                        {title: 'Bold text', inline: 'b'},
                        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                        {title: 'Example 1', inline: 'span', classes: 'example1'},
                        {title: 'Example 2', inline: 'span', classes: 'example2'},
                        {title: 'Table styles'},
                        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                ],

                templates: [
                        {title: 'Test template 1', content: 'Test 1'},
                        {title: 'Test template 2', content: 'Test 2'}
                ]
        });*/
        </script>
    </head>
    <body>
        <?php
            $userAuth = Users::find(Session::get('userId'));
        ?>
        <div id="my-id" class="uk-offcanvas">
            <div class="uk-offcanvas-bar uk-offcanvas-bar-flip">
                <div align="center">
                    <img src="" class="img-circle" alt="..." width="150" height="150" style="width: 150px; height: 150px; margin: 20px; background-color: #222; background-image: url(data:image/{{$userAuth->image_ext}};base64,{{$userAuth->image}}); background-repeat: no-repeat; background-size: 200px auto; background-position: center;">
                </div>
                <ul class="uk-nav uk-nav-offcanvas" data-uk-nav>
                    <li><a href="{{ url('manager/user/edit/'.$userAuth->id) }}">Perfíl  </a></li>
                    <li class="uk-active">{{ link_to('manager/logout', 'Cerrar Sesión') }}</li>
                </ul>
            </div>
        </div>
        <nav class="navbar navbar-inverse" role="navigation">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    {{ link_to('manager', 'Ismo', array('class'=>'navbar-brand')) }}
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li>{{ link_to('manager/content', 'Contenidos') }}</li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Productos <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li>{{ link_to('manager/item', 'Nuevo Producto') }}</li>
                                <li>{{ link_to('manager/category', 'Nueva Categoría') }}</li>
                            </ul>
                        </li>
                        <li>{{ link_to('manager/new', 'Noticias') }}</li>
                        <li>{{ link_to('manager/social', 'Social') }}</li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Configuración <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li>{{ link_to('manager/gallery', 'Nueva Galeria') }}</li>
                                <li>{{ link_to('manager/module', 'Nuevo Módulo') }}</li>
                                <li class="divider"></li>
                                <li>{{ link_to('manager/role', 'Nuevo Rol') }}</li>
                                <li>{{ link_to('manager/user', 'Nuevo Usuario') }}</li>
                                <li class="divider"></li>
                                <li>{{ link_to('manager/status', 'Nuevo Estado') }}</li>
                            </ul>
                        </li>
                        <li><a href="#my-id" data-uk-offcanvas>Cuenta</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        
        <div class="container" style="max-width: 1200px;">
            @yield('body')
        </div>

        <div class="well" align="center">
            <div class="footer-autor row">
                <div class="col-md-6" align="right">
                    <a href="http://www.imaginamos.com" target="_blank">Desarrollo de Software:</a>
                </div>
                <div class="col-md-1">
                    <span id="ahorranito2"></span>
                </div>
                <div class="col-md-5" align="left">
                    <a href="http://www.imaginamos.com" target="_blank">imagin<span>a</span>mos.com</a>
                </div>
            </div>
        </div>
    </body>
</html>