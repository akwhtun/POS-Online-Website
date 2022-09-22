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
    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @foreach ($list as $l)
                            <tr class="orderItem">
                                <td class="align-middle d-flex flex-wrap">
                                    <img class="ms-5 me-3 img-thumbnail rounded"
                                        src="{{ asset('storage/pizza/' . $l->image) }}" alt="" style="width: 50px;">
                                    {{ $l->name }}
                                </td>
                                <td class="align-middle">
                                    <span class="orderPrice">{{ $l->price }}</span> kyats
                                </td>
                                <td class="align-middle">
                                    <div class="input-group quantity mx-auto" style="width: 100px;">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-warning btn-minus">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text"
                                            class="form-control form-control-sm bg-light text-dark border-0 text-center orderQty"
                                            value="{{ $l->qty }}">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-warning btn-plus">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle totalPrice">{{ $l->price * $l->qty }} kyats</td>
                                <td class="align-middle removeBtn"><button class="btn btn-sm btn-danger"><i
                                            class="fa fa-times"></i></button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-light text-dark pr-3">Cart
                        Summary</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6>
                                <p class="me-2 d-inline">{{ $totalPrice }} </p>kyats
                            </h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">
                                <p class="me-2 d-inline">3000</p> kyats
                            </h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5 class="ms-2"> {{ $totalPrice + 3000 }} kyats</h5>
                        </div>
                        <button class="btn btn-block btn-warning font-weight-bold my-3 py-3">Proceed To Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->



    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.btn-plus').on('click', function() {
                $orderItem = $(this).closest('.orderItem');
                $orderQty = $orderItem.find('.orderQty').val();
                $orderPrice = $orderItem.find('.orderPrice').html();
                $totalPrice = $orderItem.find('.totalPrice');

                $totalPrice.html($orderPrice * $orderQty + ' kyats');

                if ($orderQty > 0) {
                    $orderItem.css('textDecoration', 'none');
                }
            });

            $('.btn-minus').on('click', function() {
                $orderItem = $(this).closest('.orderItem');
                $orderQty = $orderItem.find('.orderQty').val();
                $orderPrice = $orderItem.find('.orderPrice').html();
                $totalPrice = $orderItem.find('.totalPrice');

                $totalPrice.html($orderPrice * $orderQty + ' kyats');

                if ($orderQty == 0) {
                    $orderItem.css('textDecoration', 'line-through');
                }
            });

            $('.removeBtn').on('click', function() {
                $(this).closest('.orderItem').remove();
            });
        });
    </script>
@endsection
