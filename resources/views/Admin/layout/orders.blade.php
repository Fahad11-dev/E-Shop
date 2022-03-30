

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
                        <th>Order Details</th>
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
                            <td><a class="btn btn-info" id="detail" data="{{ $orderdetails->user_id }}">See Order Details</a></td>
                            <td><a class="btn btn-info" href="{{ url('approveOrder/'.$orderdetails->c_id)}}">Approve</a></td>
                            <td><a class="btn btn-secondary" href="{{ url('cancelOrder/'.$orderdetails->c_id)}}">Cancel order</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
              </div>
            </div>
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog modal-lg">
                
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive table--no-card m-b-40">
                            <table class="table table-borderless table-striped table-earning">
                                <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Product Price</th>
                                    <th>Product Quantity</th>
            
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getorderDetails as $items)
                                    <tr>           
                                        <td>{{ $items->product_title }}</td>
                                        <td>{{ $items->product_price }}</td>
                                        <td>{{ $items->product_quantity }}</td>
                                       
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                          </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                  
                </div>
              </div>
        </div>
    </div>
</div>



@extends('Admin.layout.footer')
