@extends('admin.layouts.master')

@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div>
            <div class="container-fluid">
                <div class="col-lg-6 offset-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title px-3">
                                <h3 class="text-center title-2">Create Pizza</h3>
                            </div>
                            <hr>
                            <form action="{{ route('pizza#create') }}" method="post" enctype="multipart/form-data"
                                class="px-3">
                                @csrf
                                <div class="form-group">
                                    <label class="control-label mb-1">Pizza Name</label>
                                    <input name="pizzaName" type="text"
                                        class="form-control @error('pizzaName') is-invalid @enderror"
                                        value="{{ old('pizzaName') }}" placeholder="Enter pizza name...">
                                    @error('pizzaName')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label mb-1">Pizza Category</label>

                                    <select name="pizzaCategory"
                                        class="form-select @error('pizzaCategory') is-invalid @enderror">
                                        <option value="">Choose Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('pizzaCategory')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label mb-1">Pizza Description</label>
                                    <textarea name="pizzaDescription" cols="30" rows="10"
                                        class="form-control @error('pizzaDescription') is-invalid @enderror" placeholder="Enter pizza description...">{{ old('pizzaDescription') }}</textarea>
                                    @error('pizzaDescription')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label mb-1">Pizza Photo</label>
                                    <input name="pizzaPhoto" type="file"
                                        class="form-control @error('pizzaPhoto') is-invalid @enderror">
                                    @error('pizzaPhoto')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label mb-1">Pizza Waiting Time</label>
                                    <input name="pizzaWaitingTime" type="text"
                                        class="form-control @error('pizzaWaitingTime') is-invalid @enderror"
                                        value="{{ old('pizzaWaitingTime') }}" placeholder="Enter pizza waiting time...">
                                    @error('pizzaWaitingTime')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label mb-1">Pizza Price</label>
                                    <input name="pizzaPrice" type="number"
                                        class="form-control @error('pizzaPrice') is-invalid @enderror"
                                        value="{{ old('pizzaPrice') }}" placeholder="Enter pizza price...">
                                    @error('pizzaPrice')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                        <span id="payment-button-amount">Create</span>
                                        <span id="payment-button-sending" style="display:none;">Sending…</span>
                                        <i class="fas fa-arrow-circle-right"></i>
                                    </button>
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
