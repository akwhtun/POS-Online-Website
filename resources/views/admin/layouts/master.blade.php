<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>@yield('title')</title>

    <!-- Fontfaces CSS-->
    <link href="{{ asset('admin/css/font-face.css" rel="stylesheet') }}" media="all">
    <link href="{{ asset('admin/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet"
        media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ asset('admin/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">

    <!-- Vendor CSS-->
    <link href="{{ asset('admin/vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet"
        media="all">
    <link href="{{ asset('admin/vendor/wow/animate.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/slick/slick.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ asset('admin/css/theme.css') }}" rel="stylesheet" media="all">
</head>

<body class="animsition">
    <div class="page-wrapper" style="position: relative">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-lg-block d-flex col-lg-0 w-100">
            <div class="logo">
                <a href="{{ route('category#list') }}">
                    <img src="{{ asset('logo.png') }}" alt="POS" style="width: 120px">
                </a>
            </div>
            {{-- <div>
                text-end
                d-flex w-100 text-center mt-3
            </div> --}}
            <div class="menu-sidebar__content js-scrollbar1 w-100">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list d-lg-block d-flex text-lg-start text-center mt-lg-4"
                        style="transform: translateY(-20px)">
                        <li>
                            <a href="{{ route('category#list') }}">
                                <i class="fs-5 fas fa-chart-bar"></i><span
                                    class="d-lg-inline d-none">Category</span></a>
                        </li>
                        <li>
                            <a href="{{ route('pizza#list') }}">
                                <i class="fs-5 fab fa-product-hunt"></i><span
                                    class="d-lg-inline d-none">Product</span></a>
                        </li>
                        <li>
                            <a href="{{ route('order#list') }}">
                                <i class="fs-5 fas fa-list-alt"></i><span class="d-lg-inline d-none">Order
                                    List</span></a>
                        </li>
                        <li>
                            <a href="{{ route('userLists#view') }}">
                                <i class="fs-5 fas fa-users"></i><span class="d-lg-inline d-none">Users</span></a>
                        </li>
                        <li>
                            <a href="{{ route('userContact#list') }}">
                                <i class="fs-5 fas fa-users-cog"></i><span class="d-lg-inline d-none">Users
                                    Contact</span></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <div>
                                <p class="text-dark" style="font-size: 25px;">Admin Dashboard Panel</p>
                            </div>
                            <div class="header-button">
                                <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                        <i class=""></i>
                                    </div>
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image" style="width:50px; height: 50px;">
                                            @if (Auth::user()->image == null)
                                                @if (Auth::user()->gender == 'Male')
                                                    <td class="text-center">
                                                        <img class="img-thumbnail rounded"
                                                            src="{{ asset('admin/profile/default_male.jpg') }}">
                                                    </td>
                                                @else
                                                    <td class="text-center">
                                                        <img class="img-thumbnail rounded"
                                                            src="{{ asset('admin/profile/default_female.jpg') }}">
                                                    </td>
                                                @endif
                                            @else
                                                <img src="{{ asset('storage/' . Auth::user()->image) }}"
                                                    class="img-thumbnail rounded-circle w-100 h-100" alt="profile" />
                                            @endif
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">{{ Auth::user()->name }}</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image" style="width:70px; height: 70px;">
                                                    @if (Auth::user()->image == null)
                                                        @if (Auth::user()->gender == 'Male')
                                                            <td class="text-center">
                                                                <img class="img-thumbnail rounded"
                                                                    src="{{ asset('admin/profile/default_male.jpg') }}">
                                                            </td>
                                                        @else
                                                            <td class="text-center">
                                                                <img class="img-thumbnail rounded"
                                                                    src="{{ asset('admin/profile/default_female.jpg') }}">
                                                            </td>
                                                        @endif
                                                    @else
                                                        <img src="{{ asset('storage/' . Auth::user()->image) }}"
                                                            class="img-thumbnail w-100 h-100 rounded-circle"
                                                            alt="profile" />
                                                    @endif
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">{{ Auth::user()->name }}</a>
                                                    </h5>
                                                    <span class="email">{{ Auth::user()->email }}</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="{{ route('accountDetail') }}">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="{{ route('changePasswordPage') }}">
                                                        <i class="fas fa-key"></i>Change Password</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="{{ route('adminLists#view') }}">
                                                        <i class="fas fa-users"></i>Admin Lists</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <form action="{{ route('logout') }}" method="POST">
                                                    @csrf
                                                    <button type="submit"
                                                        class="btn btn-dark  d-flex justify-content-start align-items-center w-100">
                                                        <i class="zmdi zmdi-power mx-3"></i>Logout</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            @yield('content')
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="{{ asset('admin/vendor/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap JS-->
    <script src="{{ asset('admin/vendor/bootstrap-4.1/popper.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
    <!-- Vendor JS       -->
    <script src="{{ asset('admin/vendor/slick/slick.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/wow/wow.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/animsition/animsition.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/counter-up/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/counter-up/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('admin/vendor/chartjs/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/select2/select2.min.js') }}"></script>

    <!-- Main JS-->
    <script src="{{ asset('admin/js/main.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.bar').on('click', function() {
                $('.lists').slideToggle(400);
            })
        })
    </script>

</body>

@yield('ajaxContent');

</html>
<!-- end document-->
