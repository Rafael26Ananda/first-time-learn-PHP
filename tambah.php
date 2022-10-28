<?php 
session_start();

if( !isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require "functions.php";
if ( isset($_POST["submit"]) ) {
    if(tambah($_POST) > 0 ) {
        echo "<script> 
        alert('Data Berhasil Ditambahkan');
        document.location.href = 'halamanadmin.php';
        </script>";
    } else {
        echo "<script> 
        alert('Data Gagal Ditambahkan');
        document.location.href = 'halamanadmin.php';
        </script>";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Anggota</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="container">
    <h1>Tambah Data Anggota</h1>
    <form action="" method="post">
      <ul>
        <li>
            <label for="nama">Nama : </label>
            <input type="text" name="nama" id="nama" required autocomplete="off">
        </li>
        <br>
        <li>
            <label for="Lahir">Tanggal Lahir : </label>
            <input type="text" name="Lahir" id="Lahir" required autocomplete="off">
        </li>
        <br>
        <li>
            <label for="Sekolah">Sekolah : </label>
            <input type="text" name="Sekolah" id="Sekolah" required autocomplete="off">
        </li>
        <br>
        <li>
            <button type="submit" name="submit">Tambah</button>
        </li>
      </ul>
    </form>
    </div>
</body>
</html>