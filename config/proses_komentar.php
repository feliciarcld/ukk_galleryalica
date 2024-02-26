<?php
session_start();
include 'koneksi.php';

$fotoid = $_POST['fotoid'];
$userid = $_SESSION['userid']; // Corrected the typo: $SESSION to $_SESSION
$isikomentar = $_POST['isikomentar'];
$tanggalkomentar = date('Y-m-d'); // Corrected the typo: $date to date

$query = mysqli_query($koneksi, "INSERT INTO komentarfoto (fotoid, userid, isikomentar, tanggalkomentar) VALUES
('$fotoid','$userid','$isikomentar','$tanggalkomentar')");

if ($query) {
    echo "<script>
    alert('Komentar berhasil ditambahkan');
    location.href='../admin/index.php';
    </script>";
}
?>