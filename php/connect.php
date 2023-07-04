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
    $j = "SELECT jurusan FROM user.all";
    $sql = "SELECT * FROM user.all WHERE nama = '$nama' AND nim = '$nim'";
    $result = $conn->query($sql);

    if (mysqli_num_rows($result) > 0){
        if($j == "TI"){
            echo "TI";
        }
    } else {
        echo "Login gagal";
    }

    $conn->close();
?>