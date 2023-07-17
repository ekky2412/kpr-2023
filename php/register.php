<?php

include "koneksi.php";



function generatedPassword($length = 5)
{
    $characters = '0123456789';
    $password = '';
    $characterCount = strlen($characters) - 1;

    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[rand(0, $characterCount)];
    }

    return $password;
}

$nim = $_POST['nim'];
$generated_password = generatedPassword();
$sql = "UPDATE user.all SET PASS = $generated_password WHERE nim = $nim";
$result = $conn->query($sql);

//echo $generated_password;
echo '<script>alert("Password anda adalah ' . $generated_password . '")
window.location = "../login.html"</script>';

$conn->close();

?>