
    {{Form::label('product Name','product Name')}}<br>
    {{Form::text('email', '', array('class' => 'form-control' ,'name' => 'product_name'))}}


    {{Form::label('Product Price','Product Price')}}<br>
    {{Form::text('email', '', array('class' => 'form-control' ,'name' => 'product_price'))}}


    {{Form::label('product Brand','product Brand')}}<br>
    {{Form::text('email', '', array('class' => 'form-control' ,'name' => 'product_brand'))}}

<div class="form-group">
    <label>Product Image</label>
    <input type="file" class="form-control image_show" name="file" id="file" onchange="loadPreview(this);">

</div>
<label for="profile_image"></label>
<img id="preview_img" class="image_div_show" src="" style="display:none" width="200" height="150";  />
<br>
<button type="submit" class="btn btn-primary" style="float: right">Save</button>

<script
        src="https://code.jquery.com/jquery-3.6.0.min.js">
</script>
<script>
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
        ;
    };

</script>