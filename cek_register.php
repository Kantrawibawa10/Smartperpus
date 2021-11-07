<!--php logic register start-->
<?php


include "koneksi.php";

if (isset($_POST['proses'])) {
    mysqli_query($koneksi, "insert into tabel_siswa set
    nis = '$_POST[nis]',
    name = '$_POST[name]',
    username = '$_POST[username]',
    alamat = '$_POST[alamat]',
    email = '$_POST[email]',
    password = '$_POST[password]',
    kelas = '$_POST[kelas]',
    gender = '$_POST[gender]',
    level = '$_POST[level]'");

    header("location:index.php?pesan=berhasil");


} else { }

?>
<!--php logic register end-->