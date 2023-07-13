<?php
    //Database connection
    $conn = new mysqli('localhost', 'root', 'restuandramysql012321==','user');
    if($conn->connect_error){
        die('Connection failed : '.$conn->connect_error);
    }

    function sanitizeInput($data){
        $data = trim((string) $data);
        $data = stripslashes((string) $data);
        $data = htmlspecialchars((string) $data);
        return $data;
    }

    $nama = sanitizeInput($_POST['nama']);
    $nim = sanitizeInput($_POST['nim']);
    $sql = "SELECT * FROM user.all WHERE nama = '$nama' AND nim = '$nim'";
    $result = $conn->query($sql);
    $row = $result -> fetch_assoc();


    if (mysqli_num_rows($result) > 0){
        if ($row['STATUS'] == "AKTIF"){
            if ($row['JURUSAN'] == "TI"){
                header('Location: ..\menu.html');
            } else if ($row['JURUSAN'] == "DKV"){
                header('Location: ..\menu-dkv.html');
            } else if ($row['JURUSAN'] == "MJ"){
                header('Location: ..\menu-mj.html');
            } else if ($row['JURUSAN'] == "SK"){
                header('Location: ..\menu-sk.html');
            } else if ($row['JURUSAN'] == "AK"){
                header('Location: ..\menu-ak.html');
            } else {
                echo "Login gagal";
            }
        } else if ($row['STATUS'] == "NON AKTIF"){
            echo "Mahasiswa Tidak Aktif";
        }
    }

    $conn->close();
?>