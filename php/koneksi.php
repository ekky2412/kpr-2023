<?php
//Database connection
$conn = new mysqli('localhost', 'root', 'restuandramysql012321==', 'user');
if ($conn->connect_error) {
    die('Koneksi gagal : ' . $conn->connect_error);
}
?>