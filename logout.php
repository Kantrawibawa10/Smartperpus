<?php
// mengaktifkan session php
session_start();

// menghapus semua session
session_destroy();

// menglihkan halaman ke halaman login
header("location:index.php");

?>