@extends('layouts.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Product
                            <a href="{{url('products/create')}}" class="btn btn-primary" style="float: right">Add
                                Products</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    {{--<th>Product Image</th>--}}
                                    <th>Price</th>
                                    <th>Brand</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody id="page-data">
                                </tbody>
                            </table>
                            <div class="paq-pager"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $renderRoute = '{{ URL::route('products.show' , ['product' => 0]) }}';
        $editRoute = '{{ URL::route('products.edit', ['product' => 0])}}';
        $editRoute = $editRoute.substr(0, $editRoute.lastIndexOf("/"));
        $editRoute = $editRoute.substr(0, $editRoute.lastIndexOf("/"));
        $deleteRoute = '{{ URL::route('products.destroy', ['product' => 0])}}';
        $token = "{{ csrf_token() }}";
        $defaultType = 'renderProduct';
        $page = 1;
        $search = '';
        $id = '';
        $asc = 'asc';
        $desc = 'desc';
        $sortType = 'desc';
        $sortColumn = 'a.id';
        $dropDownFilters = {};
        $(document).ready(function () {
            $type = $defaultType;
            updateFormData();
            renderClient();
            $('#search').val('');
        });

        var updateFormData = function () {
            $formData = {
                '_token': $token,
                page: $page,
                search: $search,
                sortType: $sortType,
                sortColumn: $sortColumn,
                dropDownFilters: $dropDownFilters
            };
        }
    </script>

    {!! Html::script('assets/js/client.js')!!}
@endsection