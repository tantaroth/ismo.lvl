@include('layouts/public-header')

<div class="container">          

    <!-- Modulo Titulo -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <h2 class="bor-1px"><strong>Productos</strong></h2>
            </div>
        </div><!-- /END Modulo Titulo -->

     <!-- Modulo productos con categoriasy subcategorias -->

    <div class="row">

        <!-- Modulo categorias y subcategorias -->
        <div class="col-lg-3 col-md-3 col-sm-3">
            <div class="dd" id="nestable3">
                <ol id="myTab" class="dd-list">
                    @foreach ($categories as $kcategory=>$category)
                    <li class="dd-item dd3-item" data-id="{{ $kcategory+1 }}">
                        <button type="button" class="pluss-min"><span class="icon-arrow-right5"></span></button>
                        <a href="#item{{ $kcategory+1 }}" data-toggle="tab" class="tab-lista">
                            <div class="dd3-content">{{ $category->title }}</div>
                        </a>
                    </li>
                    @endforeach
                </ol>
            </div>
        </div><!-- /END Modulo categorias y subcategorias -->

        <!-- Modulo productos dentro de categorias -->
        <div class="col-lg-9 col-md-9 col-sm-9 tab-content">

            @foreach ($categories as $kcategory=>$category)
            <?php $kcategory++;?>
            <!-- Item1 tabs -->
            <div class="tab-pane {{ ($kcategory == 1) ? 'active': '' }}" id="item{{$kcategory}}">
                <!-- Modulo imagen texto icono -->
                <div class="clearfix">
                	<?php $items = Items::where('statuses_id', '=', 1)->where('categories_id', '=', $category->id)->get();?>
                	@foreach ($items as $item)
                    <div class="pull-left" style="width: 260px; margin-right: 20px;">
                        <a href="#"><img class="img-left tam-ser" src="data:image/{{$item->image_ext}};base64,{{$item->image}}" width="250" height="200" alt="{{ $item->title }}"></a>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 alignleft">
                                <h4 class="over-line">{{ $item->title }}</h4>
                                <p class="over-text1">{{ $item->description }}</p>
                                <p class="boton_destacado"><a class="btn btn-default " href="detalle_productos.php">Ver Má<span class="icon-plus3"></span>s</a></p>
                            </div>
                        </div>
                    </div>
                	@endforeach
                </div>
            </div><!-- /END Items tabs -->
            @endforeach

        </div><!-- /END Modulo productos dentro de categorias -->

    </div><!-- /END Modulo concategoriasy subcategorias -->

</div>
<div class="push"></div>

@include('layouts/public-footer')