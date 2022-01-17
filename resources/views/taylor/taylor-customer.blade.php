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

<label>id</label>&nbsp;<input type="number" name="customer_id" id="customer_id">&nbsp;&nbsp;&nbsp;
<label>First_name</label>&nbsp;<input type="text" name="first_name" id="first_name">&nbsp;&nbsp;&nbsp;
<label>Last_name</label>&nbsp;<input type="text" name="last_name" id="last_name">&nbsp;&nbsp;&nbsp;
<label>Address</label>&nbsp;<input type="text" name="address" id="address">&nbsp;&nbsp;&nbsp;
<label>Contact</label>&nbsp;<input type="text" name="contact" id="contact"><br><br><br>
<label>Length</label>&nbsp;<input type="text" name="length" id="length">&nbsp;&nbsp;&nbsp;
<label>Shoulder</label>&nbsp;<input type="text" name="shoulder" id="shoulder">&nbsp;&nbsp;&nbsp;
<label>Neck</label>&nbsp;<input type="text" name="neck" id="neck">&nbsp;&nbsp;&nbsp;
<label>Chest</label>&nbsp;<input type="text" name="chest" id="chest">&nbsp;&nbsp;&nbsp;
<label>Waist</label><br>
<input type="text" name="waist" id="waist"><br>
<label>Hip</label><br>
<input type="text" name="hip" id="hip"><br>
<label>Gheera_Gool</label><br>
<input type="text" name="gheera_gool" id="gheera_gool"><br>
<label>Gheera_Choras</label><br>
<input type="text" name="gheera_choras" id="gheera_choras"><br>
<label>Arm</label><br>
<input type="text" name="arm" id="arm"><br>
<label>Moda</label><br>
<input type="text" name="moda" id="moda"><br>
<label>Kaff</label><br>
<input type="text" name="kaff" id="kaff"><br>
<label>Kaff_Width</label><br>
<input type="text" name="kaff_width" id="kaff_width"><br>
<label>Arm_Gool</label><br>
<input type="text" name="arm_gool" id="arm_gool"><br>
<label>Arm_Moori</label><br>
<input type="text" name="arm_moori" id="arm_moori"><br>
<label>Collar</label><br>
<input type="text" name="collar" id="collar"><br>
<label>Bean</label><br>
<input type="text" name="bean" id="bean"><br>
<label>Shalwar_Length</label><br>
<input type="text" name="shalwar_length" id="shalwar_length"><br>
<label>Shalwar_Gheera</label><br>
<input type="text" name="shalwar_gheera" id="shalwar_gheera"><br>
<label>Shalwar_Paincha</label><br>
<input type="text" name="shalwar_paincha" id="shalwar_paincha"><br>
<label>Pocket_Front</label><br>
<input type="text" name="pocket_front" id="pocket_front"><br>
<label>Pocket_Side</label><br>
<input type="text" name="pocket_side" id="pocket_side"><br>
<label>Pocket_Shalwar</label><br>
<input type="text" name="pocket_shalwar" id="pocket_shalwar"><br>
<label>Pent_Length</label><br>
<input type="text" name="pent_length" id="pent_length"><br>
<label>Pent_Waist</label><br>
<input type="text" name="pent_waist" id="pent_waist"><br>
<label>Pent_Hip</label><br>
<input type="text" name="pent_hip" id="pent_hip"><br>
<label>Pent_Paincha</label><br>
<input type="text" name="pent_paincha" id="pent_paincha"><br>
<label>Single_Salai</label><br>
<input type="text" name="single_salai" id="single_salai"><br>
<label>Double_Salai</label><br>
<input type="text" name="double_salai" id="double_salai"><br>
<label>Triple_Salai</label><br>
<input type="text" name="triple_salai" id="triple_salai"><br>
<label>Design</label><br>
<input type="text" name="design" id="design"><br>
<label>Book_No</label><br>
<input type="text" name="book_no" id="book_no"><br>
<label>Design_No</label><br>
<input type="text" name="design_no" id="design_no"><br>
<label>Note</label><br>
<input type="text" name="note" id="note"><br>
<label>price</label><br>
<input type="text" name="price" id="price"><br>

<button type="button" id="save-data">Save</button>
<br>









<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $saveCustomer = '{{URL::route('create.customer')}}';
    $token = "{{ csrf_token() }}";
    $(document).ready(function () {

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

    })



</script>

