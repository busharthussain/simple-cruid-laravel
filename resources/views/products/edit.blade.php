@extends('layouts.layout')
@section('content')

    <form action="{{ route('products.update',$data->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
<div class="form-group">
    <input type="text" class="form-control" name="id" id="edit_id" value="{{$data['id']}}" hidden>
    <label>Product Name</label>
    <input type="text" class="form-control" name="product_name" id="ed_product_name" value="{{$data['product_name']}}">
</div>

<div class="form-group">
    <label>Product Price</label>
    <input type="text" class="form-control" name="product_price" id="ed_product_price" value="{{$data['product_price']}}">
</div>
<div class="form-group">
    <label>Product Brand</label>
    <input type="text" class="form-control" name="product_brand" id="ed_product_brand" value="{{$data['product_brand']}}">
</div>
<div class="form-group">
    <label>Product Image</label>
    <input type="file" class="form-control image_show" name="file" value="{{$data['product_image']}}" id="ed_file"
           onchange="loadPreview(this);" >

</div>
<label for="profile_image"></label>
<img id="preview_img" class="image_div_show" src="{{$data['image']}}" style="" width="200" height="150" ;/>

<br>
<button type="submit" id="update_product" class="btn btn-primary" style="float: right">Update</button>

    </form>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

    $token = "{{ csrf_token() }}";

    $(document).ready(function () {





            $('body').on('click', '.image_show', function () {
                $('.image_div_show').show();


            });
        });


        function loadPreview(input, id) {
            id = id || '#preview_img';
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $(id)
                        .attr('src', e.target.result)
                        .width(200)
                        .height(150);
                };

                reader.readAsDataURL(input.files[0]);
            }

        };
</script>

    @endsection