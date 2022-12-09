<?php 
session_start();
if($_SESSION['level']==""){
    $_SESSION['gagal-login'] = "Gagal Masuk Dashboard";
    header("location:login.php");
exit;
}
if ($_SESSION['level'] == "customer") {
include "layout/header.php";

$tampil = $_SESSION['user_id'];
$data_persewaan = select("SELECT * FROM t_sewa
                       INNER JOIN t_alat ON t_sewa.id_alat = t_alat.id_alat                       
                       INNER JOIN t_user ON t_sewa.id_user = t_user.id_user WHERE t_user.id_user = $tampil                 
                       ORDER BY id_sewa ASC");

$data_sewastudio = select("SELECT * FROM t_sewastudio
                       INNER JOIN t_studio ON t_sewastudio.id_studio = t_studio.id_studio   
                       INNER JOIN t_user ON t_sewastudio.id_user = t_user.id_user WHERE t_user.id_user = $tampil                  
                       ORDER BY id_pesan ASC");


              
 ?>


<div class="page-content">
    <div class="bg-dash-dark-2 py-4">
        <div class="container-fluid">
            <h2 class="h5 mb-0">History Pemesanan</h2>
        </div>
    </div>
    <div class="container-fluid mt-4">
        <div class="card text-center">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="true" href="?card=historyalat">Histori Sewa Alat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?card=historystudio">Histori Sewa Studio</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <?php  
    if (isset($_GET['card']))
         include('cardcontent/'.$_GET['card'].'.php');
    elseif (isset($_GET['card'])) 
        include('cardcontent/'.$_GET['card'].'.php');
    
    ?>

    <?php 
include "layout/footer.php";
 ?>

    <?php  }
else {
    header("location:index.php");
} ?>