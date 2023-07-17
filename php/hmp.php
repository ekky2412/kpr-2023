<?php
// Panggil session_start() setiap kali buka php baru
session_start();

// Panggil session dengan $_SESSION['nama session']
$nim = $_SESSION['nim'];

$sql = "UPDATE user.all SET user.hmp = '' WHERE nim = '$nim'";
$result = $conn->query($sql);
?>