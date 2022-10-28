<?php
require "functions.php";

if (isset($_POST["buat"])) {
    if (Buat($_POST) > 0) {
        echo "<script> 
             alert ('Akun Berhasil Dibuat!');
              </script>";
    } else {
        mysqli_error($connectmysql);
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="stylesheet" href="style3.css">
</head>
<body>
<div class="container">
    <h1>Registrasi Akun</h1>
    <form action="" method="post">
      <ul>
        <li>
            <label for="username">username :</label>
            <input type="text" name="username" id="username" required autocomplete="off">
        </li>
        <br>
        <li>
            <label for="password">password :</label>
            <input type="password" name="password" id="password" required autocomplete="off">
        </li>
        <br>
        <li>
            <label for="password2">Mohon Konfirmasi Password Anda:</label>
            <input type="password" name="password2" id="password2" required autocomplete="off">
        </li>
        </li>
        <br>
        <li>
            <button type="submit" name="buat">Buat Akun!</button>
        </li>
      </ul>
    </form>
    </div>
</body>
</html>