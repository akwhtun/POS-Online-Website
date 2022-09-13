@extends('admin.layouts.master')

@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div>
            <div class="container-fluid">
                <div class="col-lg-9 mx-auto">
                    <div class="card border border-4 border-light">
                        <div class="card-body">
                            <div class="card-title px-3">
                                <p onclick="history.back()" style="cursor: pointer">
                                    <i class="fas fa-long-arrow-alt-left fs-4 text-dark"></i>
                                </p>
                                <h3 class="text-center title-2">Pizza Details</h3>
                            </div>
                            <hr class="text-dark bg-dark" style="height: 3px;">
                            <div class="row">
                                {{-- <div class="col-5">
                                    <div class="img" style="width: 350px;height:320px;">
                                        <img src="{{ asset('storage/pizza/' . $product->image) }}"
                                            class="rounded img-thumbnail w-100 h-100" alt="">
                                    </div>
                                </div> --}}
                                <p class=" bg-light shadow-sm py-2 col-4 mx-auto text-center text-danger"><i
                                        class=" fs-5 fas fa-sticky-note"></i>
                                    &nbsp;{{ $product->name }}</p>
                                <div class="row d-flex justify-content-evenly mt-3">

                                    <span class="text-center rounded bg-light shadow-sm py-1 col-3"><i
                                            class=" fs-5 fas fa-money-bill-wave-alt text-secondary"></i>
                                        &nbsp;{{ $product->price }} Kyats</span>
                                    <span class="text-center rounded bg-light shadow-sm py-1 col-2"><i
                                            class=" fs-5 fas fa-clock text-warning"></i>
                                        &nbsp;{{ $product->waiting_time }} mins</span>

                                    <span class="text-center rounded bg-light shadow-sm py-1 col-2"><i
                                            class=" fs-5 fas fa-eye text-primary"></i>
                                        &nbsp;{{ $product->view_count }}</span>
                                    <span class="text-center rounded bg-light shadow-sm py-1 col-4"><i
                                            class=" fs-5 fas fa-clone text-success"></i>
                                        &nbsp;{{ $product->category_name }}</span>

                                </div>
                                <div class="d-flex mt-4 flex-wrap">

                                    <p class="img col-5" style="width: 350px;height:320px;">
                                        <img src="{{ asset('storage/pizza/' . $product->image) }}"
                                            class="rounded img-thumbnail w-100 h-100" alt="">
                                    </p>
                                    <p class="col-7" style="font-size:17px;text-indent: 25px">

                                        {{ $product->description }}
                                    </p>

                                </div>
                                <div class="d-flex justify-content-end">
                                    <p class="fs-5 col-4 bg-light shadow-sm py-2"><i class="fas fa-user-clock"></i>
                                        &nbsp;
                                        {{ $product->created_at->format('j-F-y') }}</p>
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
