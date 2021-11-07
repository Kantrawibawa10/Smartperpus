
        <style>
            *{
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            .row{
                background: white;
                box-shadow: 12px 12px 22px grey;
                width: 90%;
                margin: auto;
                margin-top: 75px;
                margin-bottom: 80px;
            }


            .text-logo{
                display: inline-block;
                line-height: -60px;
                margin-top: 25px;
            }

            .bg{
                background-size: cover;
                background-position: center;
                width: 70%;
                height: 70%;
            }

            .back a{
              background: #fff;
              border-radius: 50%;
              padding: 4px 10px;
              border: 1px solid gray;
              color: black;
              position: absolute;
              z-index: 10000;
              margin-left: 930px;
              margin-top:  15px;
              transition: 0.5s;
            }

            .back a:hover{
              color: white;
              background: black;
            }

        </style>
    </head>
        <?php

        include "koneksi.php";
        $sql=mysqli_query($koneksi, "select * from master_buku where kode_buku='$_GET[kode_buku]' ");
        $data=mysqli_fetch_array($sql);

        ?>

        <section class="my-5 mx-5 mt-5">
            <div class="container">

                <div class="row no-gutters">
                    <div class="back mb-0">
                      <a href="perpustakaan.php?halaman=buku"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                    </div>

                    <div class="col-lg-5 mt-3 px-5">
                        <img src="foto_buku/<?php echo $data['foto_buku']; ?>" alt="" class="img-fluid bg my-4 mx-5 mt-5">
                    </div>


                    <div class="col-lg-7 pt-5">
                        <!--start logo-->
                        <div class="logo-bx">
                            <div class="text-logo">
                                <h3 class="font-weight-bold py-2"><span style="font-size: 20px; font-weight:200;">Judul:</span> <br> <?php echo $data['judul_buku']; ?>
                                <br><span style="font-size: 16px; font-weight:100;">Penulis:</span><br><span style="font-size: 20px;"><?php echo $data['penulis']; ?></span></h3>
                                <div style="margin-left: -15px;">
                                    <div class="col">
                                        <td>
                                            <span style="font-weight: 600;">Kode Buku:</span>
                                            <span style="font-weight: 100; color:gray; margin-left: 27px;"><?php echo $data['kode_buku']; ?></span>
                                        </td>
                                    </div>

                                    <div class="col">
                                        <td>
                                            <span style="font-weight: 600;">Halaman:</span>
                                            <span style="font-weight: 100; color:gray; margin-left: 47px;"><?php echo $data['halaman']; ?></span>
                                        </td>
                                    </div>

                                    <div class="col">
                                        <td>
                                            <span style="font-weight: 600;">Tahun Terbit:</span>
                                            <span style="font-weight: 100; color:gray; margin-left: 19px;"><?php echo $data['tgl_terbit']; ?></span>
                                        </td>
                                    </div>

                                    <div class="col mb-3">
                                        <td>
                                            <span style="font-weight: 600;">Penerbit:</span>
                                            <span style="font-weight: 100; color:gray; margin-left: 50px;"><?php echo $data['penerbit']; ?></span>
                                        </td>
                                    </div>

                                    <div class="col-9 mb-3"  style="overflow-x: hidden; overflow-y: scroll; width:100%px; height:20vh;">
                                        <td>
                                            <span style="font-weight: 600;">Deskripsi:</span><br>
                                            <span style="font-weight: 100; color:gray; text-align: justify;"><?php echo $data['deskripsi']; ?></span>
                                        </td>
                                    </div>
                                </div>
                            </div>



                            <!--button code start-->
                            <div class="form-row justify-content-end mb-4 mt-4" style="margin-left: 300px;">
                                <div class="card-body d-flex" style="margin-top: -25px;">
                                    <div class="d-flex" style="margin-right: 10px;">
                                    <a href="perpustakaan.php?halaman=pinjam&kode_buku=<?php echo $data['kode_buku']; ?>" class="btn btn-dark mr-2">Pinjam</a>
                                    </div>
                                    <div class="d-flex">
                                    <a href="#" class="btn"><i class="fa fa-bookmark" style="font-size: 20px;  position:absolute;" aria-hidden="true"></i></a>
                                    <a href="" class="btn"><i class="fa fa-share-alt" style="font-size: 20px;  position:absolute;" aria-hidden="true"></i></a>
                                    <a href="#" class="btn"><i class="fa fa-heart text-danger" style="font-size: 20px;" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!--button code end-->
                        </div>
                        <!--end logo-->

                    </div>

                </div>
            </div>
        </section>
