<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

        <li class="nav-header">Genel</li>
        <li class="nav-item">
            <a href="pages/calendar.html" class="nav-link">
                <i class="nav-icon fa fa-list"></i>
                <p>
                    Ayarlar
                    <span class="badge badge-info right">2</span>
                </p>
            </a>
        </li>


        <li class="nav-header">İçerikler</li>
        <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    İçerikler
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="./index.html" class="nav-link active">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Dashboard v1</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./index2.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Dashboard v2</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./index3.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Dashboard v3</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Sliderlar
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="./index.html" class="nav-link active">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Dashboard v1</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./index2.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Dashboard v2</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./index3.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Dashboard v3</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-header">Listeler</li>
        <li class="nav-item">
            <a href="{{ route('menuadmin') }}" class="nav-link">
                <i class="nav-icon fa fa-list"></i>
                <p>
                    Menüler
                    <span class="badge badge-info right">2</span>
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('categoryadmin') }}" class="nav-link">
                <i class="nav-icon fa fa-list"></i>
                <p>
                    Kategoriler
                    <span class="badge badge-info right">2</span>
                </p>
            </a>
        </li>


    </ul>
</nav>
