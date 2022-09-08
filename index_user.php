<?php
  include('koneksi.php'); 
  session_start();
  
  if($_SESSION['level']!="user")
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
        color: #00008B;
    }

    table 
    {
        border: solid 1px #C0C0C0;
        border-collapse: collapse;
        border-spacing: 0;
        width: 92%;
        margin: 20px auto 20px auto;
    }

    table tbody tr:hover
    {
      background-color: #E6E6FA;
    }

    table thead th 
    {
        background-color: #C0C0C0;
        border: solid 1px #C0C0C0;
        color: #000080;
        padding: 8px;
        text-align: center;
        text-shadow: 1px 1px 1px #fff;
        text-decoration: none;
    }

    table tbody td 
    {
        border: solid 1px #C0C0C0;
        color: #333;
        padding: 10px;
        text-align: center;
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

    .tbledit
    {
        background-color: #228B22;
    }

    .tbldelete
    {
        background-color: #DC143C;
    }

    .baris
    {
      float: left;
      display: block;
      clear: both;
      margin: 20px 50px;
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
        font-size: 18px;
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

    .ktg 
    {
        background-color: #00008B;
        color: white;
        padding: 10px;
        font-size: 14px;
        border: none;
        cursor: pointer;
        border-radius: 10px;
    }

    .tblcari
    {
        background-color: #4169E1;
        color: white; 
        padding: 10px 20px;
        font-size: 14px;
        border: none;
        cursor: pointer;
        border-radius: 10px;
        margin-left:15px;
    }

    .tblcari:hover
    {
        background-color: #C0C0C0;
        color: #00008B;
    }

    .kolom
    {
        padding: 5px 5px;
        font-size: 15px;
        margin-left:800px;
    }

    .tbladd
    {
        background-color: #0000CD;
        color: white; 
        padding: 10px 20px;
        font-size: 14px;
        border: none;
        cursor: pointer;
        border-radius: 10px;
        margin-left:15px;
    }

    .tbladd:hover
    {
        background-color: #C0C0C0;
        color: #00008B;
    }

    .dropdown:hover .ktg 
    {
        background-color: #C0C0C0;
        color: #00008B;
    }

    .dropdown 
    {
        position: relative;
        display: inline-block;
    }

    .dropdown-content 
    {
        display: none;
        position: absolute;
        background-color: #2f303f;
        min-width: 220px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }

    .dropdown-content a 
    {
        color:#fff;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover 
    {
    background-color:#00008B;
    color: #fff !important;
    }

    .dropdown:hover .dropdown-content 
    {
        display: block;
    }
  </style>
  </head>

  <body>
    <header>
        <div class="container">
          <h1><a>Aplikasi Inventory</a></h1>
            <ul>
            <li><a href="home.php">HOME</a></li>
            <li><a href="logout_user.php">LOG OUT</a></li>
          </ul>
        </div>
    </header>
    
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>" enctype="multipart/form-data" >
    
    <center><h1>Inventory LDKOM 2021</h1><center>
    <div class="baris">
        <div class="dropdown">
          <button class="ktg">Kategori</button>
            <div class="dropdown-content">
              <a href="index_user.php">General</a>
              <a href="index_user_bhp.php">Barang Habis Pakai</a>
              <a href="index_user_bthp.php">Barang Tidak Habis Pakai</a>
            </div>
        </div>
        <a href="print.php" class="tbladd" >Print</a>

        <input class="kolom" type="text" name="cari">
        <input class="tblcari" type="submit" value="Search">
    </div>
    <?php
        if(isset($_POST['cari']))
        {
            $cari=$_POST['cari'];
        }
    ?>
    
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Kode Barang</th>
          <th>Nama Barang</th>
          <th>Kategori</th>
          <th>Tanggal Masuk Barang</th>
          <th>Kondisi</th>
          <th>Jumlah</th>
          <th>Status</th>
          <th>Gambar</th>
        </tr>
    </thead>
    <tbody>

        <?php
            include "koneksi.php";
            if(isset($_POST['cari']))
            {
            $cari=trim($_POST['cari']);
            $query = "SELECT * FROM barangmasuk where kode like '%$cari%' or nama like '%$cari%' or idk like '%$cari%' or tglmasuk like '%$cari%' or kondisi like '%$cari%' or jumlah like '%$cari%'";
            }
            else
            {
            $query = "SELECT * FROM barangmasuk";
            }

            $result = mysqli_query($koneksi, $query);
            if(!$result)
            {
                die ("Query Error: ".mysqli_errno($koneksi).
               " - ".mysqli_error($koneksi));
            }
            $no = 1;
            
            while($row = mysqli_fetch_assoc($result))
            {
           ?>

            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $row['kode']; ?></td>
                <td><?php echo $row['nama']; ?></td>
                <td><?php $idk = $row['idk']; 
                    if($idk=="K-BHP")
                      {echo "K-BHP";}
                    else
                      {echo "K-BTHP";}
                    ?>
                </td>
                <td><?php echo date("d-m-Y",strtotime ($row['tglmasuk']));?></td>
                <td><?php echo $row['kondisi']; ?></td>
                <td><?php echo $row['jumlah']; ?></td>
                <td><?php echo $row['status']; ?></td>
                <td style="text-align: center;"><img src="gambar/<?php echo $row['gambar']; ?>" style="width:100px; height:100px;"></td>
            </tr>
         
        <?php
        $no++; 
      }
      ?>
    </tbody>
    </table>
    
  </body>
</html>