<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield ('title') | SPK Kredit</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/adminlte/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="/adminlte/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/adminlte/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/adminlte/css/skins/_all-skins.min.css">
    {{-- Data Table --}}
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <!-- Icons -->
    <link rel="apple-touch-icon" sizes="76x76" href="/img/logolpd.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/img/logolpd.png">

    @yield('css')
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="/" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>SPK</b></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><i class="fa fa-credit-card"></i><b> SPK</b> KREDIT</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="/img/logolpd_noborder.jpg" class="user-image" alt="User Image">
                                <span class="hidden-xs">{{ auth()->user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="/img/logolpd_noborder.jpg" class="img-circle" alt="User Image">
                                    <p>
                                        {{ auth()->user()->name }}
                                        <small>{{ auth()->user()->email }}</small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <!-- <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div> -->
                                <!-- /.row -->
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            @if (auth()->user()->role == 'nasabah')
                                <div class="pull-left">
                                    <a href="/profil" class="btn btn-info btn-flat">Profil</a>
                                </div>
                            @endif
                            <div class="pull-right">
                                <a href="/logout" class="btn btn-danger btn-flat">Logout</a>
                            </div>
                        </li>
                    </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <!-- <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a> -->
                    </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="/img/logolpd_noborder.jpg" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>{{ auth()->user()->name }}</p>
                        <a href="#"><i class="fa fa-circle text-success"></i>Online</a>
                    </div>
                </div>
                <!-- search form -->
                {{-- <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                                    class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form> --}}
                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li><a href="/dashboard"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
                    @if (auth()->user()->role == 'admin')
                        <li class="header">PERHITUNGAN</li>
                        <li><a href="/perhitungan"><i class="fa fa-calculator"></i><span>Perhitungan</span></a></li>
                    @endif
                    <li class="header">DATA</li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-user"></i>
                            <span>Nasabah</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-down pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            @if (auth()->user()->role == 'admin')
                                <li><a href="/nasabah/data_nasabah"><i class="fa fa-circle-o"></i>Data Nasabah</a>
                                </li>
                            @endif
                            @if (auth()->user()->role == 'nasabah')
                                <li><a href="/nasabah/pengajuan"><i class="fa fa-circle-o"></i>Data Pengajuan</a></li>
                                <li><a href="/nasabah/riwayat_pengajuan"><i class="fa fa-circle-o"></i>Riwayat
                                        Pengajuan</a></li>
                            @endif
                            @if (auth()->user()->role == 'admin' || auth()->user()->role == 'kepalalpd')
                                <li><a href="/nasabah/status_pengajuan"><i class="fa fa-circle-o"></i>Status
                                        Pengajuan</a>
                                </li>
                            @endif
                            @if (auth()->user()->role == 'admin')
                                <li><a href="/nasabah/status_peminjaman"><i class="fa fa-circle-o"></i>Status
                                        Peminjaman</a>
                                </li>
                            @endif
                        </ul>
                    </li>
                    @if (auth()->user()->role == 'admin')
                        <li><a href="/kriteria"><i class="fa fa-file-text"></i><span>Kriteria</span></a></li>
                    @endif
                    <li class="header">ABOUT</li>
                    <!-- <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Hubungi Admin</span></a></li> -->
                    <li><a href="/alur_pengajuan"><i class="fa fa-refresh"></i> <span>Alur Pengajuan</span></a></li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>
