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
            <form method="post" action="{{url('reset/password')}}">
                @csrf
                <input type="text" value="{{$id}}" name="user_id" hidden>
                <div class="form-group">
                    <label>
                        New Password
                    </label>
                    <input type="password" class="form-control" name="new_password">
                </div>
                <div class="form-group">
                    <label>
                        Confirm Password
                    </label>
                    <input type="password" class="form-control" name="confirm_password">
                </div>
                <button class="btn btn-outline-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection