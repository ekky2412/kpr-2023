<?php
include "koneksi.php";

function sanitizeInput($data)
{
    $data = trim((string) $data);
    $data = stripslashes((string) $data);
    $data = htmlspecialchars((string) $data);
    return $data;
}


$nim = sanitizeInput($_POST['nim']);
$pass = sanitizeInput($_POST['pass']);
$sql = "SELECT * FROM user.all WHERE nim = '$nim' AND pass = '$pass'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();


if (mysqli_num_rows($result) > 0) {
    if ($row['STATUS'] == "AKTIF") {
        if ($row['JURUSAN'] == "TI") {
            session_start();
            $_SESSION['username'] = $nim;
            header('Location: ..\menu-ti\menu-ti.html');
        } else if ($row['JURUSAN'] == "DKV") {
            session_start();
            $_SESSION['username'] = $nim;
            header('Location: ..\menu-dkv\menu-dkv.html');
        } else if ($row['JURUSAN'] == "MJ") {
            session_start();
            $_SESSION['username'] = $nim;
            header('Location: ..\menu-mj\menu-mj.html');
        } else if ($row['JURUSAN'] == "SK") {
            session_start();
            $_SESSION['username'] = $nim;
            header('Location: ..\menu-sk\menu-sk.html');
        } else if ($row['JURUSAN'] == "AK") {
            session_start();
            $_SESSION['username'] = $nim;
            header('Location: ..\menu-ak\menu-ak.html');
        } else {
            echo "Login gagal";
        }
    } else if ($row['STATUS'] == "NON AKTIF") {
        echo "Mahasiswa Tidak Aktif";
    }
} else {
    echo "login gagal";
}

$conn->close();
?>