@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'email', 'title' => __('Digi Taylor')])

@section('content')
    <div class="container" style="height: auto;">
        <div class="row align-items-center">
            <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
                {{--<form class="form" method="POST" action="{{ route('password.email') }}">--}}
                {{--@csrf--}}

                <div class="card card-login card-hidden mb-3">
                    <div class="card-header card-header-primary text-center">
                        <h4 class="card-title"><strong>{{ __('Forgot Password') }}</strong></h4>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Enter OTP</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body col-sm-12">
                                    <input type="text" class="form-control" name="otp" id="otp" placeholder="enter otp...">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" id="send-otp">Send</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <i class="material-icons">close</i>
                                        </button>
                                        <span>{{ session('status') }}</span>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                            <div class="input-group">
                                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">email</i>
                  </span>
                                </div>
                                <input type="email" name="email" id="email" class="form-control"
                                       placeholder="{{ __('Email...') }}"
                                       value="{{ old('email') }}" required>
                            </div>
                            @if ($errors->has('email'))
                                <div id="email-error" class="error text-danger pl-3" for="email"
                                     style="display: block;">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer justify-content-center">
                        <button type="submit" class="btn btn-primary btn-link btn-lg "
                                id="send-email">{{ __('Send Password Reset Link') }}</button>
                    </div>
                </div>
                {{--</form>--}}
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{--<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>--}}
    <script>
        $sendMail = '{{URL::route('send.mail')}}';
        $sendOtp = '{{URL::route('send.otp')}}';
        $token = "{{ csrf_token() }}";
        $(document).ready(function () {

        });

        $('body').on('click', '#send-email', function () {
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
                        $('#exampleModal').modal('show');
                        $('.modal-backdrop').removeClass('modal-backdrop');
                    } else {
                        toastr.error(response.message);
                    }
                }
            });
        });

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
