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
                                        <span class="status text-danger"><i class="fas fs-5 me-1 fa-skull-crossbones"></i>
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

@section('ajaxContent')
    {{-- <script>
        $(document).ready(function() {
            $('.orderBtn').on('click', function() {

                $orderList = [];
                $random = Math.floor(Math.random() * 100001);
                $('.dataRow tr').each(function(i, r) {
                    $userId = $(r).find('.userId').val();
                    $productId = $(r).find('.productId').val();
                    $qty = $(r).find('.orderQty').val();
                    $totalPrice = $(r).find('.totalPrice').text().replace('kyats', '');
                    $orderCode = 'pos' + $userId + $random;
                    $orderList.push({
                        'user_id': $userId,
                        'product_id': $productId,
                        'qty': $qty,
                        'total': $totalPrice,
                        'order_code': $orderCode
                    });
                })
                // console.log(Object.assign({}, $orderList));
                $.ajax({
                    type: 'get',
                    url: 'http://localhost:8000/user/ajax/order',
                    data: Object.assign({}, $orderList),
                    dataType: 'json',
                    success: function(response) {
                        if (response.status = 'true') {

                            window.location.href =
                                'http://localhost:8000/user/ajax/orderSuccess';

                        }
                    }
                })
            })
        })
    </script> --}}
@endsection
@section('script')
    <script src="{{ asset('js/cart.js') }}"></script>
@endsection