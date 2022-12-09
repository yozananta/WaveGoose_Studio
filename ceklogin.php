<?php
session_start();

include "config/app.php";

$username = $_POST['username'];
$password = $_POST['password'];


$login = mysqli_query($koneksi, "SELECT * FROM t_user WHERE username = '$username' and password='$password'");

$cek = mysqli_num_rows($login);

if($cek > 0){

    $data = mysqli_fetch_assoc($login);

    if($data['level'] == "admin"){
        $_SESSION['user_id'] = $data['id_user'];
        $_SESSION['namanya'] = $data['nama'];
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "admin";
        header("location:dashboard.php");
    }else if ($data['level'] == "petugas"){
        $_SESSION['user_id'] = $data['id_user'];
        $_SESSION['namanya'] = $data['nama'];
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "petugas";
        header("location:index.php");
    }else if ($data['level'] == "customer"){
        $_SESSION['user_id'] = $data['id_user'];
        $_SESSION['namanya'] = $data['nama'];
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "customer";
        header("location:index.php");
    }else {
        $_SESSION['gagal'] ="";
        header("location:login.php");
    }

}else{
    $_SESSION['gagal'] ="";
    header("location:login.php");
}
?>