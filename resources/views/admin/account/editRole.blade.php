@extends('admin.layouts.master')

@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-lg-8 offset-2">
                    <div class="card p-3">
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Change Role</h3>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-6">
                                    <div class="image" style="height:310px">
                                        @if ($editData->image == null)
                                            @if ($editData->gender == 'Male')
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
                                            <img src="{{ asset('storage/' . $editData->image) }}"
                                                class="img-thumbnail  w-100 h-100" alt="profile" />
                                        @endif
                                    </div>
                                </div>
                                <div class="col-5 ms-1">
                                    <div class="text-dark fs-5">
                                        <p class="mt-1"> <i class="fas fa-user me-2"></i> {{ $editData->name }} &nbsp;
                                        </p>
                                        <p class="mt-3"> <i class="fas fa-envelope me-2"></i> {{ $editData->email }}
                                        </p>
                                        <p class="mt-3"> <i class="fas fa-phone me-2"></i> {{ $editData->phone }}
                                        </p>
                                        @if ($editData->gender == 'Male')
                                            <p class="mt-3"> <i class="fas fa-male me-2 fs-3"></i>
                                                {{ $editData->gender }}
                                            </p>
                                        @else
                                            <p class="mt-3"> <i class="fas fa-female me-2 fs-3"></i>
                                                {{ $editData->gender }}
                                            </p>
                                        @endif
                                        <p class="mt-3"> <i class="fas fa-map-marker me-2"></i>
                                            {{ $editData->address }}</p>
                                        <p class="mt-3"> <i class="fas fa-user-clock me-2"></i>
                                            {{ $editData->created_at->format('j-F-y') }}</p>
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <form action="{{ route('adminLists#updateRole', $editData->id) }}" method="POST">
                                        @csrf
                                        <div>
                                            <label for="role" class="text-danger">Change Role</label>
                                            <select name="role" class="form-select">
                                                <option value="admin" @if ($editData->role == 'admin') selected @endif>
                                                    Admin
                                                </option>
                                                <option value="user" @if ($editData->role == 'user') selected @endif>
                                                    User
                                                </option>
                                            </select>
                                        </div>
                                        <div class="text-center mt-1">
                                            <button type="submit" class=" btn btn-dark py-2 mx-auto mt-3 w-100">
                                                Change Role &nbsp; <i class="fas fa-user-edit me-2"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection
