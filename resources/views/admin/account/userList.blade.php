@extends('admin.layouts.master')

@section('title', 'User List')

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
                                <h3 class="title-1">User List</h3>

                            </div>
                        </div>
                        <div class="d-felx text-dark bg-light shadow-sm px-3 rounded" style="font-size: 25px">
                            <i class="fas fa-database"></i><span class="ms-2">
                                {{ $users->total() }}</span>
                        </div>
                    </div>
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <thead>
                                <tr class="table-title">
                                    <th class="col-2 text-center">Profile</th>
                                    <th class="col-2 text-center">NAME</th>
                                    <th class="col-1 text-center">Email</th>
                                    <th class="col-1 text-center">Phone</th>
                                    <th class="col-1 text-center">Address</th>
                                    <th class="col-2 text-center"></th>
                                    <th class="col-3 text-center"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr class="tr-shadow userData">
                                        <input type="hidden" id="changeId" value="{{ $user->id }}">
                                        @if ($user->image == null)
                                            @if ($user->gender == 'Male')
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
                                                    src="{{ asset('storage/' . $user->image) }}" alt=""></td>
                                        @endif
                                        <td class="text-center">{{ $user->name }} &nbsp; <p class="text-info d-inline">
                                                ({{ $user->gender }})</p>
                                        </td>
                                        <td class="text-center">{{ $user->email }}</td>
                                        <td class="text-center">{{ $user->phone }}</td>
                                        <td class="text-center">{{ $user->address }}</td>
                                        <td class="">
                                            <div class="table-data-feature">
                                                <select class="form-select  userchangeRole mx-1">
                                                    <option value="admin">Admin</option>
                                                    <option value="user" selected>User</option>
                                                </select>

                                            </div>
                                        </td>
                                        <td class="">
                                            <div class="table-data-feature">
                                                <select class="form-select userSuspend">
                                                    <option value="1"
                                                        @if ($user->suspend == 1) selected @endif>
                                                        Suspend</option>
                                                    <option value="0"
                                                        @if ($user->suspend == 0) selected @endif>
                                                        Unsuspend</option>
                                                </select>
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
                                <tr class="spacer"></tr>
                            </tbody>
                        </table>
                        <div class="mt-3">
                            {{-- {{ $categories->appends(request()->query())->links() }} --}}
                            {{ $users->links() }}
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
            $('.userchangeRole').on('change', function() {
                $role = $(this).val();
                $id = $(this).closest('.userData').find('#changeId').val();
                console.log($role);
                $.ajax({
                    type: 'get',
                    url: '/admin/ajax/userChangeRole',
                    data: {
                        'id': $id,
                        'role': $role
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status == 'true') {
                            location.reload();
                        }
                    }
                })
            })
        })
    </script>
    <script>
        $(document).ready(function() {
            $('.userSuspend').on('change', function() {
                $suspend = $(this).val();
                $id = $(this).closest('.userData').find('#changeId').val();
                // console.log($role);
                $.ajax({
                    type: 'get',
                    url: '/admin/ajax/userSuspend',
                    data: {
                        'id': $id,
                        'suspend': $suspend
                    },
                    dataType: 'json',
                    success: function(response) {
                        // if (response.status == 'true') {
                        //     location.reload();
                        // }
                    }
                })
            })
        })
    </script>
@endsection
