<?php
    include("koneksi.php");

    if(empty($_POST["username"]) || empty($_POST["password"]))  
    {  
        echo '<script>alert("Username dan Password Tidak Boleh Kosong!")</script>';  
    }  
    else  
    {  
        $username = mysqli_real_escape_string($koneksi, $_POST["username"]);  
        $password = mysqli_real_escape_string($koneksi, $_POST["password"]);
        $level = mysqli_real_escape_string($koneksi, $_POST["level"]);

        $password = password_hash($password, PASSWORD_DEFAULT);  
        $query = mysqli_query($koneksi, "INSERT INTO user (username, password, level) VALUES('$username', '$password', '$level')");  
        
        if($query)  
        {  
            echo "<script>alert('Registrasi Berhasil');window.location='register2.php';</script>";
        }
        else
        {
            echo "<script>alert('Registrasi Gagal');window.location='register2.php';</script>";
        }  
    }  
