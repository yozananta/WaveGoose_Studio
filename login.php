<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="loginstyle/fonts/icomoon/style.css">
    <link rel="stylesheet" href="loginstyle/css/owl.carousel.min.css">
    <link rel="stylesheet" href="loginstyle/css/bootstrap.min.css">
    <link rel="stylesheet" href="loginstyle/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Login Page</title>
    <style>
    .bg-custom {
        background-color: #22252A;
    }
 
    .zoom-in-out-box {
  animation: zoom-in-zoom-out 1s ease infinite;
  margin-top: -45px;
}

@keyframes zoom-in-zoom-out {
  0% {
    transform: scale(1, 1);
  }
  50% {
    transform: scale(1.05, 1.05);
  }
  100% {
    transform: scale(1, 1);
  }
}

    </style>
</head>

<body class="bg-custom text-white">

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="brand-text brand-big"><strong class="text-danger">WVGS -</strong>
                        <strong>Studio</strong>
                    </div>
                    <img src="loginstyle/images/loginicon.png" alt="Image" class="img-fluid zoom-in-out-box">
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <form action="ceklogin.php" method="post">
                                    <h3>Login</h3>
                                    <p class="mb-4 text-muted"><small>Silahkan Masukkan Username dan Password!!</small>
                                    </p>
                                    <?php
                                    session_start();
                                    if(isset($_SESSION['gagal'])){
                                    ?>
                                    <div class="alert bg-danger text-white text-center">
                                        <small>Username/Password Salah!</small>
                                    </div>
                                    <?php
                                        session_destroy();
                                      }
                                    
                                    if(isset($_SESSION['gagal-login'])){?>
                                    <script>
                                    Swal.fire({
                                        icon: 'warning',
                                        title: '<?= $_SESSION['gagal-login']?>',
                                        text: 'Login Dulu Yaa..!',
                                        color: 'white',
                                        background: '#2D3035',
                                    }).then(function() {
                                        document.location.href = 'login.php';
                                    });
                                    </script>
                                    <?php  session_destroy();
                                    }
                            ?>

                            </div>

                            <div class="form-group first mb-2">
                                <label for="username" class="text-dark">Username</label>
                                <input type="text" class="form-control" name="username" id="username">

                            </div>
                            <div class="form-group last mb-4">
                                <label for="password" class="text-dark">Password</label>
                                <input type="password" class="form-control" name="password" id="password">

                            </div>

                            <div class="d-flex mb-3 align-items-center">
                                <span class="ml-auto"><a href="register.php" class="forgot-pass">Register</a></span>
                            </div>

                            <input type="submit" value="Log In" name="login " class="btn btn-block btn-primary">


                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>


    <script src="loginstyle/js/jquery-3.3.1.min.js"></script>
    <script src="loginstyle/js/popper.min.js"></script>
    <script src="loginstyle/js/bootstrap.min.js"></script>
    <script src="loginstyle/js/main.js"></script>
</body>

</html>