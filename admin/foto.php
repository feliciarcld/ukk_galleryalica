<?php
session_start();
include '../config/koneksi.php';
if ($_SESSION['status'] != 'login') {
    echo "<script>
    alert('Anda belum Login!')
    location.href='../index.php';
    </script>";
}

$userid = $_SESSION['userid'];

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gallery Alica</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
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
        <a class="navbar-brand" href="index.php">Gallery Alica</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse mt-2" id="navbarNavAltMarkup">
          <div class="navbar-nav me-auto">
          <a href="home.php" class="nav-link" style="color: white; font-family: 'Poppins', sans-serif; font-weight: bold;">Home</a>
          <a href="album.php" class="nav-link" style="color: white; font-family: 'Poppins', sans-serif; font-weight: bold;">Album</a>
          <a href="foto.php" class="nav-link" style="color: white; font-family: 'Popins', sans-serif; font-weight: bold;">Foto</a>
          </div>
          <a href="../config/aksi_logout.php" class="btn btn-outline-danger m-1">Keluar</a>
        </div>
      </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card mt-2">
                    <div class="card-header">Tambah Foto</div>
                    <div class="card-body">
                        <form action="../config/aksi_foto.php" method="POST" enctype="multipart/form-data">
                            <label class="form-label">Judul Foto</label>
                            <input type="text" name="judulfoto" class="form-control" required>
                            <label class="form-label">Deskripsi</label>
                            <textarea class="form-control" name="deskripsifoto" required></textarea>
                            <label class="form-label">Album</label>
                            <select class="form-control" name="albumid" required>
                                <?php
                                $sql_album = mysqli_query($koneksi, "SELECT * FROM album WHERE userid='$userid'");
                                while($data_album = mysqli_fetch_array($sql_album)){ ?>
                                    <option value="<?php echo $data_album['albumid'] ?>"><?php echo $data_album['namaalbum'] ?></option>
                                <?php } ?>
                            </select>
                            <label class="form-label">File</label>
                            <input type="file" class="form-control" name="lokasifile" required>
                            <button class="btn mt-2" style="background-color: #000000; border-color: #000000; color: white;" type="submit" name="tambah">+</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card mt-2">
                    <div class="card-header">Data Foto</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>Judul Foto</th>
                                    <th>Deskripsi</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $userid = $_SESSION['userid'];
                                $sql = mysqli_query($koneksi, "SELECT * FROM foto WHERE userid='$userid'");
                                while($data = mysqli_fetch_array($sql)){
                                ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><img src="../assets/img/<?php echo $data['lokasifile']?>" width="100"></td>
                                    <td><?php echo $data['judulfoto'] ?></td>
                                    <td><?php echo $data['deskripsifoto'] ?></td>
                                    <td><?php echo $data['tanggalunggah'] ?></td>
                                    <td>
                                    <button class="btn" style="background-color: #000000; border-color: #000000; color: white;" data-bs-toggle="modal" data-bs-target="#edit_<?php echo $data['fotoid'] ?>">Edit</button>

                                    <div class="modal fade" id="edit_<?php echo $data['fotoid'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="../config/aksi_foto.php" method="POST" enctype="multipart/form-data">
                                                    <input type="hidden" name="fotoid" value="<?php echo $data['fotoid']?>">
                                                    <label class="form-label">Judul Foto</label>
                                                    <input type="text" name="judulfoto" value="<?php echo $data['judulfoto']?>" class="form-control" required>
                                                    <label class="form-label">Deskripsi Foto</label>
                                                    <textarea class="form-control" name="deskripsifoto" style="text-align: left;" required><?php echo $data['deskripsifoto']; ?></textarea>
                                                    <label class="form-label">Album</label>
                                                    <select class="form-control" name="albumid">
                                                        <?php
                                                        $sql_album = mysqli_query($koneksi, "SELECT * FROM album  WHERE userid='$userid'");
                                                        while($data_album = mysqli_fetch_array($sql_album)){ ?>
                                                            <option <?php if($data_album['albumid'] == $data['albumid']) { ?> selected="selected" <?php } ?> value="<?php echo $data_album['albumid'] ?>"><?php echo $data_album['namaalbum'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <label class="form-label">Foto</label>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <img src="../assets/img/<?php echo $data['lokasifile']?>" width="100">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <label class="form-label">Ganti File</label>
                                                            <input type="file" class="form-control" name="lokasifile">
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn" style="background-color: #000000; border-color: #000000; color: white;" type="submit" name="edit" class="btn btn-primary">Edit Data</button>
                                                </form>
                                            </div>
                                            </div>
                                        </div>
                                        </div>

                                        <button class="btn" style="background-color: #000000; border-color: #000000; color: white;" data-bs-toggle="modal" data-bs-target="#hapus_<?php echo $data['fotoid'] ?>">Hapus</button>

                                        <div class="modal fade" id="hapus_<?php echo $data['fotoid'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="../config/aksi_foto.php" method="POST">
                                                        <input type="hidden" name="fotoid" value="<?php echo $data['fotoid']?>">
                                                        Apakah anda yakin ingin menghapus data ini <strong><?php echo $data['judulfoto']?></strong> ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button style="background-color: #000000; border-color: #000000; color: white;" type="submit" name="hapus" class="btn btn-primary">Hapus Data</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
   
    <footer class="d-flex justify-cont  ent-center border-top mt-3 bg-light fixed-bottom">
        
        </footer>
    
    
        <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
    
    </body>
    
    </html>