<?php 
session_start();
if ($_SESSION['level'] == "") {
    $_SESSION['gagal-login'] = "Gagal Masuk Home";
    header("location:login.php");
    exit;
}


include "layout/header.php";




$id_sewa = (int)$_GET['id_sewa'];

if (delete_persewaan($id_sewa) > 0) {
    echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            color: 'white',
            background: '#2D3035',
            text: 'Data Sewa Berhasil Dihapus!',
        }).then(function(){
            document.location.href = 'persewaan.php';
        });
        </script>";
        }else
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            color: 'white',
            background: '#2D3035',
            text: 'Data Sewa Gagal Dihapus!',
        }).then(function(){
            document.location.href = 'persewaan.php';
        });
        </script>";
?>