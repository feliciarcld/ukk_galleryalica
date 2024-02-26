<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gallery Alica</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .navbar-brand {
      color: white;
      font-family: 'Poppins', sans-serif;
      font-weight: bold;
    }
    .navbar {
      background-color: #000000;
    }
    body {
      background-image: url('assets/img/Background.jpeg'); /* Ganti dengan path menuju gambar latar belakang Anda */
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;
      color: #000000;
    }
    .jumbotron {
      background-color: rgba(0, 0, 0, 0.5);
      padding: 100px 0;
      text-align: center;
    }
    .jumbotron h1 {
      font-weight: bold;
      font-size: 48px;
    }
    .jumbotron p {
      font-size: 24px;
    }
    .btn-primary, .btn-success {
      background-color: #007bff;
      border-color: #007bff;
    }
    .btn-primary:hover, .btn-success:hover {
      background-color: #0056b3;
      border-color: #0056b3;
    }
    .footer {
      background-color: #000000;
      color: white;
      padding: 10px 0;
      text-align: center;
      position: fixed;
      bottom: 0;
      width: 100%;
    }
  </style>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="assets/img/logo.jpeg" alt="Logo" style="width: 50px; height: 50px; margin-right: 10px;">
        Gallery Alica
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
         
          <li class="nav-item">
          <a href="register.php" class="btn btn-outline-primary m-1">Daftar</a>
          </li>
          <li class="nav-item">
          <a href="login.php" class="btn btn-outline-success m-1">Masuk</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
  <div class="card text-center border-0"> <!-- Menambahkan kelas border-0 untuk menghilangkan border -->
    <div class="card-body">
      <h1 class="card-title">Selamat Datang di Gallery Alica</h1>
      <p class="card-text lead"></p>
    </div>
  </div>
</div>





  <footer class="footer">
    <div class="container">
      <p>&copy; UKK RPL 2024 | Felicia BR</p>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
