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

<table>
    <thead>
    {{--<th>Id</th>--}}
    <th>Nr</th>
    <th>Name</th>
    <th>Address</th>
    <th>Contact</th>
    <th>Action</th>
    </thead>
    <tbody id="customer_data">

    </tbody>
</table>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

    $deleteCustomer = '{{URL::route('delete.customer')}}';
    $showCustomer = '{{URL::route('customer.show')}}';
        $token = "{{ csrf_token() }}";
    $(document).ready(function () {
        getCustomers()
    });

    function getCustomers() {
            $.ajax({
                url: $showCustomer,
                type: 'GET',
                data: {},
                success: function (response) {
                    if (response.success == true) {
                        $('#customer_data').html('');
                        // console.log(response.data);
                            $.each(response.data, function (i, v) {


                                var html = '<tr>' +
                                    '<td>'+v.id+'</td>' + '<td>'+v.first_name+'&nbsp;&nbsp;'+v.last_name+'</td>' +
                                    '<td>'+v.address+'</td>' + '<td>'+v.contact+'</td>' +
                                    '<td><button class="edit-customer" id='+v.id+'>Edit</button>&nbsp;&nbsp;&nbsp;&nbsp;<button class="delete-customer" id='+v.id+'>Delete</button></td>' +
                                    '</tr>';
                                $('#customer_data').append(html);
                            });
                    }
                }
            });
        }

    $('body').on('click', '.delete-customer', function () {

        $formData = {
            '_token': $token,
            id: $(this).attr('id')

        };
        $.ajax({
            url: $deleteCustomer,
            type: 'POST',
            data: $formData,
            success: function (response) {
                if (response.success == true) {
                    getCustomers()
                    alert('Data Delete Successfully');

                } else {
                    toastr.error('Something went wrong!');
                }
            }
        });

    })

    $('body').on('click', '.edit-customer', function () {
        var id = $(this).attr('id');
        var rout = '{{url('customer/edit')}}'+'/'+id;
        window.location.href = rout;
    })
</script>
@endsection