@extends('layouts.layout')
@section('content')
<style>
    body{margin-top:20px;}
    .avatar{
        width:200px;
        height:200px;
    }
</style>


    <div class="container bootstrap snippets bootdey">
        <h1 class="text-primary">Edit Profile</h1>
        <hr>
        <form id="save-image" enctype="multipart/form-data">
        @csrf
        <div class="row">

            <!-- left column -->
            <div class="col-md-3">

                <div class="text-center">
                    <?php if (empty(@$data->image)) { ?>
                        <img   src="https://bootdey.com/img/Content/avatar/avatar7.png"   class="append-image avatar img-circle img-thumbnail" alt="avatar">
                    <?php } else { ?>
                        <img   src="http://127.0.0.1:8000/userimages/{{@$data->image}} "   class="append-image avatar img-circle img-thumbnail" alt="avatar">
                    <?php } ?>

                    <h6>Upload photo...</h6>

                    <input type="file" name="image" class="form-control">
                </div>

            </div>

            <!-- edit form column -->
            <div class="col-md-9 personal-info">

                <h3>Personal info</h3>


                <div class="form-group">
                    <label class="col-lg-3 control-label">Your name:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="name" type="text" value="{{@$data->name}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Shop name:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="shop_name" type="text" value="{{@$data->shop_name}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Contact:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="contact" type="text" value="{{@$data->contact}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Address:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="address" type="text" value="{{@$data->address}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Old Password:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="old_password" type="password" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">New Password:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="new_password" type="password" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Confirm Password:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="confirm_password" type="password" value="">
                    </div>
                </div>
                <br>
                <button type="submit" style="margin-left: 30%; padding: 10px">Update</button>

            </div>

        </div>
        </form>
    </div>
    <hr>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $saveImage = '{{URL::route('user.image')}}';
    $token = "{{ csrf_token() }}";
    $(document).ready(function () {

        $('#save-image').submit(function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: $saveImage,
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.success == true) {
                       if (response.message != ''){
                           toastr.error(response.message);
                       }else{
                           toastr.success('Data Updated Successfully');
                       }
                        var imagePath = '{{asset('userimages')}}';
                        $('.append-image').attr('src', imagePath + '/' + response.data.image)

                    } else {
                        toastr.error('Something went wrong!');
                    }

                }
            })
        });
    })

</script>
@endsection