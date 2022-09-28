@extends('admin.layouts.master')

@section('title', 'Category List')

@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <div class="table-data__tool align-items-center">
                        <div class="table-data__tool-left">
                            <div class="overview-wrap">
                                <h3 class="title-1">Order List</h3>
                            </div>
                        </div>
                        <div class="d-felx text-dark bg-light shadow-sm px-3 rounded" style="font-size: 25px">
                            <i class="fas fa-database"></i><span class="ms-2 listCount">{{ count($orderList) }}</span>
                        </div>
                        <div class="table-data__tool-right">
                            {{-- <div class="dropdown open">
                                <button class="btn btn-dark dropdown-toggle" type="button" id="triggerId"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Choose Status
                                </button>
                                <div class="dropdown-menu" aria-labelledby="triggerId">
                                    <button class="dropdown-item" class="all">All</button>
                                    <button class="dropdown-item" class="all">Pending</button>
                                    <button class="dropdown-item" class="all">Success</button>
                                    <button class="dropdown-item" class="all">Reject</button>
                                </div>
                            </div> --}}
                            <select id="status" class=" form-select bg-dark text-white">
                                <option value="">All</option>
                                <option value="0">Pending</option>
                                <option value="1">Success</option>
                                <option value="2">Reject</option>
                            </select>
                        </div>
                    </div>
                    <div class="row d-flex align-items-center">
                        {{-- <div class="col-4">
                            <p style="font-size: 25px;">Search For &nbsp;<span
                                    class="text-danger">{{ request('searchKey') }}</span></p>
                        </div>
                        <form method="get" class="col-4 offset-4">
                            <div class="input-group">
                                <input type="search" name="searchKey" class="form-control rounded"
                                    value="{{ request('searchKey') }}" placeholder="Search....">
                                <button type="submit" class="btn btn-dark"><i class="fas fa-search"></i></button>
                            </div>
                        </form> --}}
                    </div>
                    <div class="table-responsive table-responsive-data2">
                        @if (count($orderList) != 0)
                            <table class="table table-data2">
                                <thead>
                                    <tr class="table-title">
                                        <th class="text-center">USER ID</th>
                                        <th class="col-3 text-center">USER NAME</th>
                                        <th class="col-2 text-center">ORDER CODE</th>
                                        <th class="col-2 text-center">AMOUNT</th>
                                        <th class="col-2 text-center">ORDER DATE</th>
                                        <th class="col-5 text-center">STATUS</th>
                                    </tr>
                                </thead>
                                <tbody id="list">
                                    @foreach ($orderList as $list)
                                        <tr class="tr-shadow dataList">
                                            <input type="hidden" id="orderId" value="{{ $list->id }}">
                                            <td class="text-center">{{ $list->user_id }}</td>
                                            <td class="text-center">{{ $list->user_name }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('order#data', $list->order_code) }}"
                                                    class="text-decoration-none text-info">{{ $list->order_code }}</a>
                                            </td>
                                            <td class="text-center">{{ $list->total_price }} kyats</td>
                                            <td class="text-center">{{ $list->created_at->format('F-j-m') }}</td>
                                            <td>
                                                <select name="orderStatus" class="form-select orderStatus">
                                                    <option value="0" class="text-warning bg-light"
                                                        @if ($list->status == 0) selected @endif>
                                                        Pending
                                                    </option>
                                                    <option value="1" class="text-success bg-light"
                                                        @if ($list->status == 1) selected @endif>
                                                        Success
                                                    </option>
                                                    <option value="2" class="text-danger bg-light"
                                                        @if ($list->status == 2) selected @endif>
                                                        Reject
                                                    </option>
                                                </select>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr class="spacer"></tr>
                                </tbody>
                            </table>
                            <div class="mt-3">
                                {{ $orderList->links() }}
                            </div>
                        @else
                            <div class="mt-4 text-center">
                                <p class="text-secondary" style="font-size: 30px;">There is no order....</p>
                            </div>
                        @endif
                    </div>
                    <!-- END DATA TABLE -->
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection

@section('ajaxContent')
    <script>
        $(document).ready(function() {
            $('#status').on('change', function() {
                $status = $('#status').val();

                $.ajax({
                    type: 'get',
                    url: '/orderList/ajax/chooseStatus',
                    data: {
                        'status': $status
                    },
                    success: function(response) {
                        $list = '';
                        for ($i = 0; $i < response.length; $i++) {
                            $month = ['January', 'February', 'March', 'April', 'May', 'June',
                                'July', 'August', 'September', 'October', 'November',
                                'December'
                            ];
                            $dbDate = new Date(response[$i].created_at);
                            $createDate = $month[$dbDate.getMonth()] + '-' + $dbDate.getDate() +
                                '-' + $dbDate.getFullYear();

                            if (response[$i].status == 0) {
                                $statusMessage = `
                                                <select name="orderStatus" class="form-select orderStatus">
                                                            <option value="0" selected class="text-warning bg-light"
                                                            >
                                                                Pending
                                                            </option>
                                                            <option value="1"   class="text-success bg-light"
                                                            >
                                                                Success
                                                            </option>
                                                            <option value="2"  class="text-danger bg-light"
                                                            >
                                                                Reject
                                                            </option>
                                                </select>`;
                            }
                            if (response[$i].status == 1) {
                                $statusMessage = `
                                                <select name="orderStatus" class="form-select orderStatus">
                                                            <option value="0"  class="text-warning bg-light"
                                                            >
                                                                Pending
                                                            </option>
                                                            <option value="1" selected   class="text-success bg-light"
                                                            >
                                                                Success
                                                            </option>
                                                            <option value="2"  class="text-danger bg-light"
                                                            >
                                                                Reject
                                                            </option>
                                                </select>`;
                            }
                            if (response[$i].status == 2) {
                                $statusMessage = `
                                                <select name="orderStatus" class="form-select orderStatus">
                                                            <option value="0"  class="text-warning bg-light"
                                                            >
                                                                Pending
                                                            </option>
                                                            <option value="1"   class="text-success bg-light"
                                                            >
                                                                Success
                                                            </option>
                                                            <option value="2" selected class="text-danger bg-light"
                                                            >
                                                                Reject
                                                            </option>
                                                </select>`;
                            }
                            $list += `
                          <tr class="tr-shadow dataList">
                            <input type="hidden" id="orderId" value="${response[$i].id}">
                                        <td class="text-center">${response[$i].user_id}</td>
                                        <td class="text-center">${response[$i].user_name}</td>
                                        <td class="text-center">${response[$i].order_code}</td>
                                        <td class="text-center">${response[$i].total_price} kyats</td>
                                        <td class="text-center">${$createDate}</td>
                                        <td>
                                            ${$statusMessage}
                                        </td>
                                    </tr>
                        `;
                        }
                        $('#list').html($list);
                        $('.listCount').html(response.length)
                    }
                })
            });

            $('#list').delegate('.orderStatus', 'change', function() {
                $changeStatus = $(this).val();
                $orderId = $(this).closest('.dataList').find('#orderId').val();
                // console.log($orderId);
                $.ajax({
                    type: 'get',
                    url: '/orderList/ajax/changeStatus',
                    data: {
                        'changeStatus': $changeStatus,
                        'orderId': $orderId,
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status == 'true') {
                            window.location.href = '/orderList/view'
                        }

                    }
                })
            });
        });
    </script>
@endsection
