<?php 
session_start();
if ($_SESSION['level'] == "") {
    $_SESSION['gagal-login'] = "Gagal Masuk Home";
    header("location:login.php");
    exit;
}


include "layout/header.php";




$id_user = (int)$_GET['id_user'];

if (delete_user($id_user) > 0) {
    echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            color: 'white',
            background: '#2D3035',
            text: 'User Berhasil Dihapus!',
        }).then(function(){
            document.location.href = 'user.php';
        });
        </script>";
        }else
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            color: 'white',
            background: '#2D3035',
            text: 'User Gagal Dihapus!',
        }).then(function(){
            document.location.href = 'user.php';
        });
        </script>";
?>