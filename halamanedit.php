<?php
    include 'koneksi.php';

    session_start();
  
    if($_SESSION['level']!="admin")
    {
        header("location:login.php?pesan=gagal2");
    }

    if (isset($_GET['id'])) 
    {
        $kode = ($_GET["id"]);
    
        $query = "SELECT * FROM barangmasuk WHERE kode='$kode'";
        $result = mysqli_query($koneksi, $query);
        if(!$result)
        {
          die ("Query Error: ".mysqli_errno($koneksi).
             " - ".mysqli_error($koneksi));
        }
        $data = mysqli_fetch_assoc($result);
        if (!count($data)) 
        {
              echo "<script>alert('Data tidak ditemukan pada database');window.location='index.php';</script>";
        }
    } 
    else 
    {
        echo "<script>alert('Masukkan data id.');window.location='index.php';</script>";
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
        margin:0px;
        padding:0px;
    }
    
    h1 
    {
        text-transform: uppercase;
        color: 	#000080;
        font-size: 25px;
    }
    
    button 
    {
        background-color: #000080;
        color: #fff;
        padding: 10px 20px;
        text-decoration: none;
        font-size: 14px;
        border: 0px;
        margin-top: 20px;
        border-radius: 10px;
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
        outline-color: #000080;
        background-color: white;
    }

    select 
    {
        width: 100%;
        height: auto;
        padding: 8px 2px;
    }

    div 
    {
        width: 100%;
        height: auto;
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

    .tblsave
    {
        background-color: #228B22;
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
        <h1>Update Inventory Kode <?php echo $data['kode'];?></h1>
      <center>
      <form method="POST" action="edit.php" enctype="multipart/form-data" >

      <section class="box">
        <div>
          <label>Kode Barang</label>
          <input style="background: #F0F8FF" type="text" name="kode" readonly value="<?php echo $data['kode']; ?>" pattern="[A-Za-z0-9 ]+" required  id="kode"/>
        </div>

        <div>
          <label>Nama Barang</label>
         <input type="text" name="nama" value="<?php echo $data['nama']; ?>" pattern="[A-Za-z0-9 ]+" required id="nama"/>
        </div>

        <div>
          <label>Kategori</label>
          <select name="idk" required id="idk">
            <?php
              if ($data['idk']=="K-BHP"){
                  $idk = "K-BHP";
              }
              else{
                  $idk = "K-BTHP";
              }
            ?>
            <option readonly selected value="<?php echo $data["idk"]?>"><?=$idk?></option>
                <option value="K-BHP">K-BHP</option>
                <option value="K-BTHP">K-BHTP</option>
          </select>
        </div>

        <div>
          <label>Tanggal Masuk</label>
         <input type="date" name="tglmasuk" value="<?php echo $data['tglmasuk']; ?>" required id="tglmasuk"/>
        </div>

        <div>
          <label>Kondisi</label>
          <select name="kondisi" id="kondisi" pattern="[A-Za-z ]+" required >
            <?php
              if ($data['kondisi']== 'Sangat Baik'){
                  $kondisi = "Sangat Baik";
              }
              else if ($data['kondisi']== 'Baik'){
                  $kondisi = "Baik";
              }
              else if ($data['kondisi']== 'Cukup'){
                  $kondisi = "Cukup";
              }
              else if ($data['kondisi']== 'Buruk'){
                  $kondisi = "Buruk";
              }
              else{
                  $kondisi = "Sangat Buruk";
              }
            ?>
            <option readonly selected value="<?php echo $data["kondisi"]?>"><?=$kondisi?></option>
              <option value="Sangat Baik">Sangat Baik</option>
              <option value="Baik">Baik</option>
              <option value="Cukup">Cukup</option>
              <option value="Buruk">Buruk</option>
              <option value="Sangat Buruk">Sangat Buruk</option> 
          </select>
          </select>
        </div>

        <div>
          <label>Jumlah</label>
         <input type="number" min="1" name="jumlah" pattern="[0-9 ]+" required value="<?php echo $data['jumlah']; ?>" id="jumlah"/>
        </div>

        <div>
          <label>Status</label>
         <input type="text" name="status" value="<?php echo $data['status']; ?>"  required id="status"/>
        </div>

        <div>
          <label>Gambar</label>
          <img src="gambar/<?php echo $data['gambar']; ?>" alt="" style="width:100px; height:100px;" id="gambar">
          <label><i style="float: left;font-size: 12px; color:red">Abaikan jika tidak merubah gambar produk</i></label>
          <td></td>
              <input type="file" name="gambar" value="<?php echo $data['gambar']; ?>"/>
        </div>

        <div>
         <button class="tblsave" type="submit">Save</button>
        </div>
        </section>
      </form>
  </body>
</html>