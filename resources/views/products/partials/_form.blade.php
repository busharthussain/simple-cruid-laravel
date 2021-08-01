{{Form::label('Name','Name')}}<br>
{{Form::text('name', null, array('class' => 'form-control' ,'name' => 'name', 'id' => 'name', 'placeholder' => 'Name'))}}
{{Form::label('Price','Price')}}<br>
{{Form::number('price', null, array('class' => 'form-control' ,'name' => 'price', 'id' => 'price', 'placeholder' => 'Price'))}}
{{Form::label('Brand','Brand')}}<br>
{{Form::text('brand', null, array('class' => 'form-control' ,'name' => 'brand', 'id' => 'brand', 'placeholder' => 'Brand'))}}
<br>
<div class="form-group">
    {{Form::label('Image','Image')}}<br>
    <input type="file" class="image-preview-filepond" name="file" id="file">
</div>

<button type="submit" id="{{$id}}-record" class="btn btn-primary" style="float: right">{{$button}}</button>
