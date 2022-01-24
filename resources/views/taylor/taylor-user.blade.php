<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title > User Page </title>
    <style>
        Body {
            font-family: Calibri, Helvetica, sans-serif;
            background-color: Teal;
        }
        button {
            background-color: Teal;
            width: 30%;
            color: orange;
            padding: 15px;
            margin: 10px 0px;
            margin-left: 35%;
            border: none;
            cursor: pointer;
        }
        form {
            /*border: 3px solid #f1f1f1;*/
            margin-left: 30%;
        }
        input[type=text], input[type=password] {
            width: 100%;
            alignment-baseline: center;
            margin: 8px 0;
            padding: 12px 20px;
            display: inline-block;
            border: 2px solid green;
            box-sizing: border-box;
        }
        button:hover {
            opacity: 0.7;
        }
        .cancelbtn {
            width: auto;
            padding: 10px 18px;
            margin: 10px 5px;
        }


        .container {
            width: 30%;
            margin-left: 33%;
            padding: 25px;
            background-color: Silver;
        }
    </style>
</head>
<body>
<center> <h1 style="color: white">Hi </h1> </center>

<div class="container">
    <label>Contact : </label>
    <input type="text" placeholder="Enter Contact" name="contact" id="contact" required><br>
    <label>Password : </label>
    <input type="password" placeholder="Enter Password" name="password" id="password" required><br>
    <button type="submit" id="login-user" style="color: white">Login</button><br>
    <input type="checkbox" checked="checked"> Remember me
    <button type="button" class="cancelbtn" style="color: white"> Cancel</button>
    Forgot <a href="#"> password? </a>
</div>

</body>
</html>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

    $loginUser = '{{URL::route('login.user')}}';
    $token = "{{ csrf_token() }}";
    $(document).ready(function () {
        getCustomers();
    });

    $('body').on('click', '#login-user', function () {
        $formData = {
            '_token': $token,
            contact: $('#contact').val(),
            password: $('#password').val(),

        };

        $.ajax({
            url: $loginUser,
            type: 'POST',
            data: $formData,
            success: function (response) {
                if (response.success == true) {

                    $('#contact').val(''),
                        $('#password').val('')

                } else {
                    toastr.error('Something went wrong!');
                }
            }
        });

    });
</script>