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

<h3>Customer</h3>

<label>Id</label>&nbsp;<input type="number" name="customer_id" id="customer_id">&nbsp;&nbsp;&nbsp;
<label>First_name</label>&nbsp;<input type="text" name="first_name" id="first_name">&nbsp;&nbsp;&nbsp;
<label>Last_name</label>&nbsp;<input type="text" name="last_name" id="last_name">&nbsp;&nbsp;&nbsp;
<label>Address</label>&nbsp;<input type="text" name="address" id="address">&nbsp;&nbsp;&nbsp;
<label>Contact</label>&nbsp;<input type="text" name="contact" id="contact"><br><br><br>
<label>Length</label>&nbsp;<input type="text" name="length" id="length">&nbsp;&nbsp;&nbsp;
<label>Shoulder</label>&nbsp;<input type="text" name="shoulder" id="shoulder">&nbsp;&nbsp;&nbsp;
<label>Neck</label>&nbsp;<input type="text" name="neck" id="neck">&nbsp;&nbsp;&nbsp;
<label>Chest</label>&nbsp;<input type="text" name="chest" id="chest">&nbsp;&nbsp;&nbsp;
<label>Waist</label>&nbsp;<input type="text" name="waist" id="waist"><br><br><br>
<label>Hip</label>&nbsp;<input type="text" name="hip" id="hip">&nbsp;&nbsp;&nbsp;
<label>Gheera_Gool</label>&nbsp;<input type="text" name="gheera_gool" id="gheera_gool">&nbsp;&nbsp;&nbsp;
<label>Gheera_Choras</label>&nbsp;<input type="text" name="gheera_choras" id="gheera_choras">&nbsp;&nbsp;&nbsp;
<label>Arm</label>&nbsp;<input type="text" name="arm" id="arm">&nbsp;&nbsp;&nbsp;
<label>Moda</label>&nbsp;<input type="text" name="moda" id="moda">&nbsp;&nbsp;&nbsp;<br><br><br>
<label>Kaff</label>&nbsp;<input type="text" name="kaff" id="kaff">&nbsp;&nbsp;&nbsp;
<label>Kaff_Width</label>&nbsp;<input type="text" name="kaff_width" id="kaff_width">&nbsp;&nbsp;&nbsp;
<label>Arm_Gool</label>&nbsp;<input type="text" name="arm_gool" id="arm_gool">&nbsp;&nbsp;&nbsp;
<label>Arm_Moori</label>&nbsp;<input type="text" name="arm_moori" id="arm_moori">&nbsp;&nbsp;&nbsp;
<label>Collar</label>&nbsp;<input type="text" name="collar" id="collar"><br><br><br>
<label>Bean</label>&nbsp;<input type="text" name="bean" id="bean">&nbsp;&nbsp;&nbsp;
<label>Shalwar_Length</label>&nbsp;<input type="text" name="shalwar_length" id="shalwar_length">&nbsp;&nbsp;&nbsp;
<label>Shalwar_Gheera</label>&nbsp;<input type="text" name="shalwar_gheera" id="shalwar_gheera">&nbsp;&nbsp;&nbsp;
<label>Shalwar_Paincha</label>&nbsp;<input type="text" name="shalwar_paincha" id="shalwar_paincha"><br><br><br>
<label>Pocket_Front</label>&nbsp;<input type="text" name="pocket_front" id="pocket_front">&nbsp;&nbsp;&nbsp;
<label>Pocket_Side</label>&nbsp;<input type="text" name="pocket_side" id="pocket_side">&nbsp;&nbsp;&nbsp;
<label>Pocket_Shalwar</label>&nbsp;<input type="text" name="pocket_shalwar" id="pocket_shalwar">&nbsp;&nbsp;&nbsp;
<label>Pent_Length</label>&nbsp;<input type="text" name="pent_length" id="pent_length"><br><br><br>
<label>Pent_Waist</label>&nbsp;<input type="text" name="pent_waist" id="pent_waist">&nbsp;&nbsp;&nbsp;
<label>Pent_Hip</label>&nbsp;<input type="text" name="pent_hip" id="pent_hip">&nbsp;&nbsp;&nbsp;
<label>Pent_Paincha</label>&nbsp;<input type="text" name="pent_paincha" id="pent_paincha">&nbsp;&nbsp;&nbsp;
<label>Single_Salai</label>&nbsp;<input type="text" name="single_salai" id="single_salai"><br><br><br>
<label>Double_Salai</label>&nbsp;<input type="text" name="double_salai" id="double_salai">&nbsp;&nbsp;&nbsp;
<label>Triple_Salai</label>&nbsp;<input type="text" name="triple_salai" id="triple_salai">&nbsp;&nbsp;&nbsp;
<label>Design</label>&nbsp;<input type="text" name="design" id="design">&nbsp;&nbsp;&nbsp;
<label>Book_No</label>&nbsp;<input type="text" name="book_no" id="book_no">&nbsp;&nbsp;&nbsp;
<label>Design_No</label>&nbsp;<input type="text" name="design_no" id="design_no"><br><br><br>
<label>Note</label>&nbsp;<input type="text" name="note" id="note">&nbsp;&nbsp;&nbsp;
<label>price</label>&nbsp;<input type="text" name="price" id="price"><br><br><br>

