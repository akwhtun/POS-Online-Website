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
                                <h3 class="title-1">Category List</h3>

                            </div>
                        </div>
                        <div class="d-felx text-dark bg-light shadow-sm px-3 rounded" style="font-size: 25px">
                            <i class="fas fa-database"></i><span class="ms-2">{{ $categories->total() }}</span>
                        </div>
                        <div class="table-data__tool-right">
                            <a href="{{ route('category#add') }}">
                                <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                    <i class="zmdi zmdi-plus"></i>add category
                                </button>
                            </a>
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                CSV download
                            </button>
                        </div>
                    </div>
                    <div class="row d-flex align-items-center">
                        <div class="col-4">
                            <p style="font-size: 25px;">Search For &nbsp;<span
                                    class="text-danger">{{ request('searchKey') }}</span></p>
                        </div>
                        <form method="get" class="col-lg-4 offset-lg-4 col-9">
                            <div class="input-group">
                                <input type="search" name="searchKey" class="form-control rounded"
                                    value="{{ request('searchKey') }}" placeholder="Enter search key">
                                <button type="submit" class="btn btn-dark"><i class="fas fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                    @if (session('deleteSuccess'))
                        <div class="alert-message col-lg-4 offset-lg-8 col-12 mt-2">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <p>{{ session('deleteSuccess') }}</p>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        </div>
                    @endif
                    <div class="table-responsive table-responsive-data2">
                        @if (count($categories) != 0)
                            <table class="table table-data2">
                                <thead>
                                    <tr class="table-title">
                                        <th class="col-1 text-center">ID</th>
                                        <th class="col-4 text-center">CATEGORY NAME</th>
                                        <th class="col-4 text-center">CREATED DATE</th>
                                        <th class="col-3 text-center"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr class="tr-shadow">
                                            <td class="text-center">{{ $category->id }}</td>
                                            <td class="text-center">{{ $category->name }}</td>
                                            <td class="text-center">{{ $category->created_at }}</td>
                                            <td class="text-center">
                                                <div class="table-data-feature">
                                                    {{-- <button class="item" data-toggle="tooltip" data-placement="top"
                                                        title="View">
                                                        <i class="zmdi zmdi-eye"></i>
                                                    </button> --}}
                                                    <form action="{{ route('category#edit', $category->id) }}"
                                                        method="get">
                                                        {{-- @csrf --}}
                                                        <button class="item" data-toggle="tooltip" data-placement="top"
                                                            title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                    </form>
                                                    <form action="{{ route('category#delete', $category->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button class="item" data-toggle="tooltip" data-placement="top"
                                                            title="Delete" type="submit">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                    </form>
                                                    {{-- <button class="item" data-toggle="tooltip" data-placement="top"
                                                title="More">
                                                <i class="zmdi zmdi-more"></i>
                                            </button> --}}
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr class="spacer"></tr>
                                </tbody>
                            </table>
                        @else
                            <div class="mt-4 text-center">
                                <p class="text-secondary" style="font-size: 30px;">There is no category....</p>
                            </div>
                        @endif
                        <div class="mt-3">
                            {{-- {{ $categories->appends(request()->query())->links() }} --}}
                            {{ $categories->links() }}
                        </div>
                    </div>
                    <!-- END DATA TABLE -->
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection
