@extends('user.layouts.master')


@section('cart')
    <a href="" class="btn px-0 ml-3 me-4">
        <i class="fas fs-5 fa-shopping-cart text-warning"></i>
        <span class="badge text-light border border-light rounded-circle" style="padding-bottom: 2px;">
            {{ count($cart) }}
        </span>
    </a>
@endsection
@section('content')
    <!-- Shop Detail Start -->
    <div class="container-fluid pb-5">
        <p class="fs-5 ms-5" onclick="history.back()" style="cursor: pointer"> <i class="fas fa-arrow-circle-left me-1"></i>Back
        </p>
        <div class="row px-xl-5">
            <div class="col-lg-5 mb-30">
                <div id="product-carousel">
                    <div class="bg-light">
                        <div style="height:490px">
                            <img class="w-100 h-100 img-thumbnail rounded"
                                src="{{ asset('storage/pizza/' . $pizza->image) }}" alt="Image">
                        </div>
                    </div>
                </div>
            </div>

            <input type="hidden" value="{{ Auth::user()->id }}" id="userId">
            <input type="hidden" value="{{ $pizza->id }}" id="pizzaId">
            <div class="col-lg-7 h-auto mb-30">
                <div class="h-100 bg-light p-30">
                    <h3>{{ $pizza->name }}</h3>
                    <div class="d-flex mb-3">
                        {{-- <div class="text-primary mr-2">
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star-half-alt"></small>
                            <small class="far fa-star"></small>
                        </div> --}}
                        <p class="pt-1">{{ $pizza->view_count }} <i class="fas fa-eye ms-1"></i></p>
                    </div>
                    <h3 class="font-weight-semi-bold mb-4">{{ $pizza->price }} kyats</h3>
                    <p class="mb-4">
                        {{ $pizza->description }}
                    </p>
                    <div class="d-flex align-items-center mb-4 pt-2">
                        <div class="input-group quantity mr-3" style="width: 130px;">
                            <div class="input-group-btn">
                                <button class="btn btn-warning btn-minus">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <input type="text" class="form-control bg-light text-dark border-0 text-center"
                                id="orderCount" value="1" style="font-weight: bold">
                            <div class="input-group-btn">
                                <button class="btn btn-warning btn-plus">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <button type="button" class="btn btn-warning px-3" id="addCartBtn"><i
                                class="fa fa-shopping-cart mr-1"></i> Add To
                            Cart</button>
                    </div>
                    <div class="d-flex pt-2">
                        <strong class="text-dark mr-2">Share on:</strong>
                        <div class="d-inline-flex">
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-pinterest"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->


    <!-- Products Start -->
    <div class="container-fluid py-5">
        <h2 class="bg-light section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="pr-3">You
                May Also Like</span></h2>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel owl-theme d-flex justify-content-around">
                    @foreach ($pizzasList as $pizzaList)
                        <div class="item product-item bg-light ">
                            <div class="product-img position-relative overflow-hidden w-100">
                                <img class="img-fluid w-100" src="{{ asset('storage/pizza/' . $pizzaList->image) }}"
                                    alt="" style="height: 220px">
                                <div class="product-action">
                                    <a class="btn btn-outline-dark btn-square" id="addCartBtn"><i
                                            class="fa fa-shopping-cart"></i></a>
                                    {{-- <a class="btn btn-outline-dark btn-square" href=""><i
                                            class="far fa-heart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i
                                            class="fa fa-sync-alt"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i
                                            class="fa fa-search"></i></a> --}}
                                    <a href="{{ route('pizza#detail', $pizzaList->id) }}"
                                        class="btn btn-outline-dark btn-square">
                                        <i class="fas fa-info"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="text-center py-4">
                                <a class="h6 text-decoration-none text-truncate" href="">
                                    {{ $pizzaList->name }}</a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5> {{ $pizzaList->price }} Kyats</h5>
                                    {{-- <h6 class="text-muted ml-2"><del>$123.00</del></h6> --}}
                                </div>
                                <div class="d-flex align-items-center justify-content-center mb-1">
                                    {{-- <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small> --}}
                                    <small> {{ $pizzaList->view_count }} <i class="fas fa-eye"></i></small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->
@endsection

@section('ajaxContent')
    <script>
        $(document).ready(function() {
            $('#addCartBtn').on('click', function() {
                $orderCount = $('#orderCount').val();
                $userId = $('#userId').val();
                $pizzaId = $('#pizzaId').val();
                $data = {
                    'orderCount': $orderCount,
                    'userId': $userId,
                    'pizzaId': $pizzaId,
                };

                $.ajax({
                    type: 'get',
                    url: 'http://localhost:8000/user/ajax/pizzas/orderPizza',
                    data: $data,
                    dataType: 'json',
                    success: function(response) {
                        if (response.status = 'success') {
                            window.location.href = 'http://localhost:8000/user/homePage';
                        }
                    }
                });
            });
        });
    </script>
@endsection

@section('carousel')
    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            dots: false,
            autoplay: true,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        });
    </script>
@endsection
