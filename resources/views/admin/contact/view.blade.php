@extends('admin.layouts.master')

@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div>
            <div class="container-fluid">
                <div class="col-lg-7 mx-auto">
                    <div class="card border border-4 border-light">
                        <div class="card-body">
                            <div class="card-title px-3">
                                <p onclick="history.back()" style="cursor: pointer">
                                    <i class="fas fa-long-arrow-alt-left fs-4 text-dark"></i>
                                </p>
                                <h3 class="text-center title-2">User Contact Message</h3>
                            </div>
                            <div class="row ">
                                <div class="d-flex justify-content-around mt-3">
                                    <p class="mt-3">
                                        <i class="fas fa-user fs-5 me-1"></i>Name :
                                        <span>{{ $data->name }}</span>
                                    </p>
                                    <p class="mt-3">
                                        <i class="fas fa-envelope fs-5 me-1"></i>Email :
                                        <span>{{ $data->email }}</span>
                                    </p>
                                </div>
                                <p class="mt-4 ms-2">
                                    <i class="fas fa-paragraph fs-5 me-1"></i>Message :
                                    <span>{{ $data->message }}</span>
                                </p>
                            </div>

                            <div class="text-end mt-3">
                                <a href="" class="btn btn-dark"> <i class="fas fa-check"></i> Mark as read</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection
