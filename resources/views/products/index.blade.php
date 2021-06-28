@extends('layouts.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Product
                            <a href="{{url('product/create')}}" class="btn btn-primary" style="float: right">Add
                                Products</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Product Image</th>
                                    <th>Product Price</th>
                                    <th>Product Brand</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>












@endsection