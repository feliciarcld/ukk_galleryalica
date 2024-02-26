<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gallery Alica</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <style>
      .navbar-brand {
        color: white; /* warna teks putih */
        font-family: 'Montserrat', sans-serif; /* jenis font Montserrat */
        font-weight: bold; /* tebal font */
      }
      .navbar {
        background-color: #000000; /* warna latar belakang #000000 */
      }
      body {
      background-image: url('assets/img/Background.jpeg'); /* Ganti dengan path menuju gambar latar belakang Anda */
      background-size: 100%; /* Menyesuaikan ukuran gambar dengan ukuran halaman */
      background-repeat: no-repeat; /* Menghindari pengulangan gambar */
      background-attachment: fixed;
      }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="index.php">
        <img src="assets/img/logo.jpeg" alt="Logo" style="width: 50px; height: 50px; margin-left: 10px; margin-right: 10px;">
        Gallery Alica
      </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse mt-2" id="navbarNavAltMarkup">
          <div class="navbar-nav me-auto">
            
          </div>
          <a href="register.php" class="btn btn-outline-primary m-1">Daftar</a>
          <a href="login.php" class="btn btn-outline-success m-1">Masuk</a>
        </div>
      </div>
    </nav>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body bg-light">
                        <div class="text-center">
                            <h5>Daftar Akun Baru <span class="pixel-admire"></span></h5>
                        </div>
                        <form action="config/aksi_register.php" method="POST" style="color: #000000;">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" required>
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required>
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="namalengkap" class="form-control" required>
                            <label class="form-label">Alamat</label>
                            <input type="text" name="alamat" class="form-control" required>
                            <div class="d-grid mt-2">
                            <button class="btn" style="background-color: #000000; border-color: #000000; color: white;" type="submit" name="kirim">DAFTAR</button>
                            </div>
                        </form>
                        <hr>
                        <p>Sudah punya akun? <a href="login.php" style="color: #000000;">Login di sini!</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="d-flex justify-content-center border-top mt-3 fixed-bottom" style="background-color: #000000;">
      <p style="color: white;">&copy; UKK RPL 2024 | Felicia BR</p>
    </footer>

    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
