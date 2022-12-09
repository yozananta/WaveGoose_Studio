<?php 
session_start();
if ($_SESSION['level'] == "") {
    $_SESSION['gagal-login'] = "Gagal Masuk Home";
    header("location:login.php");
    exit;
}


include "layout/header.php";




$id_alat = (int)$_GET['id_alat'];

if (delete_alat($id_alat) > 0) {
    echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            color: 'white',
            background: '#2D3035',
            text: 'Alat Berhasil Dihapus!',
        }).then(function(){
            document.location.href = 'alat.php';
        });
        </script>";
        }else
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            color: 'white',
            background: '#2D3035',
            text: 'Alat Gagal Dihapus!',
        }).then(function(){
            document.location.href = 'alat.php';
        });
        </script>";
?>