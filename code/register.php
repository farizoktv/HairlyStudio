<?php
include"service/database.php";
session_start();

$register_message ="";

if(isset($_SESSION["is_login"]) == true){
    header("location: dashbord.php");
}

if (isset($_POST["register"])){
    $username =$_POST["username"];
    $password =$_POST["password"];
    

    
    $sql="INSERT INTO user (username,password) VALUES ('$username', '$password')";

    if($db->query($sql)){
        $register_message ="DAFTAR AKUN BERHASIL, SILAHKAN LOGIN";
    }else{
        $register_message ="DAFTAR AKUN GAGAL, SILAHKAN COBA LAGI!";
    }
    $db->close();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        h3 {
            text-align: center;
            color: #333;
        }
        i {
            display: block;
            text-align: center;
            color: green;
            margin-bottom: 10px;
        }
        form {
            width: 300px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <?php include "layout/header.html"?>
    <h3>DAFTAR</h3>
    <i> <?= $register_message?> </i>
    <form action="register.php" method="POST">
        <input type="text" placeholder="username" name="username"/>
        <input type="password" placeholder="password" name="password"/>
        <button type="submit" name="register">DAFTAR SEKARANG</button>
    </form>
    <?php include "layout/footer.html"?>
</body>
</html>
