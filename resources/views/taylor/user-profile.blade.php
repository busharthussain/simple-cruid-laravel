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
        <div class="row">
            <!-- left column -->
            <div class="col-md-3">
                <div class="text-center">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="avatar img-circle img-thumbnail" alt="avatar">
                    <h6>Upload photo...</h6>

                    <input type="file" class="form-control">
                </div>
            </div>

            <!-- edit form column -->
            <div class="col-md-9 personal-info">

                <h3>Personal info</h3>

                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Your name:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" value="{{$data->name}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Shop name:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" value="{{$data->shop_name}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Contact:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" value="{{$data->contact}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Address:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" value="{{$data->address}}">
                        </div>
                    </div><br>
                    <button type="submit" style="margin-left: 30%; padding: 10px" >Update</button>
                </form>
            </div>
        </div>
    </div>
    <hr>

    @endsection