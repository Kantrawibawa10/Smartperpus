<?php
    include "koneksi.php";
?>
        <style>
            *{
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            #card{
                background: white;
                box-shadow: 12px 12px 22px grey;
                width: 90%;
                margin: auto;
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

        </style>
    </head>

    <body>
        <?php

        include "koneksi.php";

        $sql=mysqli_query($koneksi, "select * from master_buku where kode_buku='$_GET[kode_buku]'");
        $data=mysqli_fetch_array($sql);

        if($data['stok']<=0){
            echo "<script>alert('Buku kosong'); window.location.href='perpustakaan.php?halaman=buku';</script>";
        }elseif($data['stok']>=0){
            $sql=mysqli_query($koneksi, "select * from master_buku where kode_buku='$_GET[kode_buku]' ");
        }


        ?>

        <section class="my-5 mx-5">
            <div class="container">
                <div class="row no-gutters" id="card">
                    <div class="col-lg-5 mt-3 px-5">
                        <img src="foto_buku/<?php echo $data['foto_buku']; ?>" alt="" class="img-fluid bg my-4 mx-5 mt-5">
                    </div>

                    <div class="col-lg-7 pt-3">
                        <!--start logo-->
                        <div class="logo-bx">
                            <div class="text-logo">
                                <h3 class="font-weight-bold py-3"><span style="font-size: 20px; font-weight:200;">Judul:</span> <br> <?php echo $data['judul_buku']; ?>
                                <br><span style="font-size: 16px; font-weight:100;">Kode Buku:</span><br><span style="font-size: 20px;"><?php echo $data['kode_buku']; ?></span></h3>
                                <div style="margin-left: -15px;">

                            </div>
                            <form class="row g-3 " enctype="multipart/form-data"  action="" method="POST">
                                <div class="col-md-5">
                                    <label for="inputEmail4" class="form-label">Username</label>
                                    <input type="text" name="username" class="form-control" placeholder="input username" required value="<?php echo $_SESSION['username']; ?>">
                                </div>

                                <div class="col-md-5">
                                    <label for="inputPassword4" class="form-label">NIS</label>
                                    <input type="text" name="nis" class="form-control" placeholder="input nis" required>
                                </div>

                                <div class="col-md-10">
                                    <td>
                                        <label for="inputPassword4" class="form-label">Tanggal Peminjaman</label>
                                        <input type="date" name="tanggal_peminjaman"  class="form-control" placeholder="" required>
                                    </td>
                                </div>

                                <!--<div class="col-md-5">
                                    <td>
                                        <label for="inputPassword4" class="form-label">Tanggal Pengembalian</label>
                                        <input type="date" name="tanggal_pengembalian" class="form-control" placeholder="">
                                    </td>
                                </div>-->

                                <div class="col-md-5">
                                    <input type="hidden" name="judul_buku" class="form-control" value="<?php echo $data['judul_buku']; ?>">
                                    <input type="hidden" name="kode_buku" class="form-control" value="<?php echo $data['kode_buku']; ?>">
                                    <input type="hidden" name="penulis" class="form-control" value="<?php echo $data['penulis']; ?>">
                                    <input type="hidden" name="halaman" class="form-control" value="<?php echo $data['halaman']; ?>">
                                    <input type="hidden" name="stok" class="form-control" value="1">
                                </div>


                                <!--button code start-->
                                <div class="form-row justify-content-end mb-4 mt-5" style="margin-left: 300px;">
                                    <div class="card-body d-flex" style="margin-top: -45px;">
                                        <div class="d-flex" style="margin-right: 10px;">
                                        <input class="btn btn-dark mr-2" type="submit" name="proses" value="Pinjam">
                                        <a href="perpustakaan.php?halaman=buku" class="btn btn-danger mr-2">Kembali</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!--button code end-->
                            <?php


                            if (isset($_POST['proses'])) {

                                include 'koneksi.php';
                                $nis = $_POST['nis'];
                                $kode_buku = $_POST['kode_buku'];
                                $username = $_POST['username'];
                                $judul_buku = $_POST['judul_buku'];
                                $penulis = $_POST['penulis'];
                                $halaman = $_POST['halaman'];
                                $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
                                $tanggal_pengembalian = strtotime("+5 day", strtotime($tanggal_peminjaman)); // +7 hari dari tgl peminjaman
                                $tanggal_pengembalian = date('Y-m-d', $tanggal_pengembalian); // format tgl peminjaman tahun-bulan-hari
                                $stok = $_POST['stok'];

                                $query = $koneksi->query("INSERT INTO peminjaman (nis, kode_buku, username, judul_buku, penulis, halaman,
                                tanggal_peminjaman, tanggal_pengembalian, stok) VALUES ('$nis', '$kode_buku', '$username', '$judul_buku',
                                '$penulis', '$halaman', '$tanggal_peminjaman', '$tanggal_pengembalian', '$stok')");

                                if($query) {
                                    echo "<script>alert('Berhasil Meminjam buku'); window.location.href='perpustakaan.php?halaman=peminjaman';</script>";
                                } else {
                                    echo "<script>alert('Gagal meminjam!');</script>";
                                }

                            } else { }

                            ?>
                        </div>
                        <!--end logo-->
                    </div>
                </div>
            </div>
        </section>
  </body>
