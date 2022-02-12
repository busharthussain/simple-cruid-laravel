@extends('layouts.layout')
@section('title' , 'Customer')
@section('content')

    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>

    <h3 style="margin-left: 40%">Customer</h3><br>

    <label class="clear-data">First_name</label>&nbsp;<input type="text" name="first_name" id="first_name">&nbsp;&nbsp;&nbsp;
    <label class="customer-class">Last_name</label>&nbsp;<input type="text" name="last_name" id="last_name">&nbsp;&nbsp;&nbsp;
    <label class="customer-class">Address</label>&nbsp;<input type="text" name="address" id="address" class="customer-class"><br><br>&nbsp;
    <label class="customer-class">Contact</label>&nbsp;<input type="text" name="contact" id="contact"class="customer-class">&nbsp;&nbsp;&nbsp;
        <button style="margin-left: 30%; padding: 1%" type="button" id="save-data">Save</button>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Shop</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody id="page-data">
                </tbody>
            </table>
            <div class="paq-pager"></div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>

        $saveCustomer = '{{URL::route('save.data')}}';
        $renderRoute = '{{ URL::route('data.show') }}';
        $token = "{{ csrf_token() }}";
        $countFiles = 0;
        $defaultType = 'render';
        $page = 1;
        $search = '';
        $id = '';
        $asc = 'asc';
        $desc = 'desc';
        $sortType = 'desc';
        $(document).ready(function () {
            $type = $defaultType;
            showFormData();
            renderClient();
            $('#search').val('');
        });

        var updateFormData = function () {

            $formData = {
                '_token': $token,
                first_name: $('#first_name').val(),
                last_name: $('#last_name').val(),
                address: $('#address').val(),
                contact: $('#contact').val(),
            };
        };

        var showFormData = function () {
            $formData = {
                '_token': $token,
                page: $page,
                search: $search,
                sortType: $sortType,
            };
        }

    </script>
    {!! Html::script('assets/js/curd.js')!!}
@endsection