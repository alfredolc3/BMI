<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <!-- Optionally, you can add icons to the links -->
            <li class=""><a href="{{ url('home') }}"><i class='fa fa-edit'></i> 
                <span>Predios</span>
                <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{route('datos.predios.index')}}"><i class='fa fa-database'></i>  Existentes </a></li>
                    <li><a href="{{route('datos.predios.create')}}"><i class='glyphicon glyphicon-plus'></i>  Nuevo </a></li>
                </ul>
            </li>

            <li><a href="#"><i class='glyphicon glyphicon-search'></i> <span>Consultas</span></a></li>
            
            <li class="treeview">
                <a href="#"><i class='glyphicon glyphicon-th-list'></i> <span>Reportes</span></a>
            </li>
            <li class="treeview">
                <a href="#"><i class='glyphicon glyphicon-book'></i><span>Biblioteca Digital</span></a>
            </li>
            @if(Auth::user()->Admin())
                <li class=""><a href="{{ url('home') }}"><i class='glyphicon glyphicon-duplicate'></i> 
                <span>Catalogos</span>
                <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{route('admin.users.index')}}"><i class='glyphicon glyphicon-user'></i>  Usuarios </a></li>
                    <li><a href="{{route('admin.formas.index')}}"><i class='glyphicon glyphicon-object-align-bottom'></i> Formas </a></li>
                    <li><a href="{{route('admin.frentes.index')}}"><i class='glyphicon glyphicon-eye-open'></i>  Frentes </a></li>
                    <li><a href="{{route('admin.regimenes.index')}}"><i class='glyphicon glyphicon-king'></i>Regimen de Propiedad </a></li>
                    <li><a href="{{route('admin.sepomex.index')}}"><i class='glyphicon glyphicon-map-marker'></i>SEPOMEX</a></li>
                    <li><a href="{{route('admin.servicios.index')}}"><i class='glyphicon glyphicon-heart'></i>Servicios</a></li>
                    <li><a href="{{route('admin.tipologiasinmueble.index')}}"><i class='glyphicon glyphicon-home'></i>Tipos de Inmueble</a></li>
                    <li><a href="{{route('admin.tiposterreno.index')}}"><i class='glyphicon glyphicon-picture'></i>Tipos de Terreno</a></li>
                    <li><a href="{{route('admin.tiposvialidad.index')}}"><i class='glyphicon glyphicon-road'></i>Tipos de Vialidad</a></li>
                    <li><a href="{{route('admin.topografias.index')}}"><i class='glyphicon glyphicon-tree-deciduous'></i>Topografias</a></li>
                    <li><a href="{{route('admin.ubicacionesmanzana.index')}}"><i class='glyphicon glyphicon-apple'></i>Ubicaciones de Manzana</a></li>
                    <li><a href="{{route('admin.usossuelo.index')}}"><i class='glyphicon glyphicon-globe'></i>Usos de Suelo</a></li>
                    <li><a href="{{route('admin.zonas.index')}}"><i class='glyphicon glyphicon-indent-left'></i>Clasificacion de Zonas</a></li>
                </ul>
            </li>
            @endif
            
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
