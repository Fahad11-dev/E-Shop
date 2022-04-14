

@include('Admin.layout.header')
@extends('Admin.layout.sidebar')

<div class="page-container">
    <div class="main-content">
        <div class="col-lg-12">
            @if (Session::has('message'))
                <div class="alert alert-success">
                    {{ Session::get('message') }}
                </div>
            @endif
            <div class="table-responsive table--no-card m-b-40">
                <table class="table table-borderless table-striped table-earning">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product Category</th>
                        <th>Product Name</th>
                        <th>Product Image</th>
                        <th>Product Price</th>
                        <th>Added</th>
                        <th>Sale</th>

                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $items)
                        <tr>
                            <td>{{ $items->id }}</td>
                            <td>{{ $items->name }}</td>
                            <td>{{ $items->product_title }}</td>
                            <td>
                                <img style="height:49px;"  src="{{ asset('admin_assets/uploads/product/'.$items->product_image)}}">
                            </td>
                            <td>${{ $items->product_price }}.00</td>
                            <td>{{ $items->created_at }}</td>
                            <td><a href="#" class="btn btn-info">Buy</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
              </div>
            </div>
        </div>
    </div>
</div>



@extends('Admin.layout.footer')
