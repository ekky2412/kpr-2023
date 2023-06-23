<?php
    //Database connection
    $conn = new mysqli('localhost', 'root', 'restuandramysql012321==','user');
    if($conn->connect_error){
        die('Connection failed : '.$conn->connect_error);
    }

    function sanitizeInput($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $nama = sanitizeInput($_POST['nama']);
    $nim = sanitizeInput($_POST['nim']);
    $sql = "SELECT * FROM ak WHERE nama = '$nama' AND nim = '$nim' ";
    $result = $conn->query($sql);

    if (mysqli_num_rows($result) > 0){
        header('Location: ../menu.html');
    } else {
        echo "Login gagal";
    }

    $conn->close();
?>