@extends('layouts.layout')
@section('content')

<style>
    body {
    background-color: #545454;
    font-family: "Poppins", sans-serif;
    font-weight: 300
    }

    .container {
    height: 100vh
    }


    .card {
    width: 380px;
    border: none;
    border-radius: 15px;
    padding: 8px;
    background-color: #fff;
    position: relative;
    height: 460px
    }

    .upper {
    height: 100px
    }

    .upper img {
    width: 100%;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px
    }

    .user {
    position: relative
    }

    .profile img {
    height: 80px;
    width: 80px;
    margin-top: 2px
    }

    .profile {
    position: absolute;
    top: -50px;
    left: 38%;
    height: 90px;
    width: 90px;
    border: 3px solid #fff;
    border-radius: 50%
    }

    .follow {
    border-radius: 15px;
    padding-left: 20px;
    padding-right: 20px;
    height: 35px
    }
    .user-img{

        margin-top: 30%;
    }

    .stats span {
    font-size: 29px
    }
    /*For Language Popup*/
</style>

    <div class="container d-flex justify-content-center align-items-center" style="margin-top: -5%;">
        <div class="card">
            <div class="upper"> <img src="{{asset('assets/img/taylor.jpg')}}" class="img-fluid"> </div>
            <div class="user text-center user-img" >
                {{--<form id="save-image" enctype="multipart/form-data">--}}
                    {{--@csrf--}}
                <div class="profile"> <img  style="cursor: pointer"  src="{{asset('assets/img/profile-img.png')}}" class="rounded-circle append-image" id="image" width="80">
                    {{--<input type="file" name="image" id="myfile" style="display: none;"/></div>--}}
                    {{--<button style="margin-top: 13%;" type="submit">submit</button>--}}
                {{--</form>--}}
            </div>
                {{--Model--}}
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Enter OTP</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body col-sm-12">
                                <input type="text" name="otp" id="otp" placeholder="enter otp...">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="send-otp">Send</button>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="mt-5 text-center">
                <span class="mb-0 user-name "></span> <span class="text-muted d-block mb-2 user-address"></span> <br><br>
                <div class="d-flex justify-content-between align-items-center mt-4 px-4">
                    <div class="stats">
                        <h6 class="mb-0">Customer</h6> <span class="customer-count">0</span>
                    </div>
                    <div class="stats">
                        <h6 class="mb-0">Suit</h6> <span class="customer-suit">0</span>
                    </div>
                    <div class="stats">
                        <h6 class="mb-0">Earn</h6> <span class="customer-price">0</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>

    $saveImage = '{{URL::route('user.image')}}';
    $getUserData = '{{URL::route('user.data')}}';
    $token = "{{ csrf_token() }}";
    $(document).ready(function () {
        getUserData();
    });
        function getUserData() {
            $formData = {
                '_token': $token,
            };
            $.ajax({
                url: $getUserData,
                type: 'POST',
                data: $formData,
                success: function (response) {
                    if (response.success == true) {

                        $('.user-name').html(response.data.user.name);
                        $('.user-address').html(response.data.user.address);
                        $('.customer-count').html(response.data.count);
                        $('.customer-price').html(response.data.price);
                        $('.customer-suit').html(response.data.suit);
                        var imagePath = '{{asset('userimages')}}';
                        $('.append-image').attr('src', imagePath + '/' + response.data.user.image)

                    } else {
                        toastr.error('Something went wrong!');
                    }
                }
            })
        }

        // This is not use here.

        // $('#image').click(function(){
        //     $('#myfile').click()
        // })
        // --------------------------------------------------------------

        // This is not use here. It's use in user profile blade

        {{--$('#save-image').submit(function (e) {--}}
            {{--e.preventDefault();--}}
            {{--var formData = new FormData(this);--}}
            {{--$.ajax({--}}
                {{--url:$saveImage,--}}
                {{--type: 'POST',--}}
                {{--data:formData,--}}
                {{--contentType: false,--}}
                {{--processData: false,--}}
                {{--success:function (response) {--}}
                    {{--if (response.success == true) {--}}
                        {{--var imagePath = '{{asset('userimages')}}';--}}
                        {{--$('.append-image').attr('src', imagePath + '/' + response.data.image)--}}

                    {{--} else {--}}
                        {{--toastr.error('Something went wrong!');--}}
                    {{--}--}}

                {{--}--}}
            {{--})--}}
        {{--});--}}




</script>

