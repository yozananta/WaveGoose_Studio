<?php 
session_start();
if ($_SESSION['level'] == "") {
    $_SESSION['gagal-login'] = "Gagal Masuk Home";
    header("location:login.php");
    exit;
}


include "layout/header.php";




$id_studio = (int)$_GET['id_studio'];

if (delete_studio($id_studio) > 0) {
    echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            color: 'white',
            background: '#2D3035',
            text: 'Studio Berhasil Dihapus!',
        }).then(function(){
            document.location.href = 'studio.php';
        });
        </script>";
        }else
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            color: 'white',
            background: '#2D3035',
            text: 'Studio Gagal Dihapus!',
        }).then(function(){
            document.location.href = 'studio.php';
        });
        </script>";
?>