@extends('admin.layouts.master')

@section('title', 'User Contact List')

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
                                <h3 class="title-1">User Contact List</h3>

                            </div>
                        </div>
                        <div class="d-felx text-dark bg-light shadow-sm px-3 rounded" style="font-size: 25px">
                            <i class="fas fa-database"></i><span class="ms-2">{{ $data->total() }}</span>
                        </div>
                    </div>
                    {{-- <div class="row d-flex align-items-center">
                        <div class="col-4">
                            <p style="font-size: 25px;">Search For &nbsp;<span
                                    class="text-danger">{{ request('searchKey') }}</span></p>
                        </div>
                        <form method="get" class="col-4 offset-4">
                            <div class="input-group">
                                <input type="search" name="searchKey" class="form-control rounded"
                                    value="{{ request('searchKey') }}" placeholder="Enter search key">
                                <button type="submit" class="btn btn-dark"><i class="fas fa-search"></i></button>
                            </div>
                        </form>
                    </div> --}}
                    @if (session('deleteUserContact'))
                        <div class="alert-message col-4 offset-8 mt-2">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <p>{{ session('deleteUserContact') }}</p>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        </div>
                    @endif
                    <div class="table-responsive table-responsive-data2">
                        @if (count($data) != 0)
                            <table class="table table-data2">
                                <thead>
                                    <tr class="table-title">
                                        <th class="col-1 text-center">ID</th>
                                        <th class="col-3 text-center">NAME</th>
                                        <th class="col-3 text-center">EMAIL</th>
                                        <th class="col-3 text-center">MESSAGE</th>
                                        <th class="col-3 text-center">CREATED DATE</th>
                                        <th class="col-3 text-center"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $d)
                                        <tr class="tr-shadow">
                                            <td class="text-center">{{ $d->id }}</td>
                                            <td class="text-center">{{ $d->name }}</td>
                                            <td class="text-center">{{ $d->email }}</td>
                                            <td class="text-center">{{ Str::words($d->message, 5, '.....') }}</td>
                                            <td class="text-center">{{ $d->created_at->format('F-j-m') }}</td>
                                            <td class="text-center">
                                                <div class="table-data-feature">
                                                    <form action="{{ route('userContact#view', $d->id) }}" method="get">
                                                        <button class="item" data-toggle="tooltip" data-placement="top"
                                                            title="View">
                                                            <i class="zmdi zmdi-eye"></i>
                                                        </button>
                                                    </form>
                                                    <form action="{{ route('userContact#delete', $d->id) }}" method="POST">
                                                        @csrf
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
                                <p class="text-secondary" style="font-size: 30px;">There is no contact....</p>
                            </div>
                        @endif
                        <div class="mt-3">
                            {{-- {{ $categories->appends(request()->query())->links() }} --}}
                            {{ $data->links() }}
                        </div>
                    </div>
                    <!-- END DATA TABLE -->
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->

@endsection
