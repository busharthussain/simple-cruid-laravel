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
<label class="customer-class clear-data">Last_name</label>&nbsp;<input type="text" name="last_name" id="last_name">&nbsp;&nbsp;&nbsp;
<label class="customer-class clear-data">Address</label>&nbsp;<input type="text" name="address" id="address" class="customer-class"><br><br>&nbsp;
<label class="customer-class clear-data">Contact</label>&nbsp;<input type="text" name="contact" id="contact"class="customer-class">&nbsp;&nbsp;&nbsp;
<label class="customer-class">Length</label>&nbsp;<input type="text" name="length" id="length"class="customer-class">&nbsp;&nbsp;&nbsp;
<label class="customer-class">Shoulder</label>&nbsp;<input type="text" name="shoulder" id="shoulder"class="customer-class">&nbsp;&nbsp;&nbsp;
<label>Neck</label>&nbsp;<input type="text" name="neck" id="neck"><br><br>
<label>Chest</label>&nbsp;<input type="text" name="chest" id="chest">&nbsp;&nbsp;&nbsp;
<label>Waist</label>&nbsp;<input type="text" name="waist" id="waist">&nbsp;&nbsp;&nbsp;
<label>Hip</label>&nbsp;<input type="text" name="hip" id="hip">&nbsp;&nbsp;&nbsp;
<label>Gheera_Gool</label>&nbsp;<input type="text" name="gheera_gool" id="gheera_gool"><br><br>
<label>Gheera_Choras</label>&nbsp;<input type="text" name="gheera_choras" id="gheera_choras">&nbsp;&nbsp;&nbsp;
<label>Arm</label>&nbsp;<input type="text" name="arm" id="arm">&nbsp;&nbsp;&nbsp;
<label>Moda</label>&nbsp;<input type="text" name="moda" id="moda">&nbsp;&nbsp;&nbsp;
<label>Kaff</label>&nbsp;<input type="text" name="kaff" id="kaff"><br><br>
<label>Kaff_Width</label>&nbsp;<input type="text" name="kaff_width" id="kaff_width">&nbsp;&nbsp;&nbsp;
<label>Arm_Gool</label>&nbsp;<input type="text" name="arm_gool" id="arm_gool">&nbsp;&nbsp;&nbsp;
<label>Arm_Moori</label>&nbsp;<input type="text" name="arm_moori" id="arm_moori">&nbsp;&nbsp;&nbsp;
<label>Collar</label>&nbsp;<input type="text" name="collar" id="collar"><br><br>
<label>Bean</label>&nbsp;<input type="text" name="bean" id="bean">&nbsp;&nbsp;&nbsp;
<label>Shalwar_Length</label>&nbsp;<input type="text" name="shalwar_length" id="shalwar_length">&nbsp;&nbsp;&nbsp;
<label>Shalwar_Gheera</label>&nbsp;<input type="text" name="shalwar_gheera" id="shalwar_gheera"><br><br>
<label>Shalwar_Paincha</label>&nbsp;<input type="text" name="shalwar_paincha" id="shalwar_paincha">&nbsp;&nbsp;&nbsp;
<label>Pocket_Front</label>&nbsp;<input type="text" name="pocket_front" id="pocket_front">&nbsp;&nbsp;&nbsp;
<label>Pocket_Side</label>&nbsp;<input type="text" name="pocket_side" id="pocket_side"><br><br>
<label>Pocket_Shalwar</label>&nbsp;<input type="text" name="pocket_shalwar" id="pocket_shalwar">&nbsp;&nbsp;&nbsp;
<label>Pent_Length</label>&nbsp;<input type="text" name="pent_length" id="pent_length">&nbsp;&nbsp;&nbsp;
<label>Pent_Waist</label>&nbsp;<input type="text" name="pent_waist" id="pent_waist"><br><br>
<label>Pent_Hip</label>&nbsp;<input type="text" name="pent_hip" id="pent_hip">&nbsp;&nbsp;&nbsp;
<label>Pent_Paincha</label>&nbsp;<input type="text" name="pent_paincha" id="pent_paincha">&nbsp;&nbsp;&nbsp;
<label>Single_Salai</label>&nbsp;<input type="text" name="single_salai" id="single_salai"><br><br>
<label>Double_Salai</label>&nbsp;<input type="text" name="double_salai" id="double_salai">&nbsp;&nbsp;&nbsp;
<label>Triple_Salai</label>&nbsp;<input type="text" name="triple_salai" id="triple_salai">&nbsp;&nbsp;&nbsp;
<label>Design</label>&nbsp;<input type="text" name="design" id="design"><br><br>
<label>Book_No</label>&nbsp;<input type="text" name="book_no" id="book_no">&nbsp;&nbsp;&nbsp;
<label>Design_No</label>&nbsp;<input type="text" name="design_no" id="design_no">&nbsp;&nbsp;&nbsp;
<label class="clear-data">Suit Quantity</label>&nbsp;<input type="text" name="suit_quantity" id="suit_quantity"><br><br>
<label class="clear-data">Total price</label>&nbsp;<input type="text" name="total_price" id="total_price">&nbsp;&nbsp;&nbsp;
<label class="clear-data">Add price</label>&nbsp;<input type="text" name="add_price" id="add_price">&nbsp;&nbsp;&nbsp;
<label class="clear-data">Note</label>&nbsp;<input type="text" name="note" id="note"><br><br><br>

<dive>
<button style="margin-left: 30%; padding: 1%" type="button" id="save-data">Save</button>
<button style="margin-left: 5%; padding: 1%" type="button" onclick="addRow()">Add input</button></dive><br><br><br>
<div id="append"></div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

    $saveCustomer = '{{URL::route('save.customer')}}';
    $token = "{{ csrf_token() }}";
    $countFiles = 0;
    $(document).ready(function () {

        // $('.customer-class').hide(5000);
    });

    $('body').on('click', '#save-data', function () {
        $formData = {
            '_token': $token,

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
            total_price: $('#total_price').val(),
            add_price: $('#add_price').val(),
            suit_quantity: $('#suit_quantity').val(),
        };

        $.ajax({
            url: $saveCustomer,
                type: 'POST',
            data: $formData,
            success: function (response) {
                if (response.success == true) {

                    alert('Data saved successfully');

                        $('.clear-data').val('')

                } else {
                    toastr.error('Something went wrong!');
                }
            }
        });

    });

    /**
     * This is used to add new rows on click of attach more file
     */
    function addRow() {
        $countFiles++;
        if ($countFiles != 0) {
            $functionCall = 'remove(' + $countFiles + ')';
            $icon = 'fa-minus';
            $margin = '3%';
            $marginright = '70%';
        }
        var new_input = '<div class="form-group" id="div_'+$countFiles+'" style="margin-top: '+$margin+'; margin-right: '+$marginright+'">\n' +
            '    <div class="input-group mb-3" >\n' +
            '        <label>Size '+$countFiles+'</label>\n' +
            '        <input type="text" class="form-control" id="input_'+$countFiles+'" name="input_'+$countFiles+'">\n' +
            '        <div class="input-group-append" onclick="' + $functionCall + '">\n' +
            '               <a class="btn btn-danger" id="basic-addon2_' + $countFiles + '"><i\n' +
            '                 style="color: white;" class="fas ' + $icon + '"></i></a>' +
            '        </div>\n' +
            '    </div>\n' +
            '</div>';


        $('#append').append(new_input);
    }

    function remove(id)
    {
        $('#div_' + id).remove();
    }


</script>

@endsection