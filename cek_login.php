<?php
    session_start(); 
    include "koneksi.php";

    if(empty($_POST["username"]) || empty($_POST["password"]))  
    {            
        echo '<script>alert("Username dan Password Tidak Boleh Kosong!")</script>';  
    }  
    else  
    {  
        $username = mysqli_real_escape_string($koneksi, $_POST["username"]);  
        $password = mysqli_real_escape_string($koneksi, $_POST["password"]); 

        $query = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");  
        $result = mysqli_fetch_assoc($query);      
        
        if(password_verify($password, $result["password"]))  
        {   
            if($result['level']=="admin")
            {
                $_SESSION['username'] = $username;
                $_SESSION['level'] = "admin";
                echo "<script>alert('Login Berhasil');window.location='index_admin.php';</script>";
            }
            else if($result['level']=="user")
            {
                $_SESSION['username'] = $username;
                $_SESSION['level'] = "user";
                echo "<script>alert('Login Berhasil');window.location='index_user.php';</script>";
            }
            else
            {
                echo "<script>alert('Username Salah');window.location='login.php';</script>";
            }
        }
        else
        {
            echo "<script>alert('Password Salah');window.location='login.php';</script>";  
        } 
    }  
