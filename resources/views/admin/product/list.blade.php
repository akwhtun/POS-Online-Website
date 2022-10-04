@extends('admin.layouts.master')

@section('title', 'Product List')

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
                                <h3 class="title-1">Products List</h3>

                            </div>
                        </div>
                        <div class="d-felx text-dark bg-light shadow-sm px-3 rounded" style="font-size: 25px">
                            <i class="fas fa-database"></i><span class="ms-2">{{ $products->total() }}</span>
                        </div>
                        <div class="table-data__tool-right">
                            <a href="{{ route('pizza#add') }}">
                                <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                    <i class="zmdi zmdi-plus"></i>add product
                                </button>
                            </a>
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                CSV download
                            </button>
                        </div>
                    </div>
                    <div class="row d-flex align-items-center">
                        <div class="col-4">
                            <p style="font-size: 20px;">Search For &nbsp;<span
                                    class="text-danger">{{ request('searchKey') }}</span></p>
                        </div>
                        <form method="get" class="col-4 offset-4">
                            <div class="input-group">
                                <input type="search" name="searchKey" class="form-control rounded"
                                    value="{{ request('searchKey') }}" placeholder="Search...">
                                <button type="submit" class="btn btn-dark"><i class="fas fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                    @if (session('pizzaCreateSuccess'))
                        <div class="alert-message col-4 offset-8 mt-2">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <p>{{ session('pizzaCreateSuccess') }}</p>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        </div>
                    @endif
                    @if (session('pizzaDeleteSuccess'))
                        <div class="alert-message col-4 offset-8 mt-2">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <p>{{ session('pizzaDeleteSuccess') }}</p>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        </div>
                    @endif
                    @if (session('pizzaUpdateSuccess'))
                        <div class="alert-message col-4 offset-8 mt-2">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <p>{{ session('pizzaUpdateSuccess') }}</p>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        </div>
                    @endif
                    <div class="table-responsive table-responsive-data2">
                        @if (count($products) != 0)
                            <table class="table table-data2">
                                <thead>
                                    <tr class="table-title">
                                        <th class="col-2 text-center">Image</th>
                                        <th class="col-2 text-center">Pizza Name</th>
                                        <th class="col-2 text-center">Price</th>
                                        <th class="col-2 text-center">Category</th>
                                        <th class="col-2 text-center">View Count</th>
                                        <th class="col-2 text-center"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr class="tr-shadow">
                                            <td class="text-center" style="width: 150px; height: 160px;">
                                                <img src="{{ asset('storage/pizza/' . $product->image) }}"
                                                    class="w-100 h-100 rounded" alt="">
                                            </td>
                                            <td class="text-center">{{ $product->name }}</td>
                                            <td class="text-center">{{ $product->price }}</td>
                                            <td class="text-center">{{ $product->category_name }}</td>
                                            <td class="text-center">
                                                <i class="fas fa-eye"></i>
                                                {{ $product->view_count }}
                                            </td>
                                            <td class="text-center">
                                                <div class="table-data-feature">
                                                    <form action="{{ route('pizza#view', $product->id) }}" method="GET">
                                                        <button class="item" data-toggle="tooltip" data-placement="top"
                                                            title="View">
                                                            <i class="zmdi zmdi-eye"></i>
                                                        </button>
                                                    </form>
                                                    <form action="{{ route('pizza#edit', $product->id) }}" method="GET">

                                                        <button class="item" data-toggle="tooltip" data-placement="top"
                                                            title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                    </form>
                                                    <form action="{{ route('pizza#delete', $product->id) }}"
                                                        method="GET">

                                                        <button class="item" data-toggle="tooltip" data-placement="top"
                                                            title="Delete" type="submit">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr class="spacer"></tr>
                                </tbody>
                            </table>
                        @else
                            <div class="mt-4 text-center">
                                <p class="text-secondary" style="font-size: 30px;">There is no pizza....</p>
                            </div>
                        @endif
                        <div class="mt-3">

                            {{ $products->appends(request()->query())->links() }}
                        </div>
                    </div>
                    <!-- END DATA TABLE -->
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection
