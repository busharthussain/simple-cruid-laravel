@extends('layouts.layout')
@section('title' , 'Edit Product')
@section('content')

    {{ Form::model($data , array('id' => 'update-form-data', 'class' => 'needs-validation')) }}
        @csrf
        <div class="card">
            <div class="card-body">
                @include('products.partials._form', ['button' => 'Update', 'id' => 'edit'])
            </div>
        </div>
    {{ Form::close() }}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $addRecordRoute = '{{URL::route('products.update', ['product' => $data->id])}}';
        $indexRoute = '{{URL::route('products.index')}}';
        $token = "{{ csrf_token() }}";
        $formData = {};
        $data = null;
        $(document).ready(function () {

        });

        var updateFormData = function () {
            $formData = {
                '_token': $token,
                data: $('#update-form-data').serialize()
            };
        };

    </script>

    {!! Html::script('assets/js/client.js')!!}
@endsection