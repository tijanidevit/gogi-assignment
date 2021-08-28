<?php 
    session_start();
    if (isset($_SESSION['gogi_admin'])) {
        header('location: dashboard');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gogi - Admin</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="../assets/media/image/favicon.png" />

    <!-- Plugin styles -->
    <link rel="stylesheet" href="../vendors/bundle.css" type="text/css">

    <!-- App styles -->
    <link rel="stylesheet" href="../assets/css/app.min.css" type="text/css">
</head>

<body class="form-membership">

    <!-- in::preloader-->
    <div class="preloader">
        <div class="preloader-icon"></div>
    </div>
    <!-- end::preloader -->
    <style>
        .login-row {
            border-radius: 0.5rem;
            box-shadow: 0 3px 10px rgba(62, 85, 120, 0.045);
        }

        .login-row>div {
            padding: 3rem;
            height: 100%;
        }

        .login-img {
            height: 100%;
        }

        .login-row-container {
            width: 70%;
            margin: auto;
        }
    </style>
    <div class="justify-content-center d-flex align-items-center login-row-container mt-5">
        <div class="row login-row">
            <div class="col-md-6 p-0" style="height: inherit;">
                <div class="form-wrapper">

                    <div class="container">
                        <!-- logo -->
                        <div id="logo">
                            <img src="../assets/media/image/dark-logo.png" alt="image">
                        </div>
                        <!-- ../ logo -->


                        <h5>Sign in</h5>

                        <!-- form -->
                        <form id="loginForm" method="post">
                            <div id="result"></div>
                            <div class="form-group">
                                <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                            </div>
                            <div class="form-group d-flex justify-content-between">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" checked="" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">Remember me</label>
                                </div>
                                <a href="#">Reset password</a>
                            </div>

                            <button class="btn btn-primary btn-block" type="submit">
                                <span class="spinner" id="spinner" style="display: none;">
                                    <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                    <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                    <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                </span>
                                <span class="btnText">
                                    Login
                                </span>
                            </button>

                        </form>
                        <!-- ../ form -->

                    </div>

                </div>
            </div>
            <div class="col-md-6 p-0 bg-primary d-none d-sm-none d-md-block" style="height: inherit;">
                <div class="login-img bg-secondary  d-flex justify-content-center align-items-center">
                    <img src="../assets/media/image/auth-image.png" alt="">
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>

    <!-- Plugin scripts -->
    <script src="../vendors/bundle.js"></script>

    <!-- App scripts -->
    <script src="../assets/js/app.min.js"></script>
</body>

</html>

<script>
    $('#loginForm').submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'ajax/login.php',
            type: 'POST',
            data : $(this).serialize(),
            cache: false,
            beforeSend: function() {
                $('#spinner').show();
                $('#result').hide();
            },
            success: function(data){
                if (data == 1) {
                    location.href = 'dashboard';
                }
                else{
                    $('#result').html(data);
                    $('#result').fadeIn();
                    $('#spinner').hide();
                }
            }
        })
    })
</script>
