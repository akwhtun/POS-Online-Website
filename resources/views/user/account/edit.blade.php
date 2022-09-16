@extends('user.layouts.master')

@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-lg-8 offset-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Edit Profile</h3>
                            </div>
                            <hr>
                            <form action="{{ route('user#updateAccountDetail', Auth::user()->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="image mx-auto" style="width:300px; height: 320px;">
                                    @if (Auth::user()->image == null)
                                        @if (Auth::user()->gender == 'Male')
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
                                        <img src="{{ asset('storage/' . Auth::user()->image) }}"
                                            class="img-thumbnail rounded w-100 h-100" alt="profile" />
                                    @endif
                                    <input type="file" name="image"
                                        class="form-control my-2 @error('image')  @enderror">
                                    @error('image')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mt-5 mx-auto col-8">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}"
                                        class="form-control @error('name') is-invalid @enderror">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mt-3 mx-auto col-8">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}"
                                        class="form-control @error('email') is-invalid @enderror">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mt-3 mx-auto col-8">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" value="{{ old('phone', Auth::user()->phone) }}"
                                        class="form-control @error('phone') is-invalid @enderror">
                                    @error('phone')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mt-3 mx-auto col-8">
                                    <label for="gender">Gender</label>
                                    <select name="gender" class="form-select @error('gender') is-invalid @enderror">
                                        <option value="">Choose Gender</option>
                                        <option value="Male" @if (Auth::user()->gender == 'Male') selected @endif>Male
                                        </option>
                                        <option value="Female" @if (Auth::user()->gender == 'Female') selected @endif>Female
                                        </option>
                                    </select>
                                    @error('gender')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mt-3 mx-auto col-8">
                                    <label for="address">Address</label>
                                    <textarea name="address" cols="15" rows="7" class="form-control @error('address') is-invalid @enderror">{{ old('address', Auth::user()->address) }}
                                    </textarea>
                                    @error('address')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mt-3 mx-auto col-8">
                                    <label for="role">Role</label>
                                    <input type="text" name="role" value="{{ Auth::user()->role }}"
                                        class="form-control" readonly>
                                </div>
                                <div class="mt-3 mx-auto col-8">
                                    <button type="submit" class="btn btn-dark w-100 py-2">
                                        Update Profile <i class="fas fa-arrow-circle-right"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
