@include('Admin.layout.header')
@extends('Admin.layout.sidebar')

<div class="page-container">
    <div class="main-content">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Product
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <ul class="mt-2 list-unstyled">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-body">
                    <div class="card-title">
                        Add Product
                    </div>
                    <hr>
                    <form action="{{ route('/updateCategory')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <select class="custom-select form-select form-select-lg mb-3" name="category_id" aria-label="Default select example" disabled>
                        <option value="{{ $product->category_id }}" selected>{{ $product->name }}</option>
                            
                        </select>
                        <div class="form-group">
                            <label for="product" class="control-label mb-1">Add Product title</label>
                            <input type="text" value="{{ $product->product_title }}" class="form-control" name="product_title" aria-required="true">
                        </div>
                        <div class="form-group">
                            <label for="product" class="control-label mb-1">Add Product price</label>
                            <input type="text" value="{{ $product->product_price }}" class="form-control" name="product_price" aria-required="true">
                        </div>
                        <div class="form-group">
                            <label for="product" class="control-label mb-1">Stocks</label>
                            <input type="number" value="{{ $product->stock }}" class="form-control" name="stock" aria-required="true">
                        </div>
                        @if ($product->product_image)
                        <img style="height:49px;"  src="{{ asset('admin_assets/uploads/product/'.$product->product_image)}}">
                        @endif
                        <div class="form-group">
                            <label for="product" class="control-label mb-1">Product Image</label>
                            <input type="file" value="{{ $product->product_image }}" class="form-control" name="product_image" aria-required="true">
                        </div>
                        <input type="submit" value="Add Category" class="btn btn-info mt-2">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




@extends('Admin.layout.footer')
