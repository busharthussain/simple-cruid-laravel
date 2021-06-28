@extends('layouts.layout')
@section('content')

<div class="card">

    <form action="{{url('products')}}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="card-body col-sm-12">
        @include('products.partials._form')
    </div>
    </form>
</div>

@endsection