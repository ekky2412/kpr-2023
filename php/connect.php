<?php
    //Database connection
    $conn = new mysqli('localhost', 'root', 'restuandramysql012321==','user');
    if($conn->connect_error){
        die('Connection failed : '.$conn->connect_error);
    }
    //Sanitize input
    function sanitizeInput($data){
        $data = trim((string) $data);
        $data = stripslashes((string) $data);
        $data = htmlspecialchars((string) $data);
        return $data;
    }
    
    //Generate password 
    function generateRandomPassword($length = 4){
        $characters = '0123456789';
        $password = '';
        $characterCount = strlen($characters) -1;

        for ($i = 0; $i < $length; $i++){
            $password .= $characters[rand(0, $characterCount)]; 
        }

        return $password;
    }

    $nim = sanitizeInput($_POST['nim']);
    $password = sanitizeInput($_POST['pass']);
    $sql = "SELECT * FROM user.all WHERE nim = '$nim'";
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
        } else {
            $randomPassword = generateRandomPassword();

            $insertSql = "INSERT INTO user.all (pass) VALUES ('$randomPassword')";
            if ($conn->query($insertSql) === TRUE){
                echo "Generated password: $randomPassword";
            }
        }
    }

    $conn->close();
?>