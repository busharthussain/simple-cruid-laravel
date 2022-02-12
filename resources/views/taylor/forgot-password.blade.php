@extends('layouts.layout')
@section('content')

<style>
.form-gap {
padding-top: 70px;
}
</style>

{{--<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">--}}
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<div class="form-gap"></div>
<div class="container" style="margin-left: 35%!important;">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="text-center">
                        <h3><i class="fa fa-lock fa-4x"></i></h3>
                        <h2 class="text-center">Forgot Password?</h2>
                        <p>You can reset your password here.</p>
                        <div class="panel-body">


                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                        <input id="email" name="email" placeholder="email address" class="form-control"  type="email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button name="recover-submit" id="forgot-password" class="btn btn-lg btn-primary" data-toggle="modal" data-target="#exampleModal" type="button">Reset Password</button>
                                </div>

                                <input type="hidden" class="hide" name="token" id="token" value="">

                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Enter OTP</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body col-sm-12">
                                    <input type="text" name="otp" id="otp" placeholder="enter otp...">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" id="send-otp">Send</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

    $sendMail = '{{URL::route('send.mail')}}';
    $sendOtp = '{{URL::route('send.otp')}}';
    $token = "{{ csrf_token() }}";
    $(document).ready(function () {

    });
    $('body').on('click', '#forgot-password', function () {


        $formData = {
            '_token': $token,
            email: $('#email').val()

        };
        $.ajax({
            url: $sendMail,
            type: 'POST',
            data: $formData,
            success: function (response) {

                if (response.success == true) {
                    toastr.success(response.message);
                } else {
                    toastr.error('Something went wrong!');
                }

            }
        });

    })

    $('body').on('click', '#send-otp', function () {


        $formData = {
            '_token': $token,
            otp: $('#otp').val()

        };
        $.ajax({
            url: $sendOtp,
            type: 'POST',
            data: $formData,
            success: function (response) {

                if (response.success == true) {
                    toastr.success(response.message);
                    window.location.href = '{{url('change/password')}}'
                } else {
                    toastr.error(response.message);
                }

            }
        });




    })

</script>
@endsection