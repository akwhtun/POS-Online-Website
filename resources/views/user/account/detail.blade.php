@extends('user.layouts.master')
@section('cart')
    <a href="{{ route('cart#orderList') }}" class="btn px-0 ml-3 me-4" id="cartItem">
        <i class="fas fs-5 fa-shopping-cart text-warning"></i>
        <span class="badge text-light border border-light rounded-circle" style="padding-bottom: 2px;">
            {{ count($cart) }}
        </span>
    </a>
@endsection
@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            @if (session('updateSuccess'))
                <div class="alert-message col-lg-6 mx-auto offset-3">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <p class="m-0 p-0">{{ session('updateSuccess') }}</p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
            <div class="container-fluid">
                <div class="col-xl-6 col-lg-8 col-md-10 col-12 mx-auto">
                    <div class="card p-3">
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Account Info</h3>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-lg-6 col-md-8 col-12 mx-auto text-lg-start text-center">
                                    <div class="image" style="height:300px">
                                        @if (Auth::user()->image == null)
                                            @if (Auth::user()->gender == 'Male')
                                                <td class="text-center">
                                                    <img class="img-thumbnail rounded w-100 h-100"
                                                        src="{{ asset('admin/profile/default_male.jpg') }}">
                                                </td>
                                            @else
                                                <td class="text-center">
                                                    <img class="img-thumbnail rounded w-100 h-100"
                                                        src="{{ asset('admin/profile/default_female.jpg') }}">
                                                </td>
                                            @endif
                                        @else
                                            <img src="{{ asset('storage/' . Auth::user()->image) }}"
                                                class="img-thumbnail  w-100 h-100" alt="profile" />
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-8 col-12 mx-auto text-start">
                                    <div class="text-dark fs-5">
                                        <p class="mt-1" style="text-transform: capitalize"> <i
                                                class="fas fa-user me-2"></i> {{ Auth::user()->name }} &nbsp;
                                        </p>
                                        <p class="mt-3"> <i class="fas fa-envelope me-2"></i> {{ Auth::user()->email }}
                                        </p>
                                        <p class="mt-3"> <i class="fas fa-phone me-2"></i> {{ Auth::user()->phone }}
                                        </p>
                                        @if (Auth::user()->gender == 'Male')
                                            <p class="mt-3"> <i class="fas fa-male me-2 fs-3"></i>
                                                {{ Auth::user()->gender }}
                                            </p>
                                        @else
                                            <p class="mt-3"> <i class="fas fa-female me-2 fs-3"></i>
                                                {{ Auth::user()->gender }}
                                            </p>
                                        @endif
                                        <p class="mt-3"> <i class="fas fa-map-marker me-2"></i>
                                            {{ Auth::user()->address }}</p>
                                        <p class="mt-3"> <i class="fas fa-user-clock me-2"></i>
                                            {{ Auth::user()->created_at->format('j-F-y') }}</p>
                                    </div>
                                </div>
                                <div class="text-center mt-1">
                                    <a href="{{ route('user#editAccountDetail') }}"
                                        class=" d-block btn btn-dark py-2 mx-auto mt-3 w-100">
                                        Edi Profile &nbsp; <i class="fas fa-edit me-2"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
