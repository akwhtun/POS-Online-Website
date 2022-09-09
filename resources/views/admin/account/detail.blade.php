@extends('admin.layouts.master')

@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-lg-8 offset-2">
                    <div class="card p-3">
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Account Info</h3>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-5">
                                    <div class="image">
                                        @if (Auth::user()->image == null)
                                            <img src="{{ asset('admin/profile/default.jpg') }}"
                                                class="img-thumbnail rounded-circle" alt="default" />
                                        @else
                                            <img src="{{ asset('admin/images/icon/avatar-01.jpg') }}"
                                                class="img-thumbnail rounded-circle" alt="profile" />
                                        @endif
                                    </div>
                                </div>
                                <div class="col-6 ms-1">
                                    <div class="text-dark fs-5">
                                        <p class="mt-1"> <i class="fas fa-user me-2"></i> {{ Auth::user()->name }}</p>
                                        <p class="mt-3"> <i class="fas fa-envelope me-2"></i> {{ Auth::user()->email }}
                                        </p>
                                        <p class="mt-3"> <i class="fas fa-phone me-2"></i> {{ Auth::user()->phone }}</p>
                                        <p class="mt-3"> <i class="fas fa-map-marker me-2"></i>
                                            {{ Auth::user()->address }}</p>
                                        <p class="mt-3"> <i class="fas fa-user-clock me-2"></i>
                                            {{ Auth::user()->created_at->format('j-F-y') }}</p>
                                    </div>
                                </div>
                                <div class="text-center mt-1">
                                    <button class="btn btn-dark ms-5"><i class="fas fa-edit me-2"></i>Edit Profile</button>
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
