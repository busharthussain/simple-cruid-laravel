@extends('layouts.layout')
@section('title' , 'Customer')
@section('content')


<h3 style="margin-left: 35%">Edit Customer</h3><br>
<label>Id</label>&nbsp;<input type="text" name="id"  id="id" value="{{$obj->id}}">&nbsp;&nbsp;&nbsp;
<label>First_name</label>&nbsp;<input type="text" name="first_name" id="first_name" value="{{$obj->first_name}}">&nbsp;&nbsp;&nbsp;
<label>Last_name</label>&nbsp;<input type="text" name="last_name" id="last_name" value="{{$obj->last_name}}">&nbsp;&nbsp;&nbsp;
<label>Address</label>&nbsp;<input type="text" name="address" id="address" value="{{$obj->address}}"><br><br>
<label>Contact</label>&nbsp;<input type="text" name="contact" id="contact" value="{{$obj->contact}}">&nbsp;&nbsp;&nbsp;
<label>Length</label>&nbsp;<input type="text" name="length" id="length" value="{{$obj->length}}">&nbsp;&nbsp;&nbsp;
<label>Shoulder</label>&nbsp;<input type="text" name="shoulder" id="shoulder" value="{{$obj->shoulder}}">&nbsp;&nbsp;&nbsp;
<label>Neck</label>&nbsp;<input type="text" name="neck" id="neck" value="{{$obj->neck}}"><br><br>
<label>Chest</label>&nbsp;<input type="text" name="chest" id="chest" value="{{$obj->chest}}">&nbsp;&nbsp;&nbsp;
<label>Waist</label>&nbsp;<input type="text" name="waist" id="waist" value="{{$obj->waist}}">&nbsp;&nbsp;&nbsp;
<label>Hip</label>&nbsp;<input type="text" name="hip" id="hip" value="{{$obj->hip}}">&nbsp;&nbsp;&nbsp;
<label>Gheera_Gool</label>&nbsp;<input type="text" name="gheera_gool" id="gheera_gool" value="{{$obj->gheera_gool}}"><br><br>
<label>Gheera_Choras</label>&nbsp;<input type="text" name="gheera_choras" id="gheera_choras" value="{{$obj->gheera_choras}}">&nbsp;&nbsp;&nbsp;
<label>Arm</label>&nbsp;<input type="text" name="arm" id="arm" value="{{$obj->arm}}">&nbsp;&nbsp;&nbsp;
<label>Moda</label>&nbsp;<input type="text" name="moda" id="moda" value="{{$obj->moda}}">
<label>Kaff</label>&nbsp;<input type="text" name="kaff" id="kaff" value="{{$obj->kaff}}"><br><br>
<label>Kaff_Width</label>&nbsp;<input type="text" name="kaff_width" id="kaff_width" value="{{$obj->kaff_width}}">&nbsp;&nbsp;&nbsp;
<label>Arm_Gool</label>&nbsp;<input type="text" name="arm_gool" id="arm_gool" value="{{$obj->arm_gool}}">&nbsp;&nbsp;&nbsp;
<label>Arm_Moori</label>&nbsp;<input type="text" name="arm_moori" id="arm_moori" value="{{$obj->arm_moori}}">&nbsp;&nbsp;&nbsp;
<label>Collar</label>&nbsp;<input type="text" name="collar" id="collar" value="{{$obj->collar}}"><br><br>
<label>Bean</label>&nbsp;<input type="text" name="bean" id="bean" value="{{$obj->bean}}">&nbsp;&nbsp;&nbsp;
<label>Shalwar_Length</label>&nbsp;<input type="text" name="shalwar_length" id="shalwar_length" value="{{$obj->shalwar_length}}">&nbsp;&nbsp;&nbsp;
<label>Shalwar_Gheera</label>&nbsp;<input type="text" name="shalwar_gheera" id="shalwar_gheera" value="{{$obj->shalwar_gheera}}"><br><br>
<label>Shalwar_Paincha</label>&nbsp;<input type="text" name="shalwar_paincha" id="shalwar_paincha" value="{{$obj->shalwar_paincha}}">&nbsp;&nbsp;&nbsp;
<label>Pocket_Front</label>&nbsp;<input type="text" name="pocket_front" id="pocket_front" value="{{$obj->pocket_front}}">&nbsp;&nbsp;&nbsp;
<label>Pocket_Side</label>&nbsp;<input type="text" name="pocket_side" id="pocket_side" value="{{$obj->pocket_side}}"><br><br>
<label>Pocket_Shalwar</label>&nbsp;<input type="text" name="pocket_shalwar" id="pocket_shalwar" value="{{$obj->pocket_shalwar}}">&nbsp;&nbsp;&nbsp;
<label>Pent_Length</label>&nbsp;<input type="text" name="pent_length" id="pent_length" value="{{$obj->pent_length}}">&nbsp;&nbsp;&nbsp;
<label>Pent_Waist</label>&nbsp;<input type="text" name="pent_waist" id="pent_waist" value="{{$obj->pent_waist}}"><br><br>
<label>Pent_Hip</label>&nbsp;<input type="text" name="pent_hip" id="pent_hip" value="{{$obj->pent_hip}}">&nbsp;&nbsp;&nbsp;
<label>Pent_Paincha</label>&nbsp;<input type="text" name="pent_paincha" id="pent_paincha" value="{{$obj->pent_paincha}}">&nbsp;&nbsp;&nbsp;
<label>Single_Salai</label>&nbsp;<input type="text" name="single_salai" id="single_salai" value="{{$obj->single_salai}}"><br><br>
<label>Double_Salai</label>&nbsp;<input type="text" name="double_salai" id="double_salai" value="{{$obj->double_salai}}">&nbsp;&nbsp;&nbsp;
<label>Triple_Salai</label>&nbsp;<input type="text" name="triple_salai" id="triple_salai" value="{{$obj->triple_salai}}">&nbsp;&nbsp;&nbsp;
<label>Design</label>&nbsp;<input type="text" name="design" id="design" value="{{$obj->design}}"><br><br>
<label>Book_No</label>&nbsp;<input type="text" name="book_no" id="book_no" value="{{$obj->book_no}}">&nbsp;&nbsp;&nbsp;
<label>Design_No</label>&nbsp;<input type="text" name="design_no" id="design_no" value="{{$obj->design_no}}">&nbsp;&nbsp;&nbsp;
<label>Suit Quantity</label>&nbsp;<input type="text" name="suit_quantity" id="suit_quantity" value="{{$obj->suit_quantity}}"><br><br>
<label>Total price</label>&nbsp;<input type="text" name="total_price" id="total_price" value="{{$obj->total_price}}">&nbsp;&nbsp;&nbsp;
<label>Add price</label>&nbsp;<input type="text" name="add_price" id="add_price" value="{{$obj->add_price}}">&nbsp;&nbsp;&nbsp;
<label>Note</label>&nbsp;<input type="text" name="note" id="note" value="{{$obj->note}}"><br><br><br>


