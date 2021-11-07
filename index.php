<?php
    include "koneksi.php";
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSS start -->
        <link rel="stylesheet" href="css/login.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <!-- CSS end -->

        <!--logo icon-->
        <link rel="shortcut icon" href="pegawai/assets/images/logo.png">

        <title>Login</title>
        <style>
            *{
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body{
                background: rgb(219,226,226);
            }

            .row{
                background: white;
                border-radius: 30px;
                box-shadow: 12px 12px 22px grey;
            }

            img{
                border-top-left-radius: 30px;
                border-bottom-left-radius: 30px;
            }

            .btn1{
                outline: none;
                border: none;
                height: 50px;
                width: 100%;
                background: black;
                color: white;
                border-radius: 4px;
                font-weight: 600;
                transition: 0.5s;
            }

            .btn1:hover{
                background: white;
                border: 1px solid;
                color: black;
            }

            .logo{
                width: 70px;
            }

            .logo-bx{
                display: flex;
            }

            .text-logo{
                display: inline-block;
                line-height: -20px;
                margin-top: 25px;
            }

            .bg{
                border-top-left-radius: 30px;
                border-bottom-left-radius: 30px;
                border-top-right-radius: 30px;
                background-size: cover;
                background-position: center;
                width: 100%;
                height: 100%;
            }

        </style>
    </head>

    <?php
        if(isset($_GET['pesan'])){
            if($_GET['pesan']=="gagal")
            {

                echo "<script>alert('Gagal login silakan cek kembali akun anda')</script>";
                echo "<meta http-equiv='refresh' content='0; url=?page=index'>";
            }
        }
    ?>
    <body>
    <section class="Form my-4 mx-5 mt-5">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-lg-5">
                        <img src="img/background.png" alt="" class="img-fluid bg">
                    </div>

                    <div class="col-lg-7 px-5 pt-5">
                        <!--start logo-->
                        <div class="logo-bx">
                            <img class="py-3 logo" src="pegawai/assets/images/logo.png"></img>
                            <div class="text-logo">
                                <h3 class="font-weight-bold py-3" style="line-height: 1px;">Perpustakaan</h3>
                                <p style="line-height: 1px;">SMK Negeri 1 Denpasar</p>
                            </div>
                        </div>
                        
                        <!--end logo-->

                        <h4>Login menggunakan akun anda</h4>
                        <form action="cek_login.php" method="POST">
                            <!--username input code start-->
                            <div class="form-row">
                                <div class="col-lg-7">
                                    <input name="username" type="username" class="form-control my-3 p-3" placeholder="please input your username" required>
                                </div>
                            </div>
                            <!--username input code end-->

                            <div class="from-row">
                                <div class="col-lg-7 d-flex">
                                    <input type="password" name="password" id="password" class="form-control my-3 p-3" placeholder="Password" required="required">
                                    <div class="eye" onclick="myFunction()">
                                        <span class="input-group-text mt-3 bg-transparent" style="height: 57px; position: absolute; margin-left: -45px; border: none;">
                                        <svg id="openeye" style="display: none;" width="20px" height="20px" viewBox="0 0 98.48 98.48" style="enable-background:new 0 0 98.48 98.48;">
                                            <path d="M97.204,45.788c-0.865-1.02-21.537-24.945-47.963-24.945c-26.427,0-47.098,23.925-47.965,24.946
                                                c-1.701,2-1.701,4.902,0.001,6.904c0.866,1.02,21.537,24.944,47.964,24.944c26.426,0,47.098-23.926,47.964-24.946
                                                C98.906,50.691,98.906,47.789,97.204,45.788z M57.313,35.215c1.777-0.97,4.255,0.143,5.534,2.485
                                                c1.279,2.343,0.875,5.029-0.902,5.999c-1.776,0.971-4.255-0.143-5.535-2.485C55.132,38.871,55.535,36.185,57.313,35.215z
                                                M49.241,68.969c-18.46,0-33.995-14.177-39.372-19.729c3.631-3.75,11.898-11.429,22.567-16.021
                                                c-2.081,3.166-3.301,6.949-3.301,11.021c0,11.104,9.001,20.105,20.105,20.105s20.106-9.001,20.106-20.105
                                                c0-4.072-1.219-7.855-3.3-11.021C76.715,37.812,84.981,45.49,88.612,49.24C83.235,54.795,67.7,68.969,49.241,68.969z"/>
                                        </svg>
                                        <svg id="slasheye" width="20px" height="20px" viewBox="0 0 98.48 98.481" style="enable-background:new 0 0 98.48 98.481;">

                                            <path d="M69.322,44.716L49.715,64.323C60.438,64.072,69.071,55.438,69.322,44.716z"/>
                                            <path d="M97.204,45.789c-0.449-0.529-6.245-7.23-15.402-13.554l-6.2,6.2c5.99,3.954,10.559,8.275,13.011,10.806
                                                C83.235,54.795,67.7,68.969,49.241,68.969c-1.334,0-2.651-0.082-3.952-0.222l-7.439,7.438c3.639,0.91,7.449,1.451,11.391,1.451
                                                c26.426,0,47.098-23.927,47.964-24.946C98.906,50.692,98.906,47.79,97.204,45.789z"/>
                                            <path d="M90.651,15.901c0-0.266-0.104-0.52-0.293-0.707l-7.071-7.07c-0.391-0.391-1.022-0.391-1.414,0L66.045,23.952
                                                c-5.202-1.893-10.855-3.108-16.804-3.108c-26.427,0-47.098,23.926-47.965,24.946c-1.701,2-1.701,4.902,0.001,6.903
                                                c0.517,0.606,8.083,9.354,19.707,16.319l-12.86,12.86c-0.188,0.188-0.293,0.441-0.293,0.707c0,0.267,0.105,0.521,0.293,0.707
                                                l7.071,7.07c0.195,0.194,0.451,0.293,0.707,0.293c0.256,0,0.512-0.099,0.707-0.293l73.75-73.75
                                                C90.546,16.421,90.651,16.167,90.651,15.901z M9.869,49.241C13.5,45.49,21.767,37.812,32.436,33.22
                                                c-2.081,3.166-3.301,6.949-3.301,11.021c0,4.665,1.601,8.945,4.27,12.352l-6.124,6.123C19.129,58.196,12.89,52.361,9.869,49.241z"/>

                                        </svg>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!--password jnput code start
                            <div class="form-row">
                                <div class="col-lg-7">
                                    <input name="password" type="password" class="form-control my-3 p-3" placeholder="please input your password" required>
                                </div>
                            </div>
                            password input code end-->

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="check" name="check" id="check">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Remeber Me
                                </label>
                            </div>

                            <!--button code start-->
                            <div class="form-row">
                                <div class="col-lg-7">
                                    <button type="SUBMIT" name="login" value="login" class="btn1 mt-3 mb-5">Login</button>
                                </div>
                            </div>
                            <!--button code end-->

                            <div class="mb-5">
                                <a href="newpass.php" style="text-decoration: none;">Forgot password</a>
                                <p>Tidak punya akun? <a href="register.php" style="text-decoration: none;">Register</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>




        <!-- js script start -->
        <!--alert js-->
       
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
        <!-- js script end -->
        
        <script>
        function myFunction() {
            var x = document.getElementById("password");
            var y = document.getElementById("openeye");
            var z = document.getElementById("slasheye");

            if (x.type === 'password') {
                x.type = "text";
                y.style.display = "block";
                z.style.display = "none";
            } 
            else {
                x.type = "password";
                y.style.display = "none";
                z.style.display = "block";
            }
        }
    </script>
  
  </body>
</html>