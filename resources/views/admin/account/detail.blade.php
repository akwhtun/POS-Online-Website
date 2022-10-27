@extends('admin.layouts.master')

@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            @if (session('updateSuccess'))
                <div class="alert-message col-lg-8 col-12 mx-auto">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <p>{{ session('updateSuccess') }}</p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
            <div class="container-fluid">
                <div class="col-lg-8 offset-lg-2 col-12 mx-auto">
                    <div class="card p-3">
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Account Info</h3>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-md-6  col-12">
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
                                <div class="col-md-5 col-md- col-12 ms-1">
                                    <div class="text-dark fs-5">
                                        <p class="mt-1"> <i class="fas fa-user me-2"></i> {{ Auth::user()->name }} &nbsp;
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
                                    <a href="{{ route('editAccountDetail') }}"
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
    <!-- END MAIN CONTENT-->
@endsection