<button style="margin-left: 40%; padding: 1%" type="button" id="update-customer">Update</button>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

    $updateCustomer = '{{URL::route('update.customer')}}';
    $editCustomer = '{{URL::route('customer.search')}}';
    $token = "{{ csrf_token() }}";
    $(document).ready(function () {

    });

    $('body').on('keypress', '#price', function (e) {


        // alert($kk);
        if (e.which == 13)  {
            $kk = $(this).val()
            if ($kk > 100) {
                alert('Ok');
            }
            else {
                alert('Price Low');
            }
        }



    })

    $('body').on('keypress', '#id', function (e) {


        // alert($kk);
        if (e.which == 13)  {
            $formData = {
                '_token': $token,
                id: $(this).val()

            };
            $.ajax({
                url: $editCustomer,
                type: 'POST',
                data: $formData,
                success: function (response) {
                    $('#first_name').val(response.data.first_name)
                    $('#last_name').val(response.data.last_name)
                    $('#address').val(response.data.address)
                    $('#contact').val(response.data.contact)
                }
            });
        }



    })




    $('body').on('click', '#update-customer', function () {

        $formData = {
            '_token': $token,
            id: $('#id').val(),
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
            suit_quantity:$('#suit_quantity').val(),
            total_price: $('#total_price').val(),
            add_price: $('#add_price').val(),
            note: $('#note').val(),
        };
        $.ajax({
            url: $updateCustomer,
            type: 'POST',
            data: $formData,
            success: function (response) {
                if (response.success == true) {

                    alert(response.message)
                    window.location.href = '{{url('get/customers')}}'

                } else {
                    toastr.error('Something went wrong!');
                }
            }
        });

    })

</script>
@endsection