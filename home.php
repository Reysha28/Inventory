<?php
  include('koneksi.php'); 
  
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

    div 
    {
        width: 100%;
        margin-top:30px;
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
        background-color: #0d3361;
    }

    
    h1
    {
        text-transform: uppercase;
        color: #000080;
    }
    
    h2
    {
        text-transform: uppercase;
        color: #ffffff;
        font-size: 35px;
        margin-bottom: 20px;
    }

    h3
    {
        text-align: center;
        font-family: 600;
        margin: 5px 0;
        vertical-align: top;
        font-size: 17px;
        font-weight: 400;
    }

    header
    {
        margin-bottom: 10px;
        background-color: #0d3361;
    }

    header ul
    {
        float: right;
        background-color: #0d3361;
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

    .box
    {
        width: 670px;
        height: auto;
        padding: 30px 20px;
        margin-left: auto;
        margin-right: auto;
        margin-top: 30px;
        background: linear-gradient( to right,#000088, #210f75, #2f1b6b, #372560 ,#3c2f56, #3f374b, #404040);
        border-radius: 20px;
        color:#ffffff;
    }

    .baris
    {
        margin-top: 5px;
        display: flex;
        justify-content: space-between;
    }

    .content
    {
        width: 1100px;
        margin: 2px auto;
        position: relative;
    }
        
    .kotak
    {
        width: 65%;
        margin: auto;
        text-align: center;
        padding-top: 0;
    }
    
    .subkotak
    {
        flex-basis: 32%;
        border-radius: 20px;
        background: linear-gradient( to right,#000088, #210f75);
        color: #ffffff;
        margin-bottom: 20px;
    }
    
    .subkotak:hover
    {
        background: #1E90FF;
        color: #ffffff;
    }

    .subkotak p
    {
        font-size: 50px;
        font-weight: 400;
        text-align: center;
        padding-top: 5px;
    }
    
    .subkotak h3
    {
        margin-top: 5px;
        text-align: center;
        padding: 5px 5px;
        color: #ffffff;
    }

    .subkotak:hover h3
    {
        color: #ffffff;
    }

    .tbladd
    {
        background-color: #ffffff;
        color: #0000CD; 
        padding: 10px 20px;
        font-size: 15px;
        font-weight:800;
        border: none;
        cursor: pointer;
        border-radius: 10px;
        margin-top:15px;
        text-align: center;
    }
    </style>
  </head>

  <body>
    <?php
            $query = "SELECT * FROM barangmasuk";
            $result = mysqli_query($koneksi, $query);
            $jumlah = mysqli_num_rows($result);

            $query = "SELECT * FROM barangmasuk WHERE idk='K-BHP'";
            $resulta = mysqli_query($koneksi, $query);
            $jumlaha = mysqli_num_rows($resulta);

            $query = "SELECT * FROM barangmasuk WHERE idk='K-BTHP'";
            $resultb = mysqli_query($koneksi, $query);
            $jumlahb = mysqli_num_rows($resultb);
    ?>
    <header>
          <div class="container">
              <h1><a href="index.html">Aplikasi Inventory</a></h1>
                  <ul>
                      <li><a href="home.php">HOME</a></li>
                      <li><a href="login.php">LOGIN</a></li>
                  </ul>
          </div>
    </header>

    <center><img src="th.jfif" alt="image" height="130" width="130"/></center>
    <section class="box">
        <center><h2>INVENTORY LDKOM 2021</h2>
        <a href="login.php" class="tbladd" >LOGIN</a></center>
    </section>
    <div class="content">
        <section class="kotak">
            <div class="baris">
                <div class="subkotak1">
                <center><img src="check-list.png" alt="image" height="45" width="45"/></center>
                </div>
                <div class="subkotak1">
                <center><img src="store.png" alt="image" height="45" width="45"/></center>
                </div>
                <div class="subkotak1">
                <center><img src="wholesaler.png" alt="image" height="45" width="45"/></center>
                </div>
            </div>
        </section>
    </div>
    <div class="content">
        <section class="kotak">
            <div class="baris">
                <div class="subkotak">
                <p><?php echo $jumlah; ?></p>
                <h3>Total Barang </h3>
                </div>
                <div class="subkotak">
                <p><?php echo $jumlaha; ?></p>
                <h3>Barang Habis Pakai </h3>
                </div>
                <div class="subkotak">
                <p><?php echo $jumlahb; ?></p>
                <h3>Barang Tidak Habis Pakai </h3>
                </div>
            </div>
        </section>
    </div>

  </body>
</html>