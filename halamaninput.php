<?php
  include('koneksi.php'); 

  session_start();
  
  if($_SESSION['level']!="admin")
  {
      header("location:login.php?pesan=gagal2");
  }
  
?>
<!DOCTYPE html>
<html>
  <head>
    <title>CRUD INVENTORY</title>
    <style type="text/css">
    * 
    {
        font-family: "Trebuchet MS";
        margin: 0px;
        padding: 0px;
    }
    
    h1 
    {
        text-transform: uppercase;
        color: #000080;
        font-size: 25px;
    }
    
    button 
    {
        color: #fff;
        padding: 10px 20px;
        text-decoration: none;
        font-size: 14px;
        border: 0px;
        margin-top: 20px;
        border-radius: 10px;
    }

    .tblsave
    {
        background-color: #228B22;
    }

    .tblreset
    {
        background-color: #DC143C;
    }

    label 
    {
        margin-top: 10px;
        margin-bottom: 2px;
        float: left;
        text-align: left;
        width: 100%;
        font-size: 15px;
    }

    input 
    {
        padding: 6px;
        width: 100%;
        box-sizing: border-box;
        border: 2px solid #ccc;
        background-color: white;
    }

    div 
    {
        width: 100%;
        height: auto;
    }

    select 
    {
        width: 100%;
        height: auto;
        padding: 8px 2px;
        border: 2px solid #ccc;
    }

    .box
    {
        width: 600px;
        height: auto;
        padding: 20px;
        margin-left: auto;
        margin-right: auto;
        margin-top: 20px;
        background: #ededed;
        border-radius: 20px;
    }

    a 
    {
        color: #fff;
        padding: 10px;
        text-decoration: none;
        font-size: 14px;
        position: right;
        border-radius: 10px;
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

    header h1
    {
        font-size: 20px;
        float: left;
        align-items: center;
        padding: 13px 0px;
        color: #ffffff;
        text-decoration: none;
    }

    header
    {
        background-color:#0d3361;
        margin-bottom: 20px;
    }

    header ul
    {
        float: right;
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
    <header>
        <div class="container">
          <h1><a>Aplikasi Inventory</a></h1>
            <ul>
            <li><a href="home.php">HOME</a></li>
            <li><a href="user.php">USER</a></li>
            <li><a href="index_admin.php">BARANG</a></li>
            <li><a href="logout_admin.php">LOG OUT</a></li>
          </ul>
        </div>
    </header>

      <center>
        <h1>Add Inventory</h1>
      <center>
      <form method="POST" action="input.php" enctype="multipart/form-data" >

      <section class="box">
        <div>
          <label>Kode Barang</label>
          <input type="text" name="kode" autofocus="" pattern="[A-Za-z0-9 ]+" required id="kode"/>
        </div>

        <div>
          <label>Nama Barang</label>
         <input type="text" name="nama" pattern="[A-Za-z0-9 ]+" required id="nama" />
        </div>

        <div>
          <label>Kategori</label>
          <select name="idk" id="idk" required >
            <option value="">-- Pilihan --</option>
            <option value="K-BHP">K-BHP</option>
            <option value="K-BTHP">K-BTHP</option>
          </select>
        </div>

        <div>
          <label>Tanggal Masuk Barang</label>
         <input type="date" name="tglmasuk" required id="tglmasuk"/>
        </div>

        <div>
          <label>Kondisi</label>
          <select name="kondisi" id="kondisi" pattern="[A-Za-z ]+" required >
            <option value="">-- Pilihan --</option>
            <option value="Sangat Baik">Sangat Baik</option>
            <option value="Baik">Baik</option>
            <option value="Cukup">Cukup</option>
            <option value="Buruk">Buruk</option>
            <option value="Sangat Buruk">Sangat Buruk</option>
          </select>
        </div>

        <div>
          <label>Jumlah</label>
         <input type="number" min="1" name="jumlah" pattern="[0-9 ]+" required id="jumlah"/>
        </div>

        <div>
          <label>Status</label>
         <input type="text" name="status" pattern="[A-Za-z ]+" required id="status"/>
        </div>

        <div>
          <label>Gambar Produk</label>
         <input type="file" name="gambar" required id="gambar"/>
        </div>

        <div>
         <button class="tblsave" type="submit">Save</button>
         <button class="tblreset" type="reset">Reset</button>
        </div>
        </section>
      </form>
  </body>
</html>
