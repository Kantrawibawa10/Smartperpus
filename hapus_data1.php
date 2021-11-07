<?php 
        include 'koneksi.php';

        $ambil = $koneksi->query("SELECT * FROM peminjaman WHERE id='$_GET[id]'");
        $data = $ambil->fetch_assoc();
    
        $koneksi->query("DELETE FROM peminjaman WHERE id='$_GET[id]'");

        if($ambil) {
        echo "<script>window.location.href='petugas.php?halaman=pengembalian';</script>";
        }    

?>

