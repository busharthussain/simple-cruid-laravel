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

    .pdf:hover .hide{
        visibility: hidden;
        width: 120px;
        background-color: black;
        color: #fff;
        text-align: center;
        border-radius: 6px;
        padding: 5px 0;

        /* Position the tooltip */
        position: absolute;
        z-index: 1;
    }
</style>

<table>
    <thead>
    <th>Nr</th>
    <th>Name</th>
    <th>Address</th>
    <th>Contact</th>
    <th>Suit Quantity</th>
    <th>Total Price</th>
    <th>Remaining Price</th>
    <th>Note</th>
    <th>Action</th>
    </thead>
    <tbody id="customer_data">

    </tbody>
</table>
<form action="{{route('import.excel')}}" method="post" enctype="multipart/form-data">
    @csrf
<input type="file" name="excel">
<button type="submit">Import</button>
</form>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

    $deleteCustomer = '{{URL::route('delete.customer')}}';
    $showCustomer = '{{URL::route('customer.show')}}';
    $invoice = '{{ url('customer/invoice') }}';
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
                        console.log(response.data);
                        $count = 1;
                            $.each(response.data, function (i, v) {

                                var html = '<tr>' +
                                    '<td>'+$count+++'</td>' + '<td>'+v.first_name+'&nbsp;&nbsp;'+v.last_name+'</td>' +
                                    '<td>'+v.address+'</td>' + '<td>'+v.contact+'</td>' +'<td>'+v.suit_quantity+'</td>' +'<td>'+v.total_price+'</td>' +'<td>'+v.remaining_price+'</td>' +'<td>'+v.note+'</td>' +
                                    '<td><span class="edit-customer fas fa-pencil-alt" style="cursor: pointer" id='+v.id+'></span>&nbsp;&nbsp;&nbsp;&nbsp;<span class="delete-customer far fa-trash-alt" style="cursor: pointer" id='+v.id+'>' +
                                    '</span>&nbsp;&nbsp;&nbsp;&nbsp;<span class="fas fa-file-invoice pdf" style="cursor: pointer;" id='+v.id+'></span></td>' +
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

    $('body').on('click', '.pdf', function () {
        var id = $(this).attr('id');
        var rout = $invoice + '/' + id;
        window.location.href = rout;
    })
</script>
@endsection