<?php
session_start();
$userid = $_SESSION['userid'];
include '../config/koneksi.php';
if ($_SESSION['status'] != 'login') {
    echo "<script>
    alert('Anda harus login!');
    location.href='../index.php';
    </script>";
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery Alica</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    
    <style>
      .navbar-brand {
        color: white; /* warna teks putih */
        font-family: 'Poppins', sans-serif; /* jenis font Poppins */
        font-weight: bold; /* tebal font */
      }
      .navbar {
        background-color: #000000; /* warna latar belakang #000000 */
      }
      </style>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="index.php">Gallery Alica </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse mt-2" id="navbarNavAltMarkup">
          <div class="navbar-nav me-auto">
          <a href="home.php" class="nav-link" style="color: white; font-family: 'Poppins', sans-serif; font-weight: bold;">Home</a>
          <a href="album.php" class="nav-link" style="color: white; font-family: 'Poppins', sans-serif; font-weight: bold;">Album</a>
          <a href="foto.php" class="nav-link" style="color: white; font-family: 'Poppins', sans-serif; font-weight: bold;">Foto</a>
          </div>
                <a href="../config/aksi_logout.php" class="btn btn-outline-danger m-1">Keluar</a>
            </div>
        </div>
    </nav>

    
    <div class="container mt-3">
        Album :
        <?php
$album = mysqli_query($koneksi, "SELECT * FROM album WHERE userid='$userid'");
while ($row = mysqli_fetch_array($album)) {?>
        <a href="home.php?albumid=<?php echo $row['albumid'] ?>" class="btn btn-outline m-1" style="background-color: #000000; color: #ffffff;">
            <?php echo $row['namaalbum'] ?></a>
        <?php }?>
        <div class="row">
            <?php
if (isset($_GET['albumid'])) {
    $albumid = $_GET['albumid'];
    $query = mysqli_query($koneksi, "SELECT * FROM foto WHERE userid='$userid' AND albumid='
                $albumid'");
    while ($data = mysqli_fetch_array($query)) {?>

<div class="col-md-3 mt-3">
    <a type="button" data-bs-toggle="modal" data-bs-target="#Komentar<?php echo $data['fotoid'] ?>">
        <div class="card">
        <img style="height: auto;  width:100%;" src="../assets/img/<?php echo $data['lokasifile'] ?>" class="card-img-top" title="<?php echo $data['judulfoto'] ?>">
            <div class="card-footer text-center">
                <?php
$fotoid = $data['fotoid'];
        $ceksuka = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid' AND userid='$userid'");
        if (mysqli_num_rows($ceksuka) == 1) {?>
                        
          
                            <i class="fa fa-heart"></i></a>
                        <?php } else {?>
                       
         
                            <i class="fa-regular fa-heart"></i></a>


                        <?php }
        $like = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid'");
        echo mysqli_num_rows($like) . ' suka';
        ?>

<type="button" data-bs-toggle="modal" data-bs-target="#Komentar<?php echo $data['fotoid'] ?>">
                    <i class="fa-regular fa-comment"></i>
                </type=>
                <?php
                $jmlkomen = mysqli_query($koneksi, "SELECT * FROM komentarfoto WHERE fotoid='$fotoid'");
                echo mysqli_num_rows($jmlkomen).' komentar';
                ?>
            </div>
                </div>

            </div>

            <?php }} else {

    $query = mysqli_query($koneksi, "SELECT * FROM foto WHERE userid='$userid'");
    while ($data = mysqli_fetch_array($query)) {
        ?>


           
<div class="col-md-3 mt-3">
    <a type="button" data-bs-toggle="modal" data-bs-target="#Komentar<?php echo $data['fotoid'] ?>">
        <div class="card">
        <img style="height: auto;  width:100%;" src="../assets/img/<?php echo $data['lokasifile'] ?>" class="card-img-top" title="<?php echo $data['judulfoto'] ?>">
            <div class="card-footer text-center">
            <?php
                $fotoid = $data['fotoid'];
                $ceksuka = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid' AND userid='$userid'");
                if (mysqli_num_rows($ceksuka) == 1) {?>
                    
                        <i class="fa fa-heart"></i>
                    </a>
                <?php } else {?>
                    
                        <i class="fa-regular fa-heart"></i>
                    </a>
                <?php }
                $like = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid'");
                echo mysqli_num_rows($like) . ' suka';
                ?>
                <type="button" data-bs-toggle="modal" data-bs-target="#Komentar<?php echo $data['fotoid'] ?>">
                    <i class="fa-regular fa-comment"></i>
                </a>
                <?php
                $jmlkomen = mysqli_query($koneksi, "SELECT * FROM komentarfoto WHERE fotoid='$fotoid'");
                echo mysqli_num_rows($jmlkomen).' komentar';
                ?>
            </div>
        </div>
    </a>

    <!-- Modal -->
    <div class="modal fade" id="Komentar<?php echo $data['fotoid'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">       
                <div class="row">
                    <div class="col-md-6">
                        <img src="../assets/img/<?php echo $data['lokasifile'] ?>" class="card-img-top" title="<?php echo $data['judulfoto'] ?>">
                    </div>
                    <div class="col-md-6">
                        <div class="m-2">
                            <div class="overflow-auto">
                                <div class="sticky-top">
                                    <strong><?php echo $data['judulfoto'] ?></strong><br>
                                  
                                    <span class="badge bg-secondary"><?php echo $data['tanggalunggah'] ?></span>
                                   
                                </div>
                               
                                <?php
                                $fotoid = $data['fotoid'];
                                $komentar = mysqli_query($koneksi,"SELECT * 
                                FROM komentarfoto INNER JOIN user ON komentarfoto.userid=
                                user.userid WHERE komentarfoto.fotoid='$fotoid'");
                                while($row = mysqli_fetch_array($komentar)){
                                ?>
                                <p align="left">
                                    <strong><?php echo $row['namalengkap'] ?></strong>
                                    <?php echo $row['isikomentar'] ?>

                                </p>

                                <?php } ?>
                                
                                <hr>
                                <!-- Closing </hr> tag is not needed -->
                                <div class="sticky-bottom">
                                <form action="../config/proses_komentar.php" method="POST">
        
     
    </form>
</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Comment Section -->
                <div class="mt-3">
                    <!-- You can display comments here using a loop or fetch from the database -->
                </div>
            </div>
        </div>
    </div>
</div>
       
    

            </div>

            <?php }}?>

        </div>
    </div>

    <footer class="d-flex justify-cont  ent-center border-top mt-3 bg-light fixed-bottom">
        
        </footer>
    
    
        <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
    
    </body>
    
    </html>