@include('Admin.layout.header')
@extends('Admin.layout.sidebar')

<div class="page-container">
    <div class="main-content">
        <div class="col-lg-12">
            @if(Session::has('message'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('message') }}
                </div>
            @endif
            <div class="table-responsive table--no-card m-b-40">
                <table class="table table-borderless table-striped table-earning">
                    <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>Product Image</th>
                        <th>Category Name</th>
                        <th>Product title</th>
                        <th>Product Price</th>
                        <th>Stock</th>
                        <th>Action</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($product as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>
                            <img style="height:49px;"  src="{{ asset('admin_assets/uploads/product/'.$product->product_image)}}">
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->product_title }}</td>
                        <td>${{ $product->product_price }}</td>
                        <td>{{ $product->stock }}</td>
                        <td><a href="{{ url('deleteProduct/' .$product->id) }}" class="btn btn-danger">Delete</a></td>
                        <td><a href="{{ url('EditProduct/' .$product->id. '/' .$product->category_id) }}" class="btn btn-info">Edit</a></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



@extends('Admin.layout.footer')
