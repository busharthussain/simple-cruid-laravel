@extends('layouts.layout')
@section('title' , 'Reset Password')
@section('content')
    @if (\Session::has('error'))
        <div class="alert alert-danger">
            {!! \Session::get('error') !!}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <h6 class="card-title">Forget Password</h6>
        </div>
        <div class="card-body">
            {{--<form method="post" action="{{url('change/password')}}">--}}
                {{--@csrf--}}
                <input type="text" value="" name="user_id" hidden>
                <div class="form-group">
                    <label>
                        New Password
                    </label>
                    <input type="password" class="form-control" id="new_password" name="new_password">
                </div>
                <div class="form-group">
                    <label>
                        Confirm Password
                    </label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                </div>
                <button class="btn btn-outline-primary" id="save-password">Submit</button>
            {{--</form>--}}
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>

        $savePassword = '{{URL::route('save.password')}}';
        $token = "{{ csrf_token() }}";
        $(document).ready(function () {

        });

        $('body').on('click', '#save-password', function () {


            $formData = {
                '_token': $token,
                new_password: $('#new_password').val(),
                confirm_password: $('#confirm_password').val()

            };
            $.ajax({
                url: $savePassword,
                type: 'POST',
                data: $formData,
                success: function (response) {

                    if (response.success == true) {
                        toastr.success(response.message);
                        window.location.href = '{{url('logout')}}'
                    } else {
                        toastr.error('Password Not Match');
                    }

                }
            });


        })
        
        function logout() {
            
        }
    </script>
@endsection