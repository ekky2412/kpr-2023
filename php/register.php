<?php

include "koneksi.php";

function generatedPassword($length=4){
    $characters = '0123456789';
    $password = '';
    $characterCount = strlen($characters) -1;

    for ($i = 0; $i < $length; $i++){
        $password .= $characters[rand(0, $characterCount)]; 
    }

    return $password;
}

    $nim = $_POST['nim'];
    $generated_password = generatedPassword();
    $sql = "UPDATE user.all SET PASS = $generated_password WHERE nim = $nim";
    $result = $conn->query($sql);

    //echo "<script type='text/javascript'>alert('Password anda adalah', $generated_password')</script>";
    //echo "";

    //echo $result;
    echo $generated_password;

    $conn->close();
?>