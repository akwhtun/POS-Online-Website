@extends('admin.layouts.master')
@section('title', 'Category Edit')
@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-3 offset-8">
                        <a href="{{ route('category#list') }}"><button class="btn bg-dark text-white my-3">List</button></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-10 col-12 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Update Category</h3>
                            </div>
                            <hr>
                            <form action="{{ route('category#update') }}" method="POST">
                                @csrf
                                <input type="hidden" name="categoryId" value="{{ $category->id }}">
                                <div class="form-group">
                                    <label class="control-label mb-1">Category Name</label>
                                    <input name="categoryName" type="text"
                                        class="form-control @error('categoryName') is-invalid @enderror"
                                        aria-required="true" aria-invalid="false" placeholder="Seafood..."
                                        value="{{ old('categoryName', $category->name) }}">
                                    @error('categoryName')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div>

                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                        <span id="payment-button-amount">Update</span>
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
