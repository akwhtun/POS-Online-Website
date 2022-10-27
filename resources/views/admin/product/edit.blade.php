@extends('admin.layouts.master')
@section('title', 'Category Edit')
@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-lg-9 col-md-11 col-12 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Edit Pizza</h3>
                            </div>
                            <hr>
                            <form action="{{ route('pizza#update') }}" method="POST"
                                class="row d-flex justify-content-around" enctype="multipart/form-data">
                                @csrf
                                <div class="col-lg-5 col-12">
                                    <div class="img mx-auto mt-2" style="width:300px; height:320px ">
                                        <img src="{{ asset('storage/pizza/' . $product->image) }}"
                                            class="img-thumbnail w-100 h-100 rounded">
                                    </div>
                                    <input type="file" name="pizzaPhoto" class="form-control mt-3">
                                </div>
                                <div class="col-lg-7 col-12">
                                    <input type="hidden" name="productId" value="{{ $product->id }}">
                                    <div class="form-group">
                                        <label class="control-label mb-1">Pizza Name</label>
                                        <input name="pizzaName" type="text"
                                            class="form-control @error('pizzaName') is-invalid @enderror"
                                            aria-required="true" aria-invalid="false" placeholder="Enter pizza name..."
                                            value="{{ old('pizzaName', $product->name) }}">
                                        @error('pizzaName')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label mb-1">Pizza Description</label>

                                        <textarea name="pizzaDescription" cols="30" rows="10"
                                            class="form-control @error('pizzaDescription') is-invalid @enderror" placeholder="Enter pizza description...">{{ old('pizzaDescription', $product->description) }}
                                        </textarea>
                                        @error('pizzaDescription')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label mb-1">Pizza Category</label>
                                        <select name="pizzaCategory"
                                            class="form-select @error('pizzaCategory') is-invalid @enderror">
                                            <option value="">Choose pizza category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    @if ($product->category_id == $category->id) selected @endif>{{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('pizzaCategory')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label mb-1">Pizza Waiting Time</label>
                                        <input name="pizzaWaitingTime" type="text"
                                            class="form-control @error('pizzaWaitingTime') is-invalid @enderror"
                                            aria-required="true" aria-invalid="false"
                                            placeholder="Enter pizza waiting time..."
                                            value="{{ old('pizzaWaitingTime', $product->waiting_time) }}">
                                        @error('pizzaWaitingTime')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label mb-1">Pizza Price</label>
                                        <input name="pizzaPrice" type="text"
                                            class="form-control @error('pizzaPrice') is-invalid @enderror"
                                            aria-required="true" aria-invalid="false" placeholder="Enter pizza price..."
                                            value="{{ old('pizzaPrice', $product->price) }}">
                                        @error('pizzaPrice')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label mb-1">View Count</label>
                                        <input class="form-control" type="text" value="{{ $product->view_count }}"
                                            readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label mb-1">Created</label>
                                        <input class="form-control" type="text" value="{{ $product->created_at }}"
                                            readonly>
                                    </div>
                                    <div class="mt-2">
                                        <button id="payment-button" type="submit" class="btn btn-info btn-block">
                                            <span id="payment-button-amount">Update</span>
                                            <span id="payment-button-sending" style="display:none;">Sending…</span>
                                            <i class="fas fa-arrow-circle-right"></i>
                                        </button>
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection
