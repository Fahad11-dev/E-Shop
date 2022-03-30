

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
                        <th>Chec ID</th>
                        <th>Customer Name</th>
                        <th>Customer Email</th>
                        <th>Customer Phone Number</th>
                        <th>Total Price</th>
                        <th>status</th>
                        <th>Approve order</th>
                        <th>Cancel order</th>

                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($getdetails as $orderdetails)
                        <tr>
                            <td>{{ $orderdetails->c_id }}</td>
                            <td>{{ $orderdetails->full_name }}</td>
                            <td>{{ $orderdetails->email }}</td>
                            <td>{{ $orderdetails->phone }}</td>
                            <td>${{ $orderdetails->total_price }}.00</td>
                            <td>{{ $orderdetails->status }}</td>
                            <td><a class="btn btn-info" href="{{ url('approveOrder/'.$orderdetails->c_id)}}">Approve</a></td>
                            <td><a class="btn btn-secondary" href="{{ url('cancelOrder/'.$orderdetails->c_id)}}">Cancel order</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



@extends('Admin.layout.footer')
