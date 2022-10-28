<?php
session_start();

if( !isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

 require "functions.php";
 $squadpulang = Squad("SELECT * FROM anggota");
 if (isset($_POST["search"])) {
   $squadpulang = search($_POST["keyword"]);
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Squad Pulang Telat</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <h1>Daftar Anggota Squad Pulang Telat</h1>

    <a class="tambah" href="tambah.php"><h4>Tambah Data Anggota</h4></a>
    <a href="logout.php" class="logout"><h4>Logout</h4></a>
     <hr>
    <form action="" method="post">
        <input type="text" name="keyword" size="30" autofocus placeholder="Search Here..." autocomplete="off">
        <button type="submit" name="search">Search</button>
    </form>
    <br>
    <table border="1" cellspacing="0" cellpadding="10">
    <tr>
        <th>NO.</th>
        <th>Aksi</th>
        <th>Nama</th>
        <th>Tanggal Lahir</th>
        <th>Sekolah</th>
    </tr>
    <?php $id = 1; ?>
    <?php foreach ($squadpulang as $baris) : ?>
    <tr>
        <td class="color"><?php echo $id; ?></td>
        <td class="color">
            <a href="edit.php?id=<?php echo $baris["id"]; ?>">Edit</a> |
            <a href="hapus.php?id=<?php echo $baris["id"]; ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini?')">Delete</a>
        </td>
        <td class="color"><?php echo $baris["Nama"]; ?></td>
        <td class="color"><?php echo $baris["Lahir"]; ?></td>
        <td class="color"><?php echo $baris["Sekolah"]; ?></td>
    </tr>
    <?php $id++; ?>
    <?php endforeach; ?>
    </table>
    <br>
    </div>
</body>
</html>