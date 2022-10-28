<?php
// koneksi ke database(saya menggunakan mysql)
 $connectmysql = mysqli_connect("localhost","root","","squadpulangtelat");
 $hasil = mysqli_query($connectmysql,"SELECT * FROM Anggota");
// while ($spt = mysqli_fetch_assoc($hasil) ) {
// var_dump($spt);
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Squad Pulang Telat</title>
</head>
<body>
    <h1>Daftar Anggota Squad Pulang Telat</h1>

    <table border="1" cellspacing="0" cellpadding="10">
    <tr>
        <th>NO.</th>
        <th>Aksi</th>
        <th>Nama</th>
        <th>Tanggal Lahir</th>
        <th>sekolah</th>
    </tr>
    <?php $id = 1; ?>
    <?php while ($baris = $spt = mysqli_fetch_assoc($hasil)) : ?>
    <tr>
        <td><?php echo $baris["id"]; ?></td>
        <td>
            <a href="">Edit</a> |
            <a href="">Delete</a>
        </td>
        <td><?php echo $baris["Nama"]; ?></td>
        <td><?php echo $baris["Tanggal Lahir"]; ?></td>
        <td><?php echo $baris["Sekolah"]; ?></td>
    </tr>
    <?php $id++; ?>
    <?php endwhile; ?>
    </table>
</body>
</html>