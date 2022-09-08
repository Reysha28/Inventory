<?php
  include('koneksi.php'); 
  
?>

<html>
<head>
    <title>CRUD INVENTORY</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
    body
    {
        font-family: sans-serif;
        background: linear-gradient( to right,#000088, #210f75, #2f1b6b, #372560 ,#3c2f56, #3f374b, #404040);
        margin:0px;
        padding:0px;
    }

    h1
    {
        text-align: center;
        font-weight: 800;
        font-size: 22px;
    }

    .kotak_login
    {
        width: 35%;
        margin: 110px auto;
        background: white;
        padding: 20px 40px;
        border-radius: 40px;
        font-size:14px;
    }

    .kotak
    {
        font-size: 14px;
        font-weight:150;
    }

    label{
        font-size: 14px;
        font-weight:150;
    }

    .form_login{
        background: #F0F8FF;
        width: 100%;
        padding: 10px;
        font-size: 13px;
        margin-bottom: 20px;
        border:1px solid #F0F8FF ;
    }

    .tombol_login{
        background: #000080;
        color: white;
        font-size: 14px;
        border-radius:30px;
        width: 100%;
        border: none;
        padding: 10px 20px;
    }

    .tombol_login:hover
    {
        background: #32CD32;
    }

    .link
    {
        color: #232323;
        text-decoration: none;
        font-size: 10pt;
    }

    .alert
    {
        background: #e44e4e;
        color: white;
        padding: 15px;
        text-align: center;
        border:1px solid;
        margin: 10px 430px;
        border-radius:15px;
    }

    .success
    {
        background: #228B22;
        color: white;
        padding: 15px;
        text-align: center;
        border:1px solid;
        margin: 10px 430px;
        border-radius:15px;
    }

    table thead th 
    {
        padding: 8px;
        text-align: left;
    }

    .container
    {
      width: 95%;
      margin: 0 auto;
    }

    .container:after
    {
        content:'';
        display: block;
        clear: both;
    }

    .tblin
    {
        font-size: 13px;
        float: left;
        align-items: center;
        color: white;
        padding-top: 18px;
        text-decoration: none;
    }

    header
    {
        background-color: #0d3361;
        margin: 0px 0px;
        padding: 0px 0px;
        height:8%;
    }

    header ul
    {
        float: right;
        background-color: #0d3361;
        margin-top:0px;
    }

    header ul li
    {
        display: inline-block;
    }

    header ul li a
    {
        padding: 16px 20px;
        display: inline-block;
        color:#ffffff;
        font-size: 15px;
        text-decoration: none;
    }

    header ul li a:hover
    {
        background-color: #ffffff;
        color: #0d3361;
        border-radius:0%;
    }

    </style>
</head>

<body>
    <?php 
    if(isset($_GET['pesan']))
    {
        if($_GET['pesan']=="gagal")
        {
            echo "<script>alert('Username dan Password tidak sesuai');window.location='login.php';</script>";
        }
        else if($_GET['pesan']=="gagal2")
        {
            echo "<script>alert('Silahkan registrasi dahulu');window.location='login.php';</script>";
        }
    }
    ?>
    <header>
          <div class="container">
              <a href="index.html" class="tblin">APLIKASI INVENTORY</a>
                  <ul>
                      <li><a href="home.php">HOME</a></li>
                      <li><a href="login.php">LOGIN</a></li>
                  </ul>
          </div>
    </header>

    <div class="kotak_login">
            <table>
                <thead>
                    <tr>
                    <th><img src="logo.jpg" alt="image" height="150" width="150"/></th>
                    <th>
                    <div class="kotak">
                        <h1>Login</h1>
                        <form action="cek_login.php" method="post">
                        <label>Username</label>
                        <input type="text" name="username" pattern="[A-Za-z0-9 ]+" class="form_login" required>
                    
                        <label>Password</label>
                        <input type="password" name="password" class="form_login" required>
                        
                        <input type="submit" class="tombol_login" value="LOGIN">
                        
                        <br/>
                        <br/>
                        <center>
                        <a>Create an account?</a>
                        <a href="register.php">Register</a>
                        </center>  
                        </form> 
                    </div>
                    </th>
                    </tr>
                </thead>
            </table>
    </div>
</body>
</html>
