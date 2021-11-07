<?php

//mengaktifkan session pada php
session_start();

// menghubungkan dengan koneksi database
include 'koneksi.php';

if(isset($_COOKIE["key"]) && isset($_COOKIE["no"])){
    $key=$_COOKIE["key"];
    $no=$_COOKIE["no"];
    

    // ammbil data berdasarkan id
    $s=mysqli_query($koneksi,"SELECT * FROM data_siswa WHERE id_siswa=$no");
    $p=mysqli_query($koneksi,"SELECT * FROM data_petugas WHERE id_petugas=$no");
    $a=mysqli_query($koneksi,"SELECT * FROM data_admin WHERE id_admin=$no");
    
    $row_siswa=mysqli_fetch_assoc($s);
    $row_petugas=mysqli_fetch_assoc($p);
    $row_admin=mysqli_fetch_assoc($a);

    if($key===hash('sha256',$row_siswa["username"])){
        $_SESSION["login"]=true;
        $_SESSION["level"]=="Siswa";
        
    }else if($key===hash('sha256',$row_petugas["username_petugas"])){
        $_SESSION["login"]=true;
        $_SESSION["level"]=="Petugas";

    }else if($key===hash('sha256',$row_admin["username"])){
        $_SESSION["login"]=true;
        $_SESSION["level"]=="Admin";
    }
}


if (isset($_POST["login"])) 
{
			
    //mengangkap data yang dikirim dari form login
    $username = $_POST['username'];
    $password = $_POST['password'];
    $remember = $_POST['remember'];

    $_SESSION['login'] = $_POST['login'];

    // menyeleksi data user dengan username dan password yang sesuai
    $login = mysqli_query($koneksi,"select * from data_siswa where username='$username' and password='$password'");
    $login2 = mysqli_query($koneksi,"select * from data_petugas where username_petugas='$username' and password_petugas='$password'");
    $login3 = mysqli_query($koneksi,"select * from data_admin where username_admin='$username' and password='$password'");

    // menghitung jumlah data yang ditemukan
    $cek = mysqli_num_rows($login);
    $cek2 = mysqli_num_rows($login2);
    $cek3 = mysqli_num_rows($login3);

    // cek apakah username dan password di temukan pada database
    if ($cek3 > 0) {

        $data = mysqli_fetch_assoc($login3);

        //cek jika user login sebagai admin
        if ($data['level']=="Admin") {

            // buat session login dan username
            $_SESSION['username_admin'] = $username;
            $_SESSION['level'] = "Admin";
            // cek remember me
            if(isset($_POST["check"])){
                setcookie("no",$arr_admin["id"] ,time()+60);
                setcookie("key",hash("sha256",$arr_admin["username"]),time()+60);
            }
            //alihkan ke halaman dashboard admin
            header("location:admin.php?halaman=dashboard");
            exit();
        }else {
            header("location:index.php");
    
        }


    } elseif ($cek2 > 0) {

        $data = mysqli_fetch_assoc($login2);

        //cek jika user login sebagai admin
        if ($data['level']=="Petugas") {

            // buat session login dan username
            $_SESSION['username_petugas'] = $username;
            $_SESSION['level'] = "Petugas";
            // cek remember me
            if(isset($_POST["check"])){
                setcookie("no",$arr_petugas["id"] ,time()+60);
                setcookie("key",hash("sha256",$arr_petugas["username_petugas"]),time()+60);
            }
            //alihkan ke halaman dashboard admin
            header("location:petugas.php?halaman=dashboard");
            exit();
        } else {
            header("location:index.php?pesan=gagal");
    
        }



    } elseif ($cek > 0) {

        $data = mysqli_fetch_assoc($login);

        //cek jika user login sebagai admin
        if ($data['level']=="Siswa") {

            // buat session login dan username
            $_SESSION['username'] = $username;
            $_SESSION['level'] = "Siswa";
            // cek remember me
            if(isset($_POST["check"])){
                setcookie("no",$arr_siswa["id"] ,time()+60);
                setcookie("key",hash("sha256",$arr_siswa["username"]),time()+60);
            }
            //alihkan ke halaman dashboard admin
            header("location:perpustakaan.php?halaman=home");
            exit();
        } 

    } else {
        header("location:index.php?pesan=gagal");

    }
}    
?>

<!--new password logic-->
<?php
    if (isset($_POST['submit'])){ 
        if(mysqli_query($koneksi, "UPDATE user SET password='$_POST[password]' WHERE username='$_POST[username]'"))
        {
            echo "<script>alert('Password Berhasil Di Ganti!!!');</script>";
	        echo "<script>location='index.php';</script>";
        }
    }
?>

