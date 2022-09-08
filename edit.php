<?php
    include 'koneksi.php';
    if(empty($_POST["kode"]) || empty($_POST["nama"])|| empty($_POST["idk"])|| empty($_POST["tglmasuk"])|| empty($_POST["kondisi"])|| empty($_POST["jumlah"])|| empty($_POST["status"]))  
    {            
        echo '<script>alert("Data Tidak Boleh Kosong!")</script>';  
    }  
    else  
    { 
    error_reporting(E_ALL ^(E_NOTICE|E_WARNING));

    $kode     = $_POST['kode'];
    $nama     = $_POST['nama'];
    $idk      = $_POST['idk'];
    $tglmasuk = $_POST['tglmasuk'];
    $kondisi  = $_POST['kondisi'];
    $jumlah   = $_POST['jumlah'];
    $status   = $_POST['status'];
   
    $allowExt           = array( 'png', 'jpg', 'jpeg','jfif');
    $fileName           = $_FILES['gambar']['name'];
    $fileExt            = strtolower(end(explode('.', $fileName)));
    $fileSize           = $_FILES['gambar']['size'];
    $fileTemp           = $_FILES['gambar']['tmp_name'];
    $base               = basename ($fileName);
    $gambar             = str_replace(' ','_',$base);

    if($_FILES['gambar']['size']>0)
    {
        if(in_array($fileExt, $allowExt) === true)
        {
            if($fileSize < 1044070) 
            {           
                if(move_uploaded_file($fileTemp, 'gambar/'.$gambar))
                {
                    $query = mysqli_query($koneksi,"UPDATE barangmasuk SET
                    kode='$kode',
                    nama='$nama',
                    idk='$idk',
                    tglmasuk='$tglmasuk',
                    kondisi='$kondisi',
                    jumlah='$jumlah',
                    status='$status',
                    gambar='$gambar'
                    WHERE kode='$kode'");
                    
                    if($query)
                    {                     
                        echo "<script>alert('Data berhasil diupdate');window.location='index_admin.php';</script>";
                    }
                    else
                    {
                        echo "<script>alert('Data gagal diupdate');window.location='index_admin.php';</script>";
                    }
                }
                else
                {
                    echo 'FILE TIDAK TERUPDATE';
                    header("location:index_admin.php");   
                }
            }
            else
            {
                echo 'UKURAN FILE TERLALU BESAR';
                header("location:index_admin.php");
            }
        }
        else
        {
            echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
            header("location:index_admin.php");
        }
    }
    else
    {
        $query = mysqli_query($koneksi,"UPDATE barangmasuk SET
                    kode='$kode',
                    nama='$nama',
                    idk='$idk',
                    tglmasuk='$tglmasuk',
                    kondisi='$kondisi',
                    jumlah='$jumlah',
                    status='$status'
                    WHERE kode='$kode'");

        if($query)
        {
            echo "<script>alert('Data berhasil diupdate');window.location='index_admin.php';</script>";
        }
        else
        {
            echo "<script>alert('Data gagal diupdate');window.location='index_admin.php';</script>";
        }
    }
    }
?>
                   