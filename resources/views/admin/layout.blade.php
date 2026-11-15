<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin Dashboard') - OneMovies Admin</title>

    <!-- Bootstrap 3 Core CSS -->
    <link href="{{ asset('template/css/bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('template/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />

    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            padding-top: 60px;
        }
        .navbar-admin {
            background-color: #222d32;
            border-color: #1a2226;
            border-radius: 0;
            margin-bottom: 0;
        }
        .navbar-admin .navbar-brand {
            color: #ffffff;
            font-weight: bold;
        }
        .navbar-admin .navbar-brand:hover {
            color: #FF8D1B;
        }
        .navbar-admin .navbar-nav > li > a {
            color: #b8c7ce;
        }
        .navbar-admin .navbar-nav > li > a:hover {
            color: #ffffff;
            background-color: #1e282c;
        }
        .sidebar {
            background-color: #ffffff;
            border-radius: 4px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        .sidebar .list-group-item {
            border-radius: 0;
            border-left: 3px solid transparent;
            color: #444;
            font-size: 14px;
            padding: 12px 15px;
        }
        .sidebar .list-group-item:hover {
            background-color: #f9f9f9;
            color: #FF8D1B;
        }
        .sidebar .list-group-item.active,
        .sidebar .list-group-item.active:hover,
        .sidebar .list-group-item.active:focus {
            background-color: #FF8D1B;
            border-color: #FF8D1B;
            border-left-color: #d86f06;
            color: #ffffff;
            font-weight: bold;
        }
        .sidebar .list-group-item i {
            width: 20px;
            margin-right: 8px;
        }
        .main-content {
            background-color: #ffffff;
            border-radius: 4px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            padding: 25px;
            min-height: 500px;
        }
        .page-header-admin {
            margin-top: 0;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .page-header-admin h2 {
            margin: 0;
            font-size: 22px;
            color: #333;
        }
        .table-responsive {
            margin-top: 15px;
        }
        .table > thead > tr > th {
            background-color: #f7f7f7;
            border-bottom: 2px solid #ddd;
            color: #555;
        }
        .badge-role-admin {
            background-color: #d9534f;
        }
        .badge-role-user {
            background-color: #5bc0de;
        }
        .star-rating {
            color: #f0ad4e;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-admin navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#admin-navbar-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar" style="background-color: #fff;"></span>
                    <span class="icon-bar" style="background-color: #fff;"></span>
                    <span class="icon-bar" style="background-color: #fff;"></span>
                </button>
                <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-film"></i> One<span>Movies</span> Admin
                </a>
            </div>

            <div class="collapse navbar-collapse" id="admin-navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="{{ route('home') }}" target="_blank">
                            <i class="fa fa-globe"></i> Lihat Website
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user-circle"></i> {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="#" onclick="event.preventDefault(); document.getElementById('admin-logout-form').submit();">
                                    <i class="fa fa-sign-out"></i> Logout
                                </a>
                                <form id="admin-logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Container -->
    <div class="container-fluid" style="margin-top: 15px;">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 col-sm-3">
                <div class="sidebar">
                    <div class="list-group">
                        <a href="{{ route('admin.dashboard') }}" class="list-group-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                            <i class="fa fa-dashboard"></i> Dashboard
                        </a>
                        <a href="{{ route('admin.films.index') }}" class="list-group-item {{ request()->routeIs('admin.films.*') ? 'active' : '' }}">
                            <i class="fa fa-video-camera"></i> Film
                        </a>
                        <a href="{{ route('admin.casts.index') }}" class="list-group-item {{ request()->routeIs('admin.casts.*') ? 'active' : '' }}">
                            <i class="fa fa-users"></i> Cast
                        </a>
                        <a href="{{ route('admin.genres.index') }}" class="list-group-item {{ request()->routeIs('admin.genres.*') ? 'active' : '' }}">
                            <i class="fa fa-tags"></i> Genre
                        </a>
                        <a href="{{ route('admin.perans.index') }}" class="list-group-item {{ request()->routeIs('admin.perans.*') ? 'active' : '' }}">
                            <i class="fa fa-id-badge"></i> Peran
                        </a>
                        <a href="{{ route('admin.kritiks.index') }}" class="list-group-item {{ request()->routeIs('admin.kritiks.*') ? 'active' : '' }}">
                            <i class="fa fa-comments"></i> Komentar
                        </a>
                        <a href="{{ route('admin.users.index') }}" class="list-group-item {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                            <i class="fa fa-user"></i> User
                        </a>
                        <a href="#" class="list-group-item text-danger" onclick="event.preventDefault(); document.getElementById('admin-logout-form').submit();">
                            <i class="fa fa-power-off text-danger"></i> Logout
                        </a>
                    </div>
                </div>
            </div>

            <!-- Content Area -->
            <div class="col-md-10 col-sm-9">
                <!-- Flash Messages -->
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <i class="fa fa-check-circle"></i> {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <i class="fa fa-exclamation-circle"></i> {{ session('error') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong><i class="fa fa-warning"></i> Terjadi kesalahan validasi:</strong>
                        <ul style="margin-top: 5px; margin-bottom: 0; padding-left: 20px;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="main-content">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('template/js/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('template/js/bootstrap.min.js') }}"></script>
    @stack('scripts')
</body>
</html>
