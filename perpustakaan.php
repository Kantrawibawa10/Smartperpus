<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="shortcut icon" href="pegawai/assets/images/logo.png">
    <link rel="stylesheet" href="webfonts/css/font-awesome.min.css">
    <link rel="stylesheet" href="webfonts/css/font-awesome.min.css">
    <link rel="stylesheet" href="pegawai/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="pegawai/assets/vendors/base/vendor.bundle.base.css">
    <link rel="stylesheet" href="pegawai/assets/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <title>Perpustakaan</title>
  </head>
  <body>
  <?php
    session_start();
    include 'koneksi.php';
      // cek apakah yang mengakses halaman ini sudah login
      if( !isset($_SESSION['login']) AND ($_SESSION['level'] = "Siswa")){
          header("location:index.php");
          exit;
      }


  ?>
    <style>
      *{
        font-family: "Poppins" , sans-serif;
      }

      .judul{
        font-size: 20px;
        font-weight: 500;
      }

      .deskripsi_judul{
        font-size: 15px;
        font-weight: 400;
      }

      .bg-judul{
        padding: 15px 0 0 0;
      }

      .judul,
      .deskripsi_judul,
      .bg-judul{
        line-height: 5px;
        text-decoration: none;
        color: #000;
      }


      .content{
        margin-top: 15vh;
        margin: auto;
        justify-content: center;
        align-items: center;
      }

      .search{
        width: 93%;
        height: 50px;
        border-radius: 50px;
        z-index: 1;
        position: relative;
      }

      .search-btn{
        position: absolute;
        right: 220px;
        margin-top: 5px;
        font-size: 20px;
        z-index: 100;
      }

      .auth{
        position: relative;
        width: 40px;
        height: 40px;
        background-position: center;
        background-size: cover;
        border-radius: 50%;
      }

      .category{
        justify-content: center;
        align-items: center;
      }

      .box{
        justify-content: center;
        align-items: center;
        border-radius: 10px;
        padding: 20px;
        border: 1px solid gray;
        margin: 10px;
        transition: 0.5s ease;
      }

      .box:hover{
        transform: translateY(-30px);
      }

      .content-box .title{
        text-align: center;
        padding: 10px 0 0 0;
        margin-top: 10px;
      }


    </style>
    <!--navbar start-->
    <nav class="navbar navbar-expand-lg bg-light">
      <div class="container">
        <a class="navbar-brand d-flex" href="#" >
          <img src="pegawai/assets/images/logo.png"  alt="" width="50" height="50">
          <div class="bg-judul">
            <p class="judul">Perpustakaan</p>
            <p class="deskripsi_judul">SMK Negeri 1 Denpasar</p>
          </div>
        </a>

        <ul class="nav justify-content-end">
          <li class="nav-item mt-2">
            <a class="nav-link text-dark" href="perpustakaan.php?halaman=home">Home</a>
          </li>

          <li class="nav-item mt-2">
            <a class="nav-link text-dark" href="perpustakaan.php?halaman=buku">Buku</a>
          </li>
          <li class="nav-item mt-2">
            <a class="nav-link text-dark" href="perpustakaan.php?halaman=peminjaman">Peminjaman</a>
          </li>
          <li class="nav-item mt-2 " style="left: 10px; position:relative;">
            <a href="" class="nav-link text-dark">
              <i class="fa fa-bell" aria-hidden="true"></i>
            </a>
          </li>
          <li class="nav-item nav-profile dropdown bg-light">
            <a class="nav-link dropdown-toggle text-dark" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="pegawai/assets/images/auth/lockscreen-bg.jpg" alt="profile" class="auth">
              <span class="nav-profile-name text-dark"><?php echo $_SESSION['username']; ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="mdi mdi-settings text-primary"></i>
                Settings
              </a>
              <a href="logout.php" class="dropdown-item">
                <i class="mdi mdi-logout text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!--navbar end-->

    <!--content start-->
    <?php
      $queries = array();
      parse_str($_SERVER['QUERY_STRING'], $queries);
      error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
      switch ($queries['halaman'])
      {

      case 'detail':

        include 'detail_buku.php';
        break;

      case 'peminjaman':

        include 'data_pinjaman.php';
        break;

      case 'buku':

        include 'buku.php';
        break;

      case 'pinjam':

        include 'pinjambuku.php';
        break;

      default:

      case 'home';
        include 'homepage.php';
        break;
       }
    ?>
    <!--content end-->

      <!-- partial:partials/_footer.html -->
      <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021 <a href="https://www.urbanui.com/" target="_blank">SMK Negeri 1 Denpasar</a></span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Kadek Satria Kantra Wibawa <i class="mdi mdi-heart text-danger"></i></span>
          </div>
      </footer>
      <!-- partial -->


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    <!-- plugins:js -->
    <script src="pegawai/assets/vendors/base/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <script src="pegawai/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="pegawai/assets/vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="pegawai/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="pegawai/assets/js/off-canvas.js"></script>
    <script src="pegawai/assets/js/hoverable-collapse.js"></script>
    <script src="pegawai/assets/js/template.js"></script>
    <!-- endinject -->
    </script>
  </body>
</html>
