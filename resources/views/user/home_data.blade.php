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

                            <a href="{{ route('pizza#detail', $pizza->id) }}" class="btn btn-outline-dark btn-square">
                                <i class="fas fa-info"></i>
                            </a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="">{{ $pizza->name }}</a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>{{ $pizza->price }} kyats</h5>
                            {{-- <h6 class="text-muted ml-2"><del>25000</del></h6> --}}
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
        <div class="mt-3">
            {{ $pizzas->links() }}
        </div>
    @else
        <h3 class="text-center text-danger shadow-sm mt-3 py-3 col-7 mx-auto">There is no food <i
                class="fas fa-pizza-slice"></i></h3>
    @endif
</div>
