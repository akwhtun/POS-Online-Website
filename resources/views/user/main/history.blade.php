@extends('user.layouts.master')
@section('cart')
    <a href="{{ route('cart#orderList') }}" class="btn px-0 ml-3 me-4" id="cartItem">
        <i class="fas fs-5 fa-shopping-cart text-warning"></i>
        <span class="badge text-light border border-light rounded-circle cartCount" style="padding-bottom: 2px;">
            {{ count($cart) }}
        </span>
    </a>
@endsection
@section('content')
    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5 offset-2">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Date</th>
                            <th>OrderId</th>
                            <th>Total Price</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle dataRow">
                        @foreach ($historyLists as $history)
                            <tr class="orderItem">
                                <td class="align-middle">
                                    <span class="date">{{ $history->created_at->format('F-j-Y') }}</span>
                                </td>
                                <td class="align-middle">
                                    <span class="orderId">{{ $history->order_code }}</span>
                                </td>
                                <td class="align-middle">
                                    <span class="totalPrice">{{ $history->total_price }}</span>
                                </td>
                                <td class="align-middle">
                                    @if ($history->status == 0)
                                        <span class="status text-warning"><i class="fas fs-5 me-1 fa-hourglass-half"></i>
                                            Pending...</span>
                                    @elseif ($history->status == 1)
                                        <span class="status text-success"><i class="fas fs-5 me-1 fa-check"></i>
                                            Success</span>
                                    @else
                                        <span class="status text-danger"><i
                                                class="fas fs-5 me-1 fa-exclamation-triangle"></i>
                                            Reject</span>
                                    @endif
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Cart End -->



    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>
@endsection

@section('script')
    <script src="{{ asset('js/cart.js') }}"></script>
@endsection
