@extends('layouts.layout')
@section('content')

<div class="card">

    <form action="{{url('product')}}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="card-body col-sm-12">
        @include('product.partials._form')
    </div>
    </form>
</div>

@endsection