<?php 
    session_start();
 
    session_destroy();
 
    echo "<script>
    var yakin=confirm('Apakah anda yakin akan log out?');

    if(yakin)
    {
        window.location='login.php';
    }
    else
    {
        window.location='index_admin.php';
    }
    </script>";
?>
