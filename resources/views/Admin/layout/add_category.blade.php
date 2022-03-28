@include('Admin.layout.header')
@extends('Admin.layout.sidebar')

<div class="page-container">
    <div class="main-content">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Category
                </div>
                <div class="card-body">
                    <div class="card-title">
                        Add Category
                    </div>
                    <hr>
                    @if(Session::has('message'))
                        <div class="alert alert-danger text-center" role="alert">
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    <form action="addCategory" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="category" class="control-label mb-1">Add Category Name</label>
                            <input type="text" class="form-control" name="name" aria-required="true">
                            <input type="submit" value="Add Category" class="btn btn-info mt-2">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




@extends('Admin.layout.footer')
