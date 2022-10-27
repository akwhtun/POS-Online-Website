@extends('user.layouts.master')
@section('cart')
    <a href="{{ route('cart#orderList') }}" class="btn px-0 ml-3 me-4" id="cartItem">
        <i class="fas fs-5 fa-shopping-cart text-warning"></i>
        <span class="badge text-light border border-light rounded-circle" style="padding-bottom: 2px;">
            {{ count($cart) }}
        </span>
    </a>
@endsection

@section('content')
    <div class="col-lg-6 col-md-8 col-12 mx-auto px-3 py-2">
        <div>
            <h1 class="text-center">Need support?</h2>
                <form action="{{ route('usre#contactSuccess') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name') }}" placeholder="Enter Your Name">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email') }}" placeholder="Enter Your Email">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="text">Please enter the details of your request</label>
                        <textarea cols="30" rows="10" name="message" class="form-control @error('message') is-invalid @enderror"
                            placeholder="Enter Your Mesage...">{{ old('message') }}</textarea>
                        @error('message')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3 text-end">
                        <button type="submit" class="btn btn-dark"><i class="fas fa-paper-plane"></i> Send Message</button>
                    </div>
                    <div class="d-flex justify-content-between flex-wrap">
                        <p class="text-primary w-100  m-0 p-0 mb-2" style="font-size: 17px">
                            <i class="fas fa-running"></i> You can also contact us on
                        </p>
                        <div class="phone">
                            <i class="fs-5 me-1 mt-1 fas fa-phone"></i>
                            <span>Phone : </span>
                            <span>09-891082064</span>

                        </div>
                        <div class="email">
                            <i class="fs-5 me-1 mt-1 fas fa-envelope"></i>
                            <span>Email : </span>
                            <span>akwhtun@gmail.com</span>
                        </div>
                        <div class="location">
                            <i class="fs-5 me-1 mt-1 fas fa-map-marked"></i>
                            <span>Location : </span>
                            <span>Mandalay,Myingyan</span>
                        </div>
                    </div>
                </form>
        </div>
    </div>
    </div>
@endsection
