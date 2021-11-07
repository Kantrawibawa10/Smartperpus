<?php

include 'koneksi.php';

$ambil = $koneksi->query("SELECT * FROM pengembalian");

$ambil = $koneksi->query("SELECT * FROM peminjaman WHERE id='$_GET[id]'");

$today = date('Y-m-d');

if(isset($ambil)){

    $query = $koneksi->query("INSERT INTO pengembalian select id, nis, kode_buku, username, judul_buku,penulis, penerbit, tanggal_peminjaman, '$today', stok  from peminjaman WHERE id='$_GET[id]' ");

    if($query) {
        echo "<script>alert('Berhasil Melakukan Pengembalian!!'); window.location.href='hapus_data1.php?id=$_GET[id]'</script>";
    } else {
        echo "<script>alert('Gagal Melakukan Pengembalian!!');</script>";
    }

}

?>
