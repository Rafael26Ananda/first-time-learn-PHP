<?php 
$connectmysql = mysqli_connect("localhost","root","","squadpulangtelat");
function Squad($squad) {
    global $connectmysql;
    $hasil = mysqli_query($connectmysql,$squad);
    $baris2 = [];
    while($baris = mysqli_fetch_assoc($hasil)) {
        $baris2[] = $baris;
    }
    return $baris2;
}

function tambah($data) {
    global $connectmysql;
    $Nama = htmlspecialchars ($data["nama"]);
    $Lahir = htmlspecialchars ($data["Lahir"]);
    $Sekolah = htmlspecialchars ($data["Sekolah"]);

    $insert = "INSERT INTO anggota
           VALUES
           ('','$Nama','$Tanggal','$Sekolah')";
mysqli_query($connectmysql,$insert);

return mysqli_affected_rows($connectmysql);
}

function hapus($id) {
global $connectmysql;
mysqli_query($connectmysql,"DELETE FROM anggota WHERE id = $id");
return mysqli_affected_rows($connectmysql);
}

function Edit($data) {
    global $connectmysql;
    $id = $data["id"];
    $Nama = htmlspecialchars ($data["nama"]);
    $Lahir = htmlspecialchars ($data["Lahir"]);
    $Sekolah = htmlspecialchars ($data["Sekolah"]);

    $insert = "UPDATE anggota SET
                nama ='$Nama',
                Lahir ='$Lahir',
                Sekolah ='$Sekolah'
                WHERE id = $id
                ";  
mysqli_query($connectmysql,$insert);
return mysqli_affected_rows($connectmysql);  
};

function search($keyword) {
    $baris ="SELECT * FROM anggota
            WHERE
            nama LIKE '%$keyword%' OR
            Lahir LIKE '%$keyword%' OR
            Sekolah LIKE '%$keyword%' 
            ";
    
    return Squad($baris);
}

function buat($data) {
    global $connectmysql;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($connectmysql,$data["password"]);
    $password2 = mysqli_real_escape_string($connectmysql,$data["password2"]);

    $hasil = mysqli_query($connectmysql,"SELECT username FROM users WHERE username = '$username'");
    if(mysqli_fetch_assoc($hasil)) {
        echo "<script> 
              alert ('ussername sudah digunakan!');
             </script>";

             return false;
    }
    


    if ( $password !== $password2 ) {
        echo "<script>
              alert('Konfirmasi password anda tidak sesuai!');
             </script>";
        
        return false;
    }
     $password = password_hash($password,PASSWORD_DEFAULT);
     
    mysqli_query($connectmysql,"INSERT INTO USERS VALUES('','$username','$$password')");
    
    return mysqli_affected_rows($connectmysql);
}




?>