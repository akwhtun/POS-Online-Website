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
    <div class="orderMessage col-7 mx-auto">
        <div class="modal modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-success">Contact Success</h5>
                {{-- <button class="btn-close" data-bs-dismiss="modal"></button> --}}
            </div>
            <div class="modal-body">
                <p class="text-center text-white bg-success m-0 p-0 py-3 w-100 h-100 ">
                    We accept your message successfully ✔.</p>
                <p class="text-center text-white bg-success pb-3 w-100 h-100 m-0 p-0">We will notify on your email
                    address✍.
                </p>
                <p class="text-center text-white bg-success pb-3 w-100 h-100 ">
                    Thanks for supporting🤝.
                </p>
            </div>
            <div class="modal-footer">
                <a href="{{ route('user#home') }}" class="d-block btn btn-outline-success text-dark">
                    Back To Home</a>
            </div>
        </div>

    </div>
@endsection
