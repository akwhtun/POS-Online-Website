@extends('admin.layouts.master')

@section('title', 'Order List Data')

@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="col-12">
                <a href="{{ route('order#list') }}" class="text-decoration-none text-dark">
                    <i class="fas fa-arrow-circle-left"></i><span class="ms-1">Back</span>
                </a>
            </div>
            <div
                class=" col-lg-7 col-12 mx-auto m-0 p-0 card border border-4 rounded shadow-sm @if ($order[0]->status == 0) border-warning
            @elseif($order[0]->status == 1)
                border-success
            @else
            border-danger @endif">
                <p
                    class="fs-5 text-white w-100 p-2  @if ($order[0]->status == 0) bg-warning
            @elseif($order[0]->status == 1)
                bg-success
            @else
            bg-danger @endif">
                    <i class="fas fa-clipboard me-2"></i> Order Info
                </p>
                <div class="d-flex pt-2">
                    <div class="img col-lg-5 d-lg-block d-none">
                        @if ($data[0]->user_image != null)
                            <img class="card-img-top rounded" style="width: 240px; height:230px"
                                src="{{ asset('storage/' . $data[0]->user_image) }}" alt="">
                        @else
                            @if ($data->user_gender == 'Male')
                                <img class="card-img-top rounded" src="{{ asset('admin/profile/default_male.jpg') }}"
                                    alt="">
                            @else
                                <img class="card-img-top rounded" src="{{ asset('admin/profile/default_male.jpg') }}"
                                    alt="">
                            @endif
                        @endif
                    </div>
                    <div class="col-lg-7 col-12 text-dark">
                        <div class="py-2 my-2 d-flex">
                            <div style="width: 140px;">
                                <i class=" fs-5 fas fa-user"></i>
                                <span>Name : </span>
                            </div>
                            <p class="d-inline me-1">{{ $data[0]->user_name }}</p>
                        </div>
                        <div class="py-2 my-2 d-flex">
                            <div style="width: 140px;">
                                <i class=" fs-5 fas fa-barcode"></i>
                                <span>Order Code : </span>
                            </div>
                            <p class="d-inline me-1">{{ $data[0]->order_code }}</p>
                        </div>
                        <div class="py-2 my-2 d-flex">
                            <div style="width: 140px;">
                                <i class=" fs-5 fas fa-money"></i>
                                <span>Price : </span>
                            </div>
                            <p class="d-inline me-1">{{ $order[0]->total_price - 3000 }} kyats</p>
                        </div>
                        <div class="py-2 my-2 d-flex">
                            <div style="width: 140px;">
                                <i class=" fs-5 fas fa-clock"></i>
                                <span>Order Date : </span>
                            </div>
                            <p class="d-inline me-1">{{ $data[0]->created_at->format('F-j-m') }}</p>
                        </div>
                    </div>
                </div>
                <div class="mt-2 py-3 d-flex">
                    <div class="col-4  ms-2 m-0 p-0">
                        <p class="d-inline">Order Status : </p>
                        @if ($order[0]->status == 0)
                            <span><i class="fas fa-hourglass-half text-warning"></i> Pending..</span>
                        @elseif($order[0]->status == 1)
                            <span><i class="fas fa-check text-success"></i> Success</span>
                        @else
                            <span><i class="fas fa-exclamation-triangle text-danger"></i>Reject</span>
                        @endif
                    </div>
                    <div class="col-8 ms-1 m-0 p-0">
                        <span>Total Price : </span>
                        <p class="d-inline"> <i class="fas fa-money-bill"></i> (price) + <i class="fas fa-people-carry"></i>
                            (delivery) = {{ $order[0]->total_price }} kyats
                        </p>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <thead>
                                <tr class="table-title">
                                    <th class="col-1 text-center"></th>
                                    <th class="col-1 text-center">ID</th>
                                    <th class="col-3 text-center">PRODUCT IMAGE</th>
                                    <th class="col-3 text-center">PRODUCT NAME</th>
                                    <th class="col-1 text-center">Qty</th>
                                    <th class="col-4 text-center">AMOUNT</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $d)
                                    @if ($d->qty > 0)
                                        <tr class="tr-shadow">
                                            <td></td>
                                            <td class="text-center">{{ $d->id }}</td>
                                            <td class="text-center">
                                                <img src="{{ asset('storage/pizza/' . $d->product_image) }}"
                                                    style="width: 180px;height:160px" alt="">
                                            </td>
                                            <td class="text-center">{{ $d->product_name }}</td>
                                            <td class="text-center">{{ $d->qty }}</td>
                                            <td class="text-center">{{ $d->total }} kyats</td>
                                        </tr>
                                    @else
                                    @endif
                                @endforeach
                                <tr class="spacer"></tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- END DATA TABLE -->
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection
