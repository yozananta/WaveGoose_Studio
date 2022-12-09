<?php 
include "config/app.php";

$data_user = select("SELECT * FROM t_user");




if (isset($_POST['tambah'])) {
  if (create_user($_POST) > 0) {
    echo "<script>
        alert('Akun Berhasil Dibuat')
        document.location.href = 'login.php';
    </script>";
} else
    echo "<script>
    alert('Akun Gagal Dibuat')
        document.location.href = 'register.php';
    </script>";
}
?>

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
    <title>Register Page</title>
    <style>
      .bg-custom{
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
        <div class="brand-text brand-big"><strong class="text-danger">WVGS -</strong> <strong>Studio</strong></div>
          <img src="loginstyle/images/loginicon.png" alt="Image" class="img-fluid zoom-in-out-box">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3>Register</h3>
              <p class="mb-4 text-muted"><small>Silahkan Daftarkan Username dan Password!!</small></p>
            </div>
            <form action="" method="post">
              <div class="form-group first mb-2">
                <label for="username" class="text-dark">Nama</label>
                <input type="text" class="form-control" name="nama" id="nama">

              </div>
              <div class="form-group first mb-2">
                <label for="username" class="text-dark">Username</label>
                <input type="text" class="form-control" name="username" id="username">

              </div>
              
              <div class="form-group last mb-4">
                <label for="password" class="text-dark">Password</label>
                <input type="password" class="form-control" name="password" id="password">
              </div>

                <input type="hidden" class="form-control" name="level" id="level" value="customer ">
              
             
             
              
              
              
              <div class="d-flex mb-3 align-items-center">
                <span class="ml-auto"><a href="login.php" class="forgot-pass">Sign In</a></span> 
              </div>

              <button type="submit" name="tambah" value="Register" class="btn btn-block btn-success">Register</button>
              

              
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