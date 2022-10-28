<?php 
session_start();

if( !isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require "functions.php";

$id = $_GET["id"];
$anggota = Squad("SELECT * FROM anggota WHERE id = $id") [0];

if ( isset($_POST["submit"]) ) {
    if(Edit($_POST) > 0 ) {
        echo "<script> 
        alert('Data Berhasil Ditambah!');
        document.location.href = 'halamanadmin.php';
        </script>";
    } else {
        echo "<script> 
        alert('Data Gagal Ditambah!');
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
    <title>Edit Data Anggota</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="container">
    <h1>Edit Data Anggota</h1>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo $anggota["id"]; ?>" >
      <ul>
        <li>
            <label for="nama">Nama : </label>
            <input type="text" name="nama" id="nama" required value="<?php echo $anggota["Nama"]; ?>">
        </li> 
        <br>
        <li>
            <label for="Lahir">Tanggal Lahir : </label>
            <input type="text" name="Lahir" id="Lahir" required value="<?php echo $anggota["Lahir"]; ?>">
        </li>
        <br>
        <li>
            <label for="Sekolah">Sekolah : </label>
            <input type="text" name="Sekolah" id="Sekolah" required value="<?php echo $anggota["Sekolah"]; ?>">
        </li>
        <br>
        <li>
            <button type="submit" name="submit">Edit</button>
        </li>
      </ul>
    </form>
    </div>
</body>
</html>