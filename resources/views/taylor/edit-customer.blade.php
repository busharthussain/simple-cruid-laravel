<h3>Customer</h3>
<input type="text" name="id" hidden id="id" value="{{$obj->id}}">
<label>Id</label>&nbsp;<input type="number" name="customer_id" id="customer_id" value="{{$obj->customer_id}}">&nbsp;&nbsp;&nbsp;
<label>First_name</label>&nbsp;<input type="text" name="first_name" id="first_name" value="{{$obj->first_name}}">&nbsp;&nbsp;&nbsp;
<label>Last_name</label>&nbsp;<input type="text" name="last_name" id="last_name" value="{{$obj->last_name}}">&nbsp;&nbsp;&nbsp;
<label>Address</label>&nbsp;<input type="text" name="address" id="address" value="{{$obj->address}}">&nbsp;&nbsp;&nbsp;
<label>Contact</label>&nbsp;<input type="text" name="contact" id="contact" value="{{$obj->contact}}"><br><br><br>
<label>Length</label>&nbsp;<input type="text" name="length" id="length" value="{{$obj->length}}">&nbsp;&nbsp;&nbsp;
<label>Shoulder</label>&nbsp;<input type="text" name="shoulder" id="shoulder" value="{{$obj->shoulder}}">&nbsp;&nbsp;&nbsp;
<label>Neck</label>&nbsp;<input type="text" name="neck" id="neck" value="{{$obj->neck}}">&nbsp;&nbsp;&nbsp;
<label>Chest</label>&nbsp;<input type="text" name="chest" id="chest" value="{{$obj->chest}}">&nbsp;&nbsp;&nbsp;
<label>Waist</label>&nbsp;<input type="text" name="waist" id="waist" value="{{$obj->waist}}"><br><br><br>
<label>Hip</label>&nbsp;<input type="text" name="hip" id="hip" value="{{$obj->hip}}">&nbsp;&nbsp;&nbsp;
<label>Gheera_Gool</label>&nbsp;<input type="text" name="gheera_gool" id="gheera_gool" value="{{$obj->gheera_gool}}">&nbsp;&nbsp;&nbsp;
<label>Gheera_Choras</label>&nbsp;<input type="text" name="gheera_choras" id="gheera_choras" value="{{$obj->gheera_choras}}">&nbsp;&nbsp;&nbsp;
<label>Arm</label>&nbsp;<input type="text" name="arm" id="arm" value="{{$obj->arm}}">&nbsp;&nbsp;&nbsp;
<label>Moda</label>&nbsp;<input type="text" name="moda" id="moda" value="{{$obj->moda}}">&nbsp;&nbsp;&nbsp;<br><br><br>
<label>Kaff</label>&nbsp;<input type="text" name="kaff" id="kaff" value="{{$obj->kaff}}">&nbsp;&nbsp;&nbsp;
<label>Kaff_Width</label>&nbsp;<input type="text" name="kaff_width" id="kaff_width" value="{{$obj->kaff_width}}">&nbsp;&nbsp;&nbsp;
<label>Arm_Gool</label>&nbsp;<input type="text" name="arm_gool" id="arm_gool" value="{{$obj->arm_gool}}">&nbsp;&nbsp;&nbsp;
<label>Arm_Moori</label>&nbsp;<input type="text" name="arm_moori" id="arm_moori" value="{{$obj->arm_moori}}">&nbsp;&nbsp;&nbsp;
<label>Collar</label>&nbsp;<input type="text" name="collar" id="collar" value="{{$obj->collar}}"><br><br><br>
<label>Bean</label>&nbsp;<input type="text" name="bean" id="bean" value="{{$obj->bean}}">&nbsp;&nbsp;&nbsp;
<label>Shalwar_Length</label>&nbsp;<input type="text" name="shalwar_length" id="shalwar_length" value="{{$obj->shalwar_length}}">&nbsp;&nbsp;&nbsp;
<label>Shalwar_Gheera</label>&nbsp;<input type="text" name="shalwar_gheera" id="shalwar_gheera" value="{{$obj->shalwar_gheera}}">&nbsp;&nbsp;&nbsp;
<label>Shalwar_Paincha</label>&nbsp;<input type="text" name="shalwar_paincha" id="shalwar_paincha" value="{{$obj->shalwar_paincha}}"><br><br><br>
<label>Pocket_Front</label>&nbsp;<input type="text" name="pocket_front" id="pocket_front" value="{{$obj->pocket_front}}">&nbsp;&nbsp;&nbsp;
<label>Pocket_Side</label>&nbsp;<input type="text" name="pocket_side" id="pocket_side" value="{{$obj->pocket_side}}">&nbsp;&nbsp;&nbsp;
<label>Pocket_Shalwar</label>&nbsp;<input type="text" name="pocket_shalwar" id="pocket_shalwar" value="{{$obj->pocket_shalwar}}">&nbsp;&nbsp;&nbsp;
<label>Pent_Length</label>&nbsp;<input type="text" name="pent_length" id="pent_length" value="{{$obj->pent_length}}"><br><br><br>
<label>Pent_Waist</label>&nbsp;<input type="text" name="pent_waist" id="pent_waist" value="{{$obj->pent_waist}}">&nbsp;&nbsp;&nbsp;
<label>Pent_Hip</label>&nbsp;<input type="text" name="pent_hip" id="pent_hip" value="{{$obj->pent_hip}}">&nbsp;&nbsp;&nbsp;
<label>Pent_Paincha</label>&nbsp;<input type="text" name="pent_paincha" id="pent_paincha" value="{{$obj->pent_paincha}}">&nbsp;&nbsp;&nbsp;
<label>Single_Salai</label>&nbsp;<input type="text" name="single_salai" id="single_salai" value="{{$obj->single_salai}}"><br><br><br>
<label>Double_Salai</label>&nbsp;<input type="text" name="double_salai" id="double_salai" value="{{$obj->double_salai}}">&nbsp;&nbsp;&nbsp;
<label>Triple_Salai</label>&nbsp;<input type="text" name="triple_salai" id="triple_salai" value="{{$obj->triple_salai}}">&nbsp;&nbsp;&nbsp;
<label>Design</label>&nbsp;<input type="text" name="design" id="design" value="{{$obj->design}}">&nbsp;&nbsp;&nbsp;
<label>Book_No</label>&nbsp;<input type="text" name="book_no" id="book_no" value="{{$obj->book_no}}">&nbsp;&nbsp;&nbsp;
<label>Design_No</label>&nbsp;<input type="text" name="design_no" id="design_no" value="{{$obj->design_no}}"><br><br><br>
<label>Note</label>&nbsp;<input type="text" name="note" id="note" value="{{$obj->note}}">&nbsp;&nbsp;&nbsp;
<label>price</label>&nbsp;<input type="text" name="price" id="price" value="{{$obj->price}}"><br><br><br>

<button style="margin-left: 50%; padding: 1%" type="button" id="update-customer">Update</button><br><br><br>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

    $updateCustomer = '{{URL::route('update.customer')}}';
    $token = "{{ csrf_token() }}";
    $(document).ready(function () {

    });

    $('body').on('click', '#update-customer', function () {

        $formData = {
            '_token': $token,
            id: $('#id').val(),
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
            url: $updateCustomer,
            type: 'POST',
            data: $formData,
            success: function (response) {
                if (response.success == true) {

                    alert(response.message)
                    window.location.href = '{{url('/taylor')}}'

                } else {
                    toastr.error('Something went wrong!');
                }
            }
        });

    })


</script>