<!doctype html>

<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title') - Perpustakaan</title>
    <meta name="description" content="Perpustakaan">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('style/vendors/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('style/vendors/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('style/vendors/themify-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{ asset('style/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{ asset('style/vendors/selectFX/css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{ asset('style/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('style/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">

    <link rel="stylesheet" href="{{ asset('style/assets/css/style.css')}}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body>
    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="">Perpustakaan</a>
                <a class="navbar-brand hidden" href="">P</a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="/"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <li>
                        <a href="{{ route('petugas.petugas') }}"> <i class="menu-icon fa fa-user"></i>Petugas</a>
                    </li>
                    <li>
                        <a href="{{ route('anggota.anggota') }}"> <i class="menu-icon fa fa-user"></i>Anggota</a>
                    </li>
                    <li class="menu-item-has-children dropdown" >
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-book"></i>Buku</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-puzzle-piece"></i><a href="{{ route('buku.index') }}">Data Buku</a></li>
                            <li><i class="fa fa-puzzle-piece"></i><a href="{{ route('kategori.index') }}">Kategori</a></li>
                            <li><i class="fa fa-puzzle-piece"></i><a href="{{ route('penerbit.index') }}">Penerbit</a></li>
                            <li><i class="fa fa-puzzle-piece"></i><a href="{{ route('penulis.penulis') }}">Penulis</a></li>
                            <li><i class="fa fa-puzzle-piece"></i><a href="{{ route('rak.index') }}">Rak</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('peminjaman.peminjaman') }}"> <i class="menu-icon fa fa-puzzle-piece"></i>Peminjaman</a>
                    </li>
                    <li>
                        <a href="{{ route('denda.denda') }}"> <i class="menu-icon fa fa-puzzle-piece"></i>Denda</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="{{ asset('style/images/admin.jpg')}}" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#"><i class="fa fa-user"></i> My Profile</a>
                            <a class="nav-link" href="#"><i class="fa fa-cog"></i> Settings</a>
                            <a class="nav-link" href="#"  data-toggle="modal" data-target="#logoutModal"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>
                </div>
            </div>

        </header>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Yakin mau Logout?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Pilih "Keluar" di bawah jika Anda siap untuk mengakhiri sesi Anda saat ini.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                        <form action="/logout" method="POST">
                            @csrf
                            <button class="btn btn-primary" type="submit" class="nav-link">
                                <i class="fas fa-sign-out-alt fa-fw"></i>
                                <span>Keluar</span>
                            </button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        
        @yield('breadcrumbs')
        
        @yield('content')

    </div>


    <script src="{{ asset('style/vendors/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{ asset('style/vendors/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{ asset('style/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('style/assets/js/main.js')}}"></script>

    <script src="{{ asset('style/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('style/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('style/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('style/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('style/vendors/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{ asset('style/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{ asset('style/vendors/pdfmake/build/vfs_fonts.js')}}"></script>
    <script src="{{ asset('style/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('style/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{ asset('style/vendors/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
    <script src="{{ asset('style/assets/js/init-scripts/data-table/datatables-init.js')}}"></script>
    
</body>

</html>

