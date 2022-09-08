<?php
    include 'koneksi.php';

    session_start();
  
    if($_SESSION['level']!="admin"){
        header("location:login.php?pesan=gagal2");
    }
    
    $kode = $_GET["id"];

    $query = "DELETE FROM barangmasuk WHERE kode='$kode' ";
    $hasil_query = mysqli_query($koneksi, $query);

    if(!$hasil_query) 
    {
      die ("Gagal menghapus data: ".mysqli_errno($koneksi).
       " - ".mysqli_error($koneksi));
    } 
    else 
    {
      echo "<script>alert('Data berhasil dihapus');window.location='index_admin.php';</script>";
    }
