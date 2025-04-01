<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title')</title>

    {{--
    <link rel="icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}"> --}}

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    @if(Request::path() == 'dashboard' || Request::path() == 'helpdesk'
    || Request::path() == 'unit' || Request::segment(1) == 'users'
    || Request::segment(1) == 'category')
    <link rel="stylesheet" href="{{asset('assets/js/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/js/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}">
    @endif

    <!-- Sweetalert 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">

</head>

<body>

    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg" style="background-color: red;"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="fas fa-bars"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">

                            <img alt="image" src="{{ asset('assets/img/avatar/' . (Auth::user()->profile_picture != "" 
                                ? Auth::user()->profile_picture : 'avatar-5.png')) }}" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="#" data-toggle="modal" data-target="#exampleModal"
                                class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>

            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">

                    <div class="sidebar-brand">
                        <a href="{{url('/')}}">HelpDesk</a>
                    </div>

                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="{{url('/')}}">HD</a>
                    </div>

                    <ul class="sidebar-menu">
                        <li class="menu-header">Menu Dashboard</li>

                        <li class="nav-item @if(Request::path() == 'dashboard') active @endif">
                            <a href="{{ url('/dashboard') }}" class="nav-link">
                                <i class="bi bi-speedometer pl-3"></i><span>Dashboard</span></a>
                        </li>

                        @if(Auth::user()->role == "admin")

                        <li class="menu-header">Main Navigation</li>

                        <li class="nav-item @if(Request::path() == 'helpdesk') active @endif">
                            <a href="{{ url('/helpdesk') }}" class="nav-link">
                                <i class="bi bi-calendar3-week-fill pl-3"></i><span>Helpdesk</span></a>
                        </li>

                        <li class="menu-header">Master Kategori</li>

                        <li class="nav-item @if(Request::segment(1) == 'category') active @endif">
                            <a href="{{ url('/category') }}" class="nav-link">
                                <i class="bi bi-tools pl-3"></i><span>Setting Kategori</span></a>
                        </li>

                        <li class="menu-header">User Unit</li>

                        <li class="nav-item @if(Request::segment(1) == 'users') active @endif">
                            <a href="{{ url('/users') }}" class="nav-link">
                                <i class="bi bi-tools pl-3"></i><span>Setting User</span></a>
                        </li>

                        <li class="menu-header">Management Unit</li>

                        <li class="nav-item @if(Request::path() == 'unit') active @endif">
                            <a href="{{ url('/unit') }}" class="nav-link">
                                <i class="bi bi-tools pl-3"></i><span>Setting Unit</span></a>
                        </li>
                        @endif

                        <li class="menu-header">Pengaturan</li>
                        <li class="nav-item @if(Request::path() == 'change-password') active @endif">
                            <a href="{{url('change-password')}}" class="nav-link"><i
                                    class="bi bi-shield-lock-fill pl-3"></i>
                                <span>Ganti Password</span></a>
                        </li>
                    </ul>
                </aside>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section mt-4">
                    <div class="section-body">
                        @yield('content')
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="{{ url('logout') }}" class="btn btn-danger">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="{{asset('assets/js/stisla.js')}}"></script>

    @if(Request::path() == 'dashboard' || Request::path() == 'helpdesk'
    || Request::path() == 'unit' || Request::segment(1) == 'users'
    || Request::segment(1) == 'category')
    <!-- JS Libraies -->
    <script src="{{asset('assets/js/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/js/datatables.net-select-bs4/js/select.bootstrap4.min.js')}}"></script>
    @endif

    <!-- Template JS File -->
    <script src="{{asset('assets/js/scripts.js')}}"></script>
    <script src="{{asset('assets/js/custom.js')}}"></script>

    @if(Request::path() == 'dashboard' || Request::path() == 'helpdesk'
    || Request::path() == 'unit' || Request::segment(1) == 'users'
    || Request::segment(1) == 'category')
    <!-- Page Specific JS File -->
    <script src="{{asset('assets/js/page/modules-datatables.js')}}"></script>
    @endif

    {{-- Main vanilla JavaScript --}}
    <script src="{{asset('assets/js/script.js')}}"></script>

</body>

</html>