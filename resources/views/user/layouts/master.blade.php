<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>POS - Online Website</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('user/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('owl/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('owl/owl.theme.default.min.css') }}">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('user/css/style.css') }}" rel="stylesheet">

    {{-- Bootstrap Css --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
</head>

<body>
    <!-- Navbar Start -->
    <div class="container-fluid bg-dark mb-30 sticky-top w-100">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn d-flex align-items-center justify-content-between mt-1 w-100"
                    href="{{ route('user#home') }}" style="height: 65px; padding: 0 30px;">
                    <img src="{{ asset('logo.png') }}" alt="" style="width:80px">
                </a>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark  py-lg-0 px-0 d-f">
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-1">
                            <a href="{{ route('user#home') }}" class=" text-white nav-item nav-link">Home</a>
                            <a href="{{ route('user#contact') }}" class=" text-white nav-item nav-link">Contact Us</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0 d-flex align-items-center">
                            <a href="#" class="text-decoration-none d-flex align-items-center">
                                <div class="">
                                    @if (Auth::user()->image == null)
                                        @if (Auth::user()->gender == 'Male')
                                            <td class="text-center">
                                                <img class="img-thumbnail rounded-circle"
                                                    src="{{ asset('admin/profile/default_male.jpg') }}"
                                                    style="width:50px; height:50px">
                                            </td>
                                        @else
                                            <td class="text-center">
                                                <img class="img-thumbnail rounded-circle"
                                                    src="{{ asset('admin/profile/default_female.jpg') }}"
                                                    style="width:50px; height:50px">
                                            </td>
                                        @endif
                                    @else
                                        <img src="{{ asset('storage/' . Auth::user()->image) }}"
                                            style="width:50px; height:50px" class="img-thumbnail rounded-circle"
                                            alt="profile" />
                                    @endif
                                </div>
                                <span class=" text-white ms-1"
                                    style="text-transform: capitalize">{{ Auth::user()->name }}</span>
                            </a>
                            <div class="dropdown open ms-2 me-5 pt-2">
                                <a class="dropdown-toggle" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="fas fa-angle-down fs-4 text-warning" style="cursor: pointer"></i>
                                </a>
                                <div class="dropdown-menu  m-0 p-0" aria-labelledby="triggerId" style="width:210px;">
                                    <div class="dropdown-item text-center py-2 border border-0 border-bottom">
                                        @if (Auth::user()->image == null)
                                            @if (Auth::user()->gender == 'Male')
                                                <td class="text-center">
                                                    <img class="img-thumbnail rounded"
                                                        src="{{ asset('admin/profile/default_male.jpg') }}"
                                                        style="width:90px; height:90px">
                                                </td>
                                            @else
                                                <td class="text-center">
                                                    <img class="img-thumbnail rounded"
                                                        src="{{ asset('admin/profile/default_female.jpg') }}"
                                                        style="width:90px; height:90px">
                                                </td>
                                            @endif
                                        @else
                                            <img src="{{ asset('storage/' . Auth::user()->image) }}"
                                                style="width:70px; height:70px" class="img-thumbnail rounded border"
                                                alt="profile" />
                                        @endif
                                    </div>
                                    <a class="dropdown-item mt-1 py-2 border border-0 border-bottom"
                                        href="{{ route('user#accountDetail') }}">
                                        <i class="text-warning fs-5 fas fa-user me-2"></i>
                                        <span style="font-size: 18px;">Account</span></a>
                                    <a class="dropdown-item mt-1 py-2 border border-0 border-bottom"
                                        href="{{ route('user#changePasswordPage') }}">
                                        <i class="text-warning fs-5 fas fa-key me-2"></i>
                                        <span style="font-size: 18px;"> Change Password</span></a>
                                    <div class="">
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                class="btn btn-warning text-white  d-flex justify-content-start align-items-center w-100">
                                                <i class="fas fa-power-off mx-2 fs-5"></i><span style="font-size: 18px;"
                                                    class="ms-2">
                                                    Logout</span></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @yield('cart')
                            {{-- @yield('history') --}}
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Shop Start -->
    @yield('content')
    <!-- Shop End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-secondary mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <h5 class="text-secondary text-uppercase mb-4">Get In Touch</h5>
                <p class="mb-4">No dolore ipsum accusam no lorem. Invidunt sed clita kasd clita et et dolor sed
                    dolor. Rebum tempor no vero est magna amet no</p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-warning me-2"></i>123 Street, New York, USA</p>
                <p class="mb-2"><i class="fa fa-envelope text-warning me-2"></i>info@example.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-warning me-2"></i>+012 345 67890</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Quick Shop</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="#"><i
                                    class="fa fa-angle-right me-2"></i>Home</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right me-2"></i>Our
                                Shop</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right me-2"></i>Shop
                                Detail</a>
                            <a class="text-secondary mb-2" href="#"><i
                                    class="fa fa-angle-right me-2"></i>Shopping
                                Cart</a>
                            <a class="text-secondary mb-2" href="#"><i
                                    class="fa fa-angle-right me-2"></i>Checkout</a>
                            <a class="text-secondary" href="#"><i class="fa fa-angle-right me-2"></i>Contact
                                Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">My Account</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="#"><i
                                    class="fa fa-angle-right me-2"></i>Home</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right me-2"></i>Our
                                Shop</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right me-2"></i>Shop
                                Detail</a>
                            <a class="text-secondary mb-2" href="#"><i
                                    class="fa fa-angle-right me-2"></i>Shopping
                                Cart</a>
                            <a class="text-secondary mb-2" href="#"><i
                                    class="fa fa-angle-right me-2"></i>Checkout</a>
                            <a class="text-secondary" href="#"><i class="fa fa-angle-right mr-2"></i>Contact
                                Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Newsletter</h5>
                        <p>Duo stet tempor ipsum sit amet magna ipsum tempor est</p>
                        <form action="">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Your Email Address">
                                <div class="input-group-append">
                                    <button class="btn btn-warning">Sign Up</button>
                                </div>
                            </div>
                        </form>
                        <h6 class="text-secondary text-uppercase mt-4 mb-3">Follow Us</h6>
                        <div class="d-flex">
                            <a class="btn btn-warning btn-square me-2" href="#"><i
                                    class="fab fa-twitter"></i></a>
                            <a class="btn btn-warning btn-square me-2" href="#"><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-warning btn-square me-2" href="#"><i
                                    class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-warning btn-square" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top mx-xl-5 py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-secondary">
                    &copy; <a class="text-warning" href="#">Domain</a>. All Rights Reserved. Designed
                    by
                    <a class="text-warning" href="https://htmlcodex.com">HTML Codex</a>
                </p>
            </div>
            <div class="col-md-6 px-xl-0 text-center text-md-right">
                {{-- <img class="img-fluid" src="img/payments.png" alt=""> --}}
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-warning back-to-top"><i class="fa fa-angle-double-up"></i></a>


    {{-- jQuery --}}
    <script src="{{ asset('jQuery/jquery.js') }}"></script>
    <!-- JavaScript Libraries -->
    {{-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script> --}}
    <script src="{{ asset('user/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('owl/owl.carousel.min.js') }}"></script>
    {{-- <script src="{{ asset('user/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('user/lib/owlcarousel/owl.carousel.js') }}"></script> --}}

    <!-- Contact Javascript File -->
    {{-- <script src="{{ asset('user/mail/jqBootstrapValidation.min.js') }}"></script>
    <script src="{{ asset('user/mail/contact.js') }}"></script> --}}

    <!-- Template Javascript -->
    <script src="{{ asset('user/js/main.js') }}"></script>

    {{-- Bootstrap Js --}}
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

@yield('ajaxContent')
@yield('carousel')
@yield('script')

</html>
