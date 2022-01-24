@extends('layouts.layout')
@section('title' , 'Forget Password')
@section('content')
    @if (\Session::has('success'))
        <div class="alert alert-success">
            {!! \Session::get('success') !!}
        </div>
    @endif
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
            <form method="post" action="{{url('forget/password')}}">
                @csrf
                <div class="form-group">
                    <label>
                        Email
                    </label>
                    <input type="email" class="form-control" name="email">
                </div>
                <button class="btn btn-outline-primary">Send an email verification link</button>
            </form>
        </div>
    </div>
@endsection