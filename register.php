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

        <title>Register</title>
        <style>
            *{
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body{
                background: rgb(219,226,226);
            }

            .form{
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
    <body>
        <section class="Form my-4 mx-5">
            <div class="container">
                <div class="row form no-gutters">
                    <div class="col-lg-5">
                        <img src="img/background.png" alt="" class="img-fluid bg">
                    </div>
                    <div class="col-lg-7 px-5 pt-4">
                        <!--start logo-->
                        <div class="logo-bx">
                            <img class="py-3 logo" src="pegawai/assets/images/logo.png"></img>
                            <div class="text-logo">
                                <h3 class="font-weight-bold py-3" style="line-height: 1px;">Perpustakaan</h3>
                                <p style="line-height: 1px;">SMK Negeri 1 Denpasar</p>
                            </div>
                        </div>
                        
                        <!--end logo-->

                        <h4>Register menggunakan data diri anda</h4>
                        <form action="cek_register.php" method="POST">

                            <div class="row">
                                <div class="col-lg-6">
                                    <!--name input code start-->
                                    <div class="form-row">
                                        <div class="col-auto">
                                            <input type="text" name="name" class="form-control my-3 p-3" placeholder="please input your name" required>
                                        </div>
                                    </div>
                                    <!--name input code end-->

                                    <!--alamat jnput code start-->
                                    <div class="form-row">
                                        <div class="col-auto">
                                            <input type="text" name="alamat" class="form-control my-3 p-3" placeholder="please input your addreass" required>
                                        </div>
                                    </div>
                                    <!--alamat input code end-->

                                    <!--nis jnput code start-->
                                    <div class="form-row">
                                        <div class="col-auto">
                                            <input type="text" name="nis" class="form-control my-3 p-3" placeholder="please input your NIS" required>
                                        </div>
                                    </div>
                                    <!--nis input code end-->

                                    <!--kelas jnput code start-->
                                    <div class="form-row">
                                        <div class="col-auto">
                                            <input type="text" name="kelas" class="form-control my-3 p-3" placeholder="please input your kelas" required>
                                        </div>
                                    </div>
                                    <!--kelas input code end-->
                                </div>

                                <div class="col-lg-6">
                                    <!--gender jnput code start-->
                                    <div class="form-row">
                                        <div class="col-auto dropdown">
                                            <select type="text" name="gender" class="form-control my-3 p-3 dropdown-toggle" data-bs-toggle="dropdown" required>    
                                            <option selected disabled class="dropdown-menu" aria-labelledby="dropdownMenuButton1"> Select Gender </option>
                                                <option value="Laki -laki" class="dropdown-item">Laki-laki</option>
                                                <option value="Perempuan" class="dropdown-item">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!--gender input code end-->

                                    <!--email jnput code start-->
                                    <div class="form-row">
                                        <div class="col-auto">
                                            <input type="text" name="email" class="form-control my-3 p-3" placeholder="please input your email" required>
                                        </div>
                                    </div>
                                    <!--email input code end-->


                                    <!--username jnput code start-->
                                    <div class="form-row">
                                        <div class="col-auto">
                                            <input type="text" name="username" class="form-control my-3 p-3" placeholder="please input your username" required>
                                        </div>
                                    </div>
                                    <!--username input code end-->

                                    <!--password jnput code start-->
                                    <div class="form-row">
                                        <div class="col-auto">
                                            <input type="password" name="password" class="form-control my-3 p-3" placeholder="please input your password" required>
                                        </div>
                                    </div>
                                    <!--password input code end-->

                                    <!--level jnput code start-->
                                    <div class="form-row">
                                        <div class="col-auto">
                                            <input type="hidden" name="level" value="Siswa" class="form-control my-3 p-3" required>
                                        </div>
                                    </div>
                                    <!--level input code end-->
                                </div>
                                <!--button code start-->
                                <div class="form-row col-lg-12">
                                    <div class="col-auto">
                                        <button type="submit" name="proses" class="btn1 mt-3 mb-4">Register</button>
                                    </div>
                                </div>
                                <!--button code end--> 
                            </div>    

                                                       

                            <div class="mb-5">
                                <a href="newpass.php" style="text-decoration: none;">Forgot password</a>
                                <p>Sudah punya akun? <a href="index.php" style="text-decoration: none;">Login</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>




        <!-- js script start -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
        <!-- js script end -->
  </body>
</html>