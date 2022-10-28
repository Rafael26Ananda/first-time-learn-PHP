<?php
session_start();

if(isset($_SESSION["login"])) {
    header("Location: halamanadmin.php");
    exit;
}

require "functions.php";

if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $ambil = mysqli_query($connectmysql,"SELECT * FROM users WHERE username = '$username'");

    if(mysqli_num_rows($ambil) === 1) {
        $isidata = mysqli_fetch_assoc($ambil);
        password_verify($password,$isidata["password"]);
        // session
        $_SESSION["login"] = true;
        // session
        // cookie (remember me)
        // I'II make the cookie later
        // Cookie (remember me)
        header("Location: halamanadmin.php");
        exit;
    }

    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="container">
    <h1>Log in</h1>
   <?php  if (isset($error)) : ?>
    <h3 style="color: red; font-style: italic; text-align: center;">Password/Username Anda Salah!</h5>
    <?php endif; ?>

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
            <button type="submit" name="login">Login!</button>
        </li>
     </ul>
    </form>
   </div>
</body>
</html>