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
    <div class="container-fluid">
        <div class="row px-xl-5 mt-3">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-4">

                <!-- Price Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-light pr-3">Filter by
                        category</span></h5>
                <h6
                    class="bg-dark text-white section-title position-relative text-uppercase mb-3 px-2 py-1 d-flex justify-content-between align-items-center rounded">
                    <label for="categoreis" class="mt-2">Category</label>
                    <span class="badge border text-white fs-5">{{ count($categories) }}</span>
                </h6>
                <div class="bg-light p-4 mb-30">
                    <form>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <a href="{{ route('user#home') }}" class="text-decoration-none text-dark">All</a>
                        </div>
                        @foreach ($categories as $category)
                            <div
                                class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <a href="{{ route('user#filter', $category->id) }}" class="text-decoration-none text-dark">
                                    <span class="font-weight-normal">{{ $category->name }}</span>
                                </a>
                            </div>
                        @endforeach
                    </form>
                </div>
                <!-- Price End -->

                <!-- Color Start -->
                {{-- <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter
                        by color</span></h5>
                <div class="bg-light p-4 mb-30">
                    <form>
                        <div
                            class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" checked id="color-all">
                            <label class="custom-control-label" for="price-all">All Color</label>
                            <span class="badge border font-weight-normal">1000</span>
                        </div>
                        <div
                            class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="color-1">
                            <label class="custom-control-label" for="color-1">Black</label>
                            <span class="badge border font-weight-normal">150</span>
                        </div>
                        <div
                            class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="color-2">
                            <label class="custom-control-label" for="color-2">White</label>
                            <span class="badge border font-weight-normal">295</span>
                        </div>
                        <div
                            class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="color-3">
                            <label class="custom-control-label" for="color-3">Red</label>
                            <span class="badge border font-weight-normal">246</span>
                        </div>
                        <div
                            class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="color-4">
                            <label class="custom-control-label" for="color-4">Blue</label>
                            <span class="badge border font-weight-normal">145</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                            <input type="checkbox" class="custom-control-input" id="color-5">
                            <label class="custom-control-label" for="color-5">Green</label>
                            <span class="badge border font-weight-normal">168</span>
                        </div>
                    </form>
                </div> --}}
                <!-- Color End -->

                {{-- <!-- Size Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter
                        by size</span></h5>
                <div class="bg-light p-4 mb-30">
                    <form>
                        <div
                            class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" checked id="size-all">
                            <label class="custom-control-label" for="size-all">All Size</label>
                            <span class="badge border font-weight-normal">1000</span>
                        </div>
                        <div
                            class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="size-1">
                            <label class="custom-control-label" for="size-1">XS</label>
                            <span class="badge border font-weight-normal">150</span>
                        </div>
                        <div
                            class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="size-2">
                            <label class="custom-control-label" for="size-2">S</label>
                            <span class="badge border font-weight-normal">295</span>
                        </div>
                        <div
                            class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="size-3">
                            <label class="custom-control-label" for="size-3">M</label>
                            <span class="badge border font-weight-normal">246</span>
                        </div>
                        <div
                            class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="size-4">
                            <label class="custom-control-label" for="size-4">L</label>
                            <span class="badge border font-weight-normal">145</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                            <input type="checkbox" class="custom-control-input" id="size-5">
                            <label class="custom-control-label" for="size-5">XL</label>
                            <span class="badge border font-weight-normal">168</span>
                        </div>
                    </form>
                </div> --}}
                <div class="">
                    <button class="btn btn btn-warning w-100">Order</button>
                </div>
                <!-- Size End -->
            </div>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-8">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div>
                                {{-- <button class="btn btn-sm btn-light"><i class="fa fa-th-large"></i></button>
                                <button class="btn btn-sm btn-light ml-2"><i class="fa fa-bars"></i></button> --}}
                                <a href="{{ route('cart#history') }}" class="btn btn-dark text-white position-relative">
                                    History <i class="fas fa-history"></i>
                                    <span
                                        class="badge bg-danger position-absolute top-0 start-100 translate-middle rounded-pill">
                                        {{ count($history) }}
                                    </span>
                                </a>
                            </div>
                            <div class="ml-2">
                                <div class="btn-group">
                                    {{-- <button type="button" class="btn btn-sm btn-light dropdown-toggle"
                                        data-bs-toggle="dropdown">Sorting</button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">Latest</a>
                                        <a class="dropdown-item" href="#">Newest</a>
                                        <a class="dropdown-item" href="#">Best Rating</a>
                                    </div> --}}
                                    <select id="sorting" class="form-select">
                                        <option value="">Choose Option</option>
                                        <option value="latest">Latest</option>
                                        <option value="newest">Newest</option>
                                    </select>
                                </div>
                                {{-- <div class="btn-group ml-2">
                                    <button type="button" class="btn btn-sm btn-light dropdown-toggle"
                                        data-bs-toggle="dropdown">Showing</button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">10</a>
                                        <a class="dropdown-item" href="#">20</a>
                                        <a class="dropdown-item" href="#">30</a>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <input type="hidden" value="{{ Auth::user()->id }}" id="userId">
                    <div id="list" class="row d-flex justify-content-around flex-wrap">
                        @if (count($pizzas) != 0)
                            @foreach ($pizzas as $pizza)
                                <div class="col-lg-4 col-md-6 col-sm-6 pb-1 pizzaList">
                                    <input type="hidden" id="pizzaId" value="{{ $pizza->id }}">
                                    <div class="product-item bg-light mb-4">
                                        <div class="product-img position-relative overflow-hidden">
                                            <img class="img-fluid w-100 rounded" style="height: 300px;"
                                                src="{{ asset('storage/pizza/' . $pizza->image) }}" alt="">
                                            <div class="product-action">
                                                <a class="btn btn-outline-dark btn-square" id="addCartBtn"><i
                                                        class="fa fa-shopping-cart"></i></a>
                                                {{-- <a class="btn btn-outline-dark btn-square" href=""><i
                                                        class="far fa-heart"></i></a>
                                                <a class="btn btn-outline-dark btn-square" href=""><i
                                                        class="fa fa-sync-alt"></i></a>
                                                <a class="btn btn-outline-dark btn-square" href=""><i
                                                        class="fa fa-search"></i></a> --}}
                                                <a href="{{ route('pizza#detail', $pizza->id) }}"
                                                    class="btn btn-outline-dark btn-square">
                                                    <i class="fas fa-info"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="text-center py-4">
                                            <a class="h6 text-decoration-none text-truncate"
                                                href="">{{ $pizza->name }}</a>
                                            <div class="d-flex align-items-center justify-content-center mt-2">
                                                <h5>{{ $pizza->price }} kyats</h5>
                                                {{-- <h6 class="text-muted ml-2"><del>25000</del></h6> --}}
                                            </div>
                                            {{-- <div class="d-flex align-items-center justify-content-center mb-1">
                                        <small class="fa fa-star text-warning mr-1"></small>
                                        <small class="fa fa-star text-warning mr-1"></small>
                                        <small class="fa fa-star text-warning mr-1"></small>
                                        <small class="fa fa-star text-warning mr-1"></small>
                                        <small class="fa fa-star text-warning mr-1"></small>
                                    </div> --}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <h3 class="text-center text-danger shadow-sm mt-3 py-3 col-7 mx-auto">There is no pizza <i
                                    class="fas fa-pizza-slice"></i></h3>
                        @endif
                    </div>
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
@endsection


@section('ajaxContent')
    <script>
        $(document).ready(function() {
            $('#sorting').on('change', function() {
                $option = $('#sorting').val();

                if ($option == 'newest') {
                    $.ajax({
                        type: 'get',
                        url: 'http://localhost:8000/user/ajax/pizzas/getList',
                        data: {
                            'status': 'desc'
                        },
                        dataType: 'json',
                        success: function(response) {
                            $list = '';
                            for ($i = 0; $i < response.length; $i++) {
                                $list += `
                            <div class="col-lg-4 col-md-6 col-sm-6 pb-1 pizzaList">
                                <input type="hidden" id="pizzaId" value="${response[$i] . id}">
                              <div class="product-item bg-light mb-4">
                            <div class="product-img position-relative overflow-hidden">
                                <img class="img-fluid w-100 rounded" style="height: 300px;"
                                    src="{{ asset('storage/pizza/${response[$i].image}') }}" alt="">
                                <div class="product-action">
                                    <a class="btn btn-outline-dark btn-square" id="addCartBtn"><i
                                            class="fa fa-shopping-cart"></i></a>
                                      <a href="{{ url('user/pizzas/detail/${response[$i].id}') }}"
                                                    class="btn btn-outline-dark btn-square">
                                                    <i class="fas fa-info"></i>
                                                </a>
                                </div>
                            </div>
                            <div class="text-center py-4">
                                <a class="h6 text-decoration-none text-truncate" href=""> ${response[$i] . name} </a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5> ${response[$i] . price}  kyats</h5>
                                    {{-- <h6 class="text-muted ml-2"><del>25000</del></h6> --}}
                                </div>
                                {{-- <div class="d-flex align-items-center justify-content-center mb-1">
                                        <small class="fa fa-star text-warning mr-1"></small>
                                        <small class="fa fa-star text-warning mr-1"></small>
                                        <small class="fa fa-star text-warning mr-1"></small>
                                        <small class="fa fa-star text-warning mr-1"></small>
                                        <small class="fa fa-star text-warning mr-1"></small>
                                    </div> --}}
                            </div>
                        </div>
                        </div>
                            `;
                            }
                            $('#list').html($list);

                        }
                    });
                } else if ($option == 'latest') {
                    $.ajax({
                        type: 'get',
                        url: 'http://localhost:8000/user/ajax/pizzas/getList',
                        data: {
                            'status': 'asc'
                        },
                        dataType: 'json',
                        success: function(response) {
                            $list = '';
                            for ($i = 0; $i < response.length; $i++) {
                                $list += `
                            <div class="col-lg-4 col-md-6 col-sm-6 pb-1 pizzaList">
                                 <input type="hidden" id="pizzaId" value="${response[$i] . id}">
                              <div class="product-item bg-light mb-4">
                            <div class="product-img position-relative overflow-hidden">
                                <img class="img-fluid w-100 rounded" style="height: 300px;"
                                    src="{{ asset('storage/pizza/${response[$i].image}') }}" alt="">
                                <div class="product-action">
                                    <a class="btn btn-outline-dark btn-square" id="addCartBtn"><i
                                            class="fa fa-shopping-cart"></i></a>
                                    <a href="{{ url('user/pizzas/detail/${response[$i].id}') }}"
                                                    class="btn btn-outline-dark btn-square">
                                                    <i class="fas fa-info"></i>
                                                </a>

                                </div>
                            </div>
                            <div class="text-center py-4">
                                <a class="h6 text-decoration-none text-truncate" href=""> ${response[$i] . name} </a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5> ${response[$i] . price}  kyats</h5>
                                    {{-- <h6 class="text-muted ml-2"><del>25000</del></h6> --}}
                                </div>
                                {{-- <div class="d-flex align-items-center justify-content-center mb-1">
                                        <small class="fa fa-star text-warning mr-1"></small>
                                        <small class="fa fa-star text-warning mr-1"></small>
                                        <small class="fa fa-star text-warning mr-1"></small>
                                        <small class="fa fa-star text-warning mr-1"></small>
                                        <small class="fa fa-star text-warning mr-1"></small>
                                    </div> --}}
                            </div>
                        </div>
                        </div>
                            `;
                            }
                            $('#list').html($list);

                        }

                    });
                }
            });
        });
    </script>
@endsection

@section('script')
    <script>
        $('#list').delegate('#addCartBtn', 'click', function() {
            console.log($(this));
            $orderCount = 1;
            $userId = $('#userId').val();
            $pizzaId = $(this).closest('.pizzaList').find('#pizzaId').val();
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
    </script>
@endsection