<button style="margin-left: 50%; padding: 1%" type="button" id="save-data">Save</button><br><br><br>

<table>
    <thead>
    {{--<th>Id</th>--}}
    <th>Customer Id</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Address</th>
    <th>Contact</th>
    <th>Length</th>
    <th>Shoulder</th>
    <th>Neck</th>
    <th>Chest</th>
    <th>Waist</th>
    <th>Hip</th>
    <th>Gheera Gool</th>
    <th>Gheera Choras</th>
    <th>Arm</th>
    <th>Moda</th>
    <th>Kaff</th>
    <th>Kaff Width</th>
    <th>Arm Gool</th>
    <th>Arm Moori</th>
    <th>Collar</th>
    <th>Bean</th>
    <th>Shalwar Length</th>
    <th>Shalwar Gheera</th>
    <th>Shalwar Paincha</th>
    <th>Pocket Front</th>
    <th>Pocket Side</th>
    <th>Pocket Shalwar</th>
    <th>Pent Length</th>
    <th>Pent Waist</th>
    <th>Pent Hip</th>
    <th>Pent Paincha</th>
    <th>Single Salai</th>
    <th>Double Salai</th>
    <th>Triple Salai</th>
    <th>Design</th>
    <th>Book No</th>
    <th>Design No</th>
    <th>Note</th>
    <th>Price</th>
    <th>Action</th>
    </thead>
    <tbody id="customer_data">

    </tbody>
</table>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

    $saveCustomer = '{{URL::route('create.customer')}}';
    $deleteCustomer = '{{URL::route('delete.customer')}}';
    $showCustomer = '{{URL::route('customer.show')}}';
    {{--$editCustomer = '{{URL::route('customer.edit')}}';--}}
    $token = "{{ csrf_token() }}";
    $(document).ready(function () {
        getCustomers();
    });

    $('body').on('click', '#save-data', function () {
        $formData = {
            '_token': $token,
            customer_id: $('#customer_id').val(),
            first_name: $('#first_name').val(),
            last_name: $('#last_name').val(),
            address: $('#address').val(),
            contact: $('#contact').val(),
            length: $('#length').val(),
            shoulder: $('#shoulder').val(),
            neck: $('#neck').val(),
            chest: $('#chest').val(),
            waist: $('#waist').val(),
            hip: $('#hip').val(),
            gheera_gool: $('#gheera_gool').val(),
            gheera_choras: $('#gheera_choras').val(),
            arm: $('#arm').val(),
            moda: $('#moda').val(),
            kaff: $('#kaff').val(),
            kaff_width: $('#kaff_width').val(),
            arm_gool: $('#arm_gool').val(),
            arm_moori: $('#arm_moori').val(),
            collar: $('#collar').val(),
            bean: $('#bean').val(),
            shalwar_length: $('#shalwar_length').val(),
            shalwar_gheera: $('#shalwar_gheera').val(),
            shalwar_paincha: $('#shalwar_paincha').val(),
            pocket_front: $('#pocket_front').val(),
            pocket_side: $('#pocket_side').val(),
            pocket_shalwar: $('#pocket_shalwar').val(),
            pent_length: $('#pent_length').val(),
            pent_waist: $('#pent_waist').val(),
            pent_hip: $('#pent_hip').val(),
            pent_paincha: $('#pent_paincha').val(),
            single_salai: $('#single_salai').val(),
            double_salai: $('#double_salai').val(),
            triple_salai: $('#triple_salai').val(),
            design: $('#design').val(),
            book_no: $('#book_no').val(),
            design_no: $('#design_no').val(),
            note: $('#note').val(),
            price: $('#price').val(),
        };

        $.ajax({
            url: $saveCustomer,
                type: 'POST',
            data: $formData,
            success: function (response) {
                if (response.success == true) {
                    getCustomers();
                    alert('Data saved successfully');
                    $('#customer_id').val(''),
                        $('#first_name').val(''),
                        $('#last_name').val(''),
                        $('#address').val(''),
                        $('#contact').val('')
                } else {
                    toastr.error('Something went wrong!');
                }
            }
        });

    });
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
                    getCustomers();
                    alert('Data delete successfully');

                } else {
                    toastr.error('Something went wrong!');
                }
            }
        });

    })
    function getCustomers() {
        $.ajax({
            url: $showCustomer,
            type: 'GET',
            data: {},
            success: function (response) {
                if (response.success == true) {
                    $('#customer_data').html('');
                        $.each(response.data, function (i, v) {
                            var tabletData = '';
                            $.each(v, function (ii, vv) {
                                if(ii == 'id'){
                                    tabletData += '<td xmlns="http://www.w3.org/1999/html"><button class="delete-customer" id="'+vv+'">Delete</button><br><br><br><button class="edit-customer" id="'+vv+'">Edit</button></td>'
                                }else{
                                    tabletData += '<td>'+vv+'</td>'
                                }
                            })

                            var html = '<tr>'+tabletData+'</tr>';
                            $('#customer_data').append(html);
                        });
                }
            }
        });
    }
    $('body').on('click', '.edit-customer', function () {
        var id = $(this).attr('id');
        var rout = '{{url('loginuser/')}}'+'/'+id;
        window.location.href = rout;
    })


</script>

@endsection