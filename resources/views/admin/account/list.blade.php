@extends('admin.layouts.master')

@section('title', 'Admin List')

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
                                <h3 class="title-1">Admin List</h3>

                            </div>
                        </div>
                        <div class="d-felx text-dark bg-light shadow-sm px-3 rounded" style="font-size: 25px">
                            <i class="fas fa-database"></i><span class="ms-2">
                                {{ $admins->total() }}</span>
                        </div>
                        <div class="table-data__tool-right">
                            {{-- <a href="{{ route('category#add') }}">
                                <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                    <i class="zmdi zmdi-plus"></i>add item
                                </button>
                            </a> --}}
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
                        <form method="get" class="col-4 offset-4">
                            <div class="input-group">
                                <input type="search" name="searchKey" class="form-control rounded"
                                    value="{{ request('searchKey') }}" placeholder="Search...">
                                <button type="submit" class="btn btn-dark"><i class="fas fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                    @if (session('deleteAdminSuccess'))
                        <div class="alert-message col-4 offset-8 mt-2">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <p>{{ session('deleteAdminSuccess') }}</p>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        </div>
                    @endif
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <thead>
                                <tr class="table-title">
                                    <th class="col-2 text-center">Profile</th>
                                    <th class="col-1 text-center">NAME</th>
                                    <th class="col-2 text-center">Email</th>
                                    <th class="col-1 text-center">Phone</th>
                                    <th class="col-1 text-center">Address</th>
                                    <th class="col-1 text-center">Gender</th>
                                    <th class="col-3 text-center"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admins as $admin)
                                    <tr class="tr-shadow adminData">
                                        <input type="hidden" id="changeId" value="{{ $admin->id }}">
                                        @if ($admin->image == null)
                                            @if ($admin->gender == 'Male')
                                                <td class="text-center">
                                                    <img class="img-thumbnail rounded"
                                                        src="{{ asset('admin/profile/default_male.jpg') }}">
                                                </td>
                                            @else
                                                <td class="text-center">
                                                    <img class="img-thumbnail rounded"
                                                        src="{{ asset('admin/profile/default_female.jpg') }}">
                                                </td>
                                            @endif
                                        @else
                                            <td class="text-center"><img class="img-thumbnail rounded"
                                                    src="{{ asset('storage/' . $admin->image) }}" alt=""></td>
                                        @endif
                                        <td class="text-center">{{ $admin->name }}</td>
                                        <td class="text-center">{{ $admin->email }}</td>
                                        <td class="text-center">{{ $admin->phone }}</td>
                                        <td class="text-center">{{ $admin->address }}</td>
                                        <td class="text-center">{{ $admin->gender }}</td>
                                        <td class="">
                                            <div class="table-data-feature">

                                                @if (Auth::user()->id == $admin->id)
                                                @else
                                                    {{-- <form action="{{ route('adminLists#editRole', $admin->id) }}"
                                                        method="get">
                                                        <div class="dropdown open">
                                                            <p class="dropdown-toggle" id="triggerId"
                                                                data-bs-toggle="dropdown">
                                                                <i class="fas fa-angle-down fs-4 text-warning"
                                                                    style="cursor: pointer"></i>
                                                            </p>
                                                            <div class="dropdown-menu" aria-labelledby="triggerId">
                                                                <button class="dropdown-item" href="#">Action</button>
                                                                <button class="dropdown-item disabled"
                                                                    href="#">Disabled action</button>
                                                            </div>
                                                        </div>
                                                    </form> --}}
                                                    <select name="" id="changeRole" class="form-select px-2">
                                                        {{-- <option value="">Change Role</option> --}}
                                                        <option value="admin" selected>Admin</option>
                                                        <option value="user">User</option>
                                                    </select>
                                                    <form action="{{ route('adminLists#delete', $admin->id) }}"
                                                        method="get">
                                                        <button class="item ms-1" data-toggle="tooltip" data-placement="top"
                                                            title="Delete" type="submit">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                @endif

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr class="spacer"></tr>
                            </tbody>
                        </table>
                        <div class="mt-3">
                            {{-- {{ $categories->appends(request()->query())->links() }} --}}
                            {{ $admins->links() }}
                        </div>
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
            $('#changeRole').on('change', function() {
                $role = $('#changeRole').val();
                $id = $('#changeRole').closest('.adminData').find('#changeId').val();
                $.ajax({
                    type: 'get',
                    url: 'http://localhost:8000/admin/ajax/changeRole',
                    data: {
                        'id': $id,
                        'role': $role
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status == 'true') {
                            window.location.href = 'http://localhost:8000/admin/viewAdminList';
                        }
                    }
                })
            })
        })
    </script>
@endsection
