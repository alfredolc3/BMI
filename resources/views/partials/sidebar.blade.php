<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <!-- Optionally, you can add icons to the links -->
            <li class=""><a href="{{ url('home') }}"><i class='fa fa-edit'></i> 
                <span>Comparables</span>
                <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class='glyphicon glyphicon-plus'></i>  Existentes </a></li>
                    <li><a href="#"><i class='glyphicon glyphicon-plus'></i>  Nuevo </a></li>
                </ul>
            </li>

            <li><a href="#"><i class='glyphicon glyphicon-search'></i> <span>Consultas</span></a></li>
            
            <li class="treeview">
                <a href="#"><i class='glyphicon glyphicon-th-list'></i> <span>Reportes</span></a>
            </li>
            <li class="treeview">
                <a href="#"><i class='glyphicon glyphicon-book'></i><span>Biblioteca Digital</span></a>
            </li>
            <li class=""><a href="{{ url('home') }}"><i class='fa fa-edit'></i> 
                <span>Catalogos</span>
                <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{route('admin.users.index')}}"><i class='glyphicon glyphicon-plus'></i>  Usuarios </a></li>
                    <li><a href="{{route('admin.formas.index')}}"><i class='glyphicon glyphicon-plus'></i> Formas </a></li>
                    <li><a href="{{route('admin.frentes.index')}}"><i class='glyphicon glyphicon-plus'></i>  Frentes </a></li>
                    <li><a href="{{route('admin.regimenes.index')}}"><i class='glyphicon glyphicon-plus'></i>Regimen de Propiedad </a></li>
                    <li><a href="{{route('admin.sepomex.index')}}"><i class='glyphicon glyphicon-plus'></i>SEPOMEX</a></li>
                    <li><a href="{{route('admin.tipologiasinmueble.index')}}"><i class='glyphicon glyphicon-plus'></i>Tipos de Inmueble</a></li>
                    <li><a href="{{route('admin.tiposterreno.index')}}"><i class='glyphicon glyphicon-plus'></i>Tipos de Terreno</a></li>
                    <li><a href="{{route('admin.tiposvialidad.index')}}"><i class='glyphicon glyphicon-plus'></i>Tipos de Vialidad</a></li>
                    <li><a href="{{route('admin.topografias.index')}}"><i class='glyphicon glyphicon-plus'></i>Topografias</a></li>
                    <li><a href="{{route('admin.ubicacionesmanzana.index')}}"><i class='glyphicon glyphicon-plus'></i>Ubicaciones de Manzana</a></li>
                    <li><a href="{{route('admin.usossuelo.index')}}"><i class='glyphicon glyphicon-plus'></i>Usos de Suelo</a></li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
