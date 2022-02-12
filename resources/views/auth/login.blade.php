@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'login', 'title' => __('Digi Taylor')])

@section('content')
<div class="container" style="height: auto;">
  <div class="row align-items-center">
    <div class="col-md-9 ml-auto mr-auto mb-3 text-center">
      <h3>{{ __('') }} </h3>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
      <form class="form" method="POST" action="{{ route('login') }}">
        @csrf

        <div class="card card-login card-hidden mb-3">
          <div class="card-header card-header-primary text-center">
            <h4 class="card-title"><strong>{{ __('Login') }}</strong></h4>
            <div class="social-line">
              <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                <i class="fab fa-facebook-square"></i>
              </a>
              <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                <i class="fab fa-google-plus"></i>
              </a>
            </div>
          </div>
          <div class="card-body">
            <p class="card-description text-center">{{ __(' Sign in with ') }} <strong>Contact</strong> {{ __(' and the password ') }}<strong>secret</strong> </p>
            <div class="bmd-form-group{{ $errors->has('contact') ? ' has-danger' : '' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0zm0 0h24v24H0zm0 0h24v24H0z" fill="none"/><path d="M20 0H4v2h16V0zM4 24h16v-2H4v2zM20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm-8 2.75c1.24 0 2.25 1.01 2.25 2.25s-1.01 2.25-2.25 2.25S9.75 10.24 9.75 9 10.76 6.75 12 6.75zM17 17H7v-1.5c0-1.67 3.33-2.5 5-2.5s5 .83 5 2.5V17z"/></svg>
                  </span>
                </div>
                <input type="text" name="contact" id="contact" class="form-control" placeholder="{{ __('Contact...') }}" value="{{ old('contact', '03074633210') }}" required>
              </div>
              @if ($errors->has('contact'))
                <div id="contact-error" class="error text-danger pl-3" for="contact" style="display: block;">
                  <strong>{{ $errors->first('contact') }}</strong>
                </div>
              @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('password') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">lock_outline</i>
                  </span>
                </div>
                <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('Password...') }}" value="{{ !$errors->has('password') ? "secret" : "" }}">
              </div>
              @if ($errors->has('password'))
                <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
                  <strong>{{ $errors->first('password') }}</strong>
                </div>
              @endif
            </div>
            <div class="form-check mr-auto ml-3 mt-3">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember me') }}
                <span class="form-check-sign">
                  <span class="check"></span>
                </span>
              </label>
            </div>
          </div>
          <div class="card-footer justify-content-center">
            <button type="submit" class="btn btn-primary btn-link btn-lg" id="login-user">Lets Go</button>
          </div>
        </div>
      {{--</form>--}}
      <div class="row">
        <div class="col-6">
            {{--@if (Route::has('password.request'))--}}
                <a href="{{ route('forgot-password') }}" class="text-light">
                    <small>{{ __('Forgot password?') }}</small>
                </a>
            {{--@endif--}}
        </div>
        <div class="col-6 text-right">
            <a href="{{ route('register') }}" class="text-light">
                <small>{{ __('Create new account') }}</small>
            </a>
        </div>
      </div>
      </form>
    </div>
  </div>
</div>


{{--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>--}}
{{--<script>--}}

    {{--$loginUser = '{{route('login')}}';--}}
    {{--$token = "{{ csrf_token() }}";--}}
    {{--$(document).ready(function () {--}}
        {{--// getCustomers();--}}
    {{--});--}}

    {{--$('body').on('click', '#login-user', function () {--}}
        {{--$formData = {--}}
            {{--'_token': $token,--}}
            {{--contact: $('#contact').val(),--}}
            {{--password: $('#password').val(),--}}

        {{--};--}}

        {{--$.ajax({--}}
            {{--url: $loginUser,--}}
            {{--type: 'POST',--}}
            {{--data: $formData,--}}
            {{--success: function (response) {--}}
                {{--if (response.success == true) {--}}


                    {{--window.location.href = '{{url('/customer')}}';--}}
                    {{--$('#contact').val('');--}}
                        {{--$('#password').val('')--}}

                {{--} else {--}}
                    {{--// toastr.error('Something went wrong!');--}}
                {{--}--}}
            {{--}--}}
        {{--});--}}

    {{--});--}}
{{--</script>--}}
@endsection