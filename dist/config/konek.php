<?php
$servername = "localhost";
$database = "dashboa2_oee";
$username = "dashboa2_oee";
$password = "lW6P@55.ijJjR7";

// untuk tulisan bercetak tebal silakan sesuaikan dengan detail database Anda
// membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $database);
// mengecek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
// echo "Koneksi berhasil";
// mysqli_close($conn);
?>