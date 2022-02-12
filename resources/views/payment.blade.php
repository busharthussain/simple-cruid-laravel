<div style="margin-left: 30%"><h1>Stripe Payment</h1>
<label>Card No</label><br>
<input type="text" name="card_number" id="card_number"><br>
<label>Expiry Month</label><br>
<input type="text" name="expiry_month" id="expiry_month"><br>
<label>Expiry Year</label><br>
<input type="text" name="expiry_year" id="expiry_year"><br>
<label>CVC</label><br>
<input type="text" name="cvc" id="cvc"><br><br>
<button type="submit" id="save-payment" style="margin-left:7%; padding: 10px">Save</button></div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

    $getPayment = '{{URL::route('save.payment')}}'
    $token = "{{csrf_token()}}";
    $(document).ready(function () {

    });
    $('body').on('click', '#save-payment', function () {

        $formData = {
            '_token': $token,
            card_number : $('#card_number').val(),
            expiry_month: $('#expiry_month').val(),
            expiry_year : $('#expiry_year').val(),
            cvc         : $('#cvc').val(),
        };
        $.ajax({
            url: $getPayment,
            type: 'POST',
            data: $formData,
            success: function (response) {
                if (response.success == true) {


                } else {
                    toastr.error('Something went wrong!');
                }
            }
        });
    })
</script>