@extends('layouts.layout')
@section('title' , 'Add Product')
@section('content')
    {{--Style Sheets--}}
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
          rel="stylesheet">

    <form class="needs-validation" id="form-data" enctype="multipart/form-data" novalidate>
        @csrf
        <div class="card">
            <div class="card-body">
                @include('products.partials._form', ['button' => 'Create', 'id' => 'add'])
            </div>
        </div>
    </form>

    {{--Js Files--}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>

    <script>
        $addRecordRoute = '{{URL::route('products.store')}}';
        $indexRoute = '{{URL::route('products.index')}}';
        $token = "{{ csrf_token() }}";
        $formData = {};
        $data = null;
        $(document).ready(function () {

        });

        var updateFormData = function () {
            $formData = {
                '_token': $token,
                data: $('#form-data').serialize()
            };
        };

        FilePond.registerPlugin(
            // preview the image file type...
            FilePondPluginImagePreview,
        );

        FilePond.create(document.querySelector('.image-preview-filepond'), {
            allowImagePreview: true,
            allowImageFilter: false,
            allowImageExifOrientation: false,
            allowImageCrop: false,
            acceptedFileTypes: ['image/png', 'image/jpg', 'image/jpeg'],
            fileValidateTypeDetectType: (source, type) => new Promise((resolve, reject) => {
                // Do custom type detection here and return with promise
                resolve(type);
            })
        });

    </script>

    {!! Html::script('assets/js/client.js')!!}
@endsection