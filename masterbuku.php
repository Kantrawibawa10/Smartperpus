    <style>
        .icon-aksi{
            padding: 0 15px 0 0;
            font-size: 18px;
        }

        .icon-aksi i{
            padding: 4px;
            border-radius: 10px;
            color: #000;
        }

        .add{
            font-size: 18px;
        }
    </style>
        <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                  <div class="mr-md-3 mr-xl-5">
                    <h2>Halaman Buku</h2>
                    <p class="mb-md-0">Halaman Data Buku Perpustakaan.</p>
                  </div>
                </div>
                <div class="d-flex justify-content-between align-items-end flex-wrap">
                  <button type="button" class="btn btn-light bg-white btn-icon mr-3 d-none d-md-block ">
                    <i class="mdi mdi-download text-muted"></i>
                  </button>
                  <button type="button" class="btn btn-light bg-white btn-icon mr-3 mt-2 mt-xl-0">
                    <i class="mdi mdi-clock-outline text-muted"></i>
                  </button>
                  <button type="button" class="btn btn-light bg-white btn-icon mr-3 mt-2 mt-xl-0">
                    <i class="mdi mdi-plus text-muted"></i>
                  </button>
                  <button class="btn btn-primary mt-2 mt-xl-0">Download report</button>
                </div>
              </div>
            </div>
          </div>
          <?php
              include 'pegawai/navbar.php';
           ?>

          <div class="row">
            <div class="col-md-12 stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Tambah Buku</p>
                  <div class="row">
                      <div class="col-lg-5">
                        <button href="" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambah">
                        Tambah <span class="add">+</span>
                        </button>
                      </div>

                      <div class="col-lg-7">
                        <form class="input-group mb-3" action="" method="post">
                          <input type="text" class="form-control" placeholder="Cari data" name="query" aria-label="Cari data" aria-describedby="button-addon2">
                          <button class="btn btn-outline-primary" type="cari" name="cari" id="button-addon2"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>
                      </div>
                  </div>
                  <div class="table-responsive">
                    <table id="recent-purchases-listing" class="table" >
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Gambar</th>
                          <th>Judul</th>
                          <th>Penulis</th>
                          <th>Tahun Terbit</th>
                          <th>Penerbit</th>
                          <th>Stok</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        $query = $_POST['query'];
                        if($query != ''){
                          $select = mysqli_query($koneksi, "SELECT * FROM master_buku WHERE judul_buku LIKE '%$query%' OR
                          penulis LIKE '%$query%' OR halaman LIKE '%$query%' OR tgl_terbit LIKE '%$query%' OR penerbit LIKE '%$query%'");
                        }else{
                          $select = mysqli_query($koneksi,"SELECT * FROM master_buku");
                        }
                        $nomor = $halaman_awal+1;
                        while($data=mysqli_fetch_array($select)):
                      ?>
                        <tr>
                            <td><?php echo $nomor++; ?></td>
                            <td>
                             <img src="foto_buku/<?php echo $data['foto_buku']; ?>">
                            </td>
                            <td><?php echo $data['judul_buku']; ?></td>
                            <td><?php echo $data['penulis']; ?></td>
                            <td><?php echo $data['tgl_terbit']; ?></td>
                            <td><?php echo $data['penerbit']; ?></td>
                            <td><?php echo $data['stok']; ?></td>
                            <td class="d-flex">
                                <!--view-->
                              <a data-bs-toggle="modal" data-bs-target="#view<?php echo $data['kode_buku']; ?>" style="cursor:pointer;" class="icon-aksi"><i class="fa fa-eye bg-success" aria-hidden="true"></i></a>
                              <!--edit-->
                              <a data-bs-toggle="modal" data-bs-target="#edit<?php echo $data['kode_buku']; ?>" style="cursor:pointer;" class="icon-aksi"> <i class="fa fa-pencil-square-o bg-warning" aria-hidden="true"></i></a>
                              <!--deleted-->
                              <a href="admin.php?halaman=buku&kode_buku=<?= $data['kode_buku']; ?>" class="icon-aksi" style="cursor:pointer;"><i class="fa fa-trash bg-danger" aria-hidden="true"></i></a>
                              <!--deleted end-->
                            </td>
                        </tr>
                      </tbody>
                      <?php endwhile; ?>
                    </table>

                    <!--deleted--->
                      <?php
                        if(isset($_GET['kode_buku'])){
                            $select = mysqli_query($koneksi,"SELECT * FROM master_buku WHERE kode_buku='$_GET[kode_buku]'");
                            $data = $select->fetch_assoc();
                            $fotobuku = $data['foto_buku'];
                            if (file_exists("foto_buku/$fotobuku"))
                            {
                                unlink("foto_buku/$fotobuku");
                            }

                            mysqli_query($koneksi,"DELETE FROM master_buku WHERE kode_buku='$_GET[kode_buku]'");

                            echo "<script>alert('Data berhasil di hapus ');</script>";
                            echo "<script>location='admin.php?halaman=buku';</script>";
                        }
                      ?>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->


        <!--start style css-->
            <style>
                /*img uplod form input start */
                .image_upload{
                    position: relative;
                    overflow: hidden;
                    width: 150px;
                    height: 200px;
                }


                .img-upload .foto-upload{
                    z-index: 2;
                    width: 150px;
                    height: 200px;
                    transition: 0.5s;
                    position: absolute;
                    background-position: center;
                    background-size: cover;
                    cursor: pointer;
                    background: url(img/buku.png);
                    background-position: center;
                    background-size: cover;

                }

                .img-upload .foto-upload:hover{
                    -webkit-transform: scale(1.08);
                    transform: scale(1.30);
                    opacity: 50%;
                }

                .img-upload .btn-input input[type="file"] {
                    display: none;
                }

                .img-upload .btn-input{
                    width: 150px;
                    height: 200px;
                    background: black;
                    position: relative;
                    display: inline-block;
                    cursor: pointer;
                }

                .img-upload .btn-input{
                    font-size: 24px;
                    color: #ffffff;
                    padding: 70px 37px;
                    text-align: center;
                    line-height: 30px;
                }
                /*img uplod form input end */

                /*img edit form input start */
                .image_edit{
                    position: relative;
                    overflow: hidden;
                    width: 150px;
                    height: 200px;
                }


                .img-edit .foto-edit{
                    z-index: 2;
                    width: 150px;
                    height: 200px;
                    transition: 0.5s;
                    position: absolute;
                    background-position: center;
                    background-size: cover;
                    cursor: pointer;
                }

                .img-edit .foto-edit:hover{
                    -webkit-transform: scale(1.08);
                    transform: scale(1.30);
                    opacity: 50%;
                }

                .img-edit .btn-input input[type="file"] {
                    display: none;
                }

                .img-edit .btn-input{
                    width: 150px;
                    height: 200px;
                    background: black;
                    position: relative;
                    display: inline-block;
                    cursor: pointer;
                }

                .img-edit .btn-input{
                    font-size: 24px;
                    color: #ffffff;
                    padding: 70px 37px;
                    text-align: center;
                    line-height: 30px;
                }
                /*img edit form input end */

                /*img view form start */
                .image_view{
                    position: relative;
                    overflow: hidden;
                    width: 180px;
                    height: 270px;
                }


                .img-view .foto-view{
                    z-index: 2;
                    width: 180px;
                    height: 270px;
                    transition: 0.5s;
                    background-position: center;
                    background-size: cover;
                    background: url(img/profil.png);
                    background-position: center;
                    background-size: cover;
                }

                .img-view .foto-view:hover{
                    -webkit-transform: scale(1.08);
                    transform: scale(1.30);
                }
                /*img view form end */

                .alamat{
                  margin-left:  28vh;
                }
            </style>
          <!--end style css-->

    <!------------------------------------------------------------------------------------------------------------------------------------
    ---------------------------------------------------FORM TAMBAH START-------------------------------------------------------------------
    -------------------------------------------------------------------------------------------------------------------------------------->
    <div class="modal fade" id="ModalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="POST" enctype="multipart/form-data">

                <div class="mb-2">
                    <label class="col-form-label">Foto:</label><br>
                    <p class="image_upload">
                        <label class="img-upload">
                            <img alt="" class="foto-upload">
                            <label class="btn-input">
                                <input type="file" name="foto">
                                <i class="fa fa-camera" aria-hidden="true"></i>
                                Upload
                            </label>
                        </label>
                    </p>
                </div>

                <div class="mb-3">
                    <label class="col-form-label">Kode:</label>
                    <input type="text" class="form-control" name="kode_buku" placeholder="Tambahkan Kode Buku" required>
                </div>

                <div class="mb-3">
                    <label class="col-form-label">Judul:</label>
                    <input type="text" class="form-control" name="judul_buku" placeholder="Tambahkan Judul Buku" required>
                </div>

                <div class="mb-3">
                    <label class="col-form-label">Penulis:</label>
                    <input type="text" class="form-control" name="penulis" placeholder="Tambahkan Penulis Buku" required>
                </div>

                <div class="mb-3">
                    <label class="col-form-label">Penerbit:</label>
                    <input type="text" class="form-control" name="penerbit" placeholder="Tambahkan Penerbit Buku" required>
                </div>

                <div class="mb-3">
                    <label class="col-form-label">Tahun Terbit:</label>
                    <input type="date" class="form-control" name="tgl_terbit" placeholder="Tambahkan Tahun Terbit" required>
                </div>

                <div class="mb-3">
                    <label class="col-form-label">Halaman:</label>
                    <input type="number" class="form-control" name="halaman" placeholder="Masukan Halaman Buku" required>
                </div>

                <div class="mb-3">
                    <label class="col-form-label">Stok:</label>
                    <input type="number" class="form-control" name="stok" placeholder="Tambahkan Stok Buku" required>
                </div>

                <div class="mb-3">
                    <label class="col-form-label">Deskripsi:</label>
                    <textarea class="form-control" name="deskripsi" placeholder="Tambahkan Deskripsi di sini"></textarea>
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
                </div>
              </form>
            </div>
          </div>
      </div>
    </div>

    <!---php start code----->
    <?php
        if(isset($_POST['tambah'])){
            $nama = $_FILES['foto']['name'];
            $lokasi = $_FILES['foto']['tmp_name'];
            move_uploaded_file($lokasi,"foto_buku/".$nama);

            $cek = mysqli_query($koneksi, "SELECT * FROM master_buku WHERE kode_buku='$kode_buku'") or die(mysqli_error($koneksi));

            if(mysqli_num_rows($cek) == 0){

              $sql = $koneksi->query("INSERT INTO master_buku(kode_buku,foto_buku,judul_buku,penulis,halaman,tgl_terbit,penerbit,deskripsi,stok)
              VALUES('$_POST[kode_buku]','$nama','$_POST[judul_buku]','$_POST[penulis]','$_POST[halaman]','$_POST[tgl_terbit]','$_POST[penerbit]','$_POST[deskripsi]','$_POST[stok]')") or die(mysqli_error($koneksi));

              if($sql){
                echo '<script>alert("Berhasil menambahkan data."); document.location="admin.php?halaman=buku";</script>';
              }else{
                echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
              }
              }else{
                echo '<div class="alert alert-warning">Gagal, Kode sudah terdaftar.</div>';
            }


        }
    ?>

    <!---php end code----->
    <!------------------------------------------------------------------------------------------------------------------------------------
    ---------------------------------------------------FORM TAMBAH END-------------------------------------------------------------------
    -------------------------------------------------------------------------------------------------------------------------------------->


        <!------------------------------------------------------------------------------------------------------------------------------------
        ---------------------------------------------------FORM EDIT START-------------------------------------------------------------------
        -------------------------------------------------------------------------------------------------------------------------------------->
        <?php
          $select = mysqli_query($koneksi, "SELECT * FROM master_buku ORDER BY kode_buku DESC ");
          while($data = mysqli_fetch_array($select)){
          $kode_buku = $data['kode_buku'];
          $foto_buku = $_POST['foto_buku'];
          $judul_buku = $_POST['judul_buku'];
          $penulis = $_POST['penulis'];
          $halaman = $_POST['halaman'];
          $tgl_terbit = $_POST['tgl_terbit'];
          $penerbit = $_POST['penerbit'];
          $deskripsi = $_POST['deskripsi'];
          $stok = $_POST['stok'];
        ?>
        <div class="modal fade" id="edit<?php echo $data['kode_buku']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form method="POST" enctype="multipart/form-data">

                    <div class="mb-2">
                        <label class="col-form-label">Foto:</label><br>
                        <p class="image_upload">
                            <label class="img-upload">
                                <img src="foto_buku/<?php echo $data['foto_buku']; ?>" alt="" class="foto-upload">
                                <label class="btn-input">
                                    <input type="file" name="foto">
                                    <i class="fa fa-camera" aria-hidden="true"></i>
                                    Upload
                                </label>
                            </label>
                        </p>
                    </div>

                    <input type="hidden" name="fotolama" value="<?php echo $data['foto_buku']; ?>">

                    <div class="mb-3">
                        <label class="col-form-label">Kode:</label>
                        <input type="text" class="form-control" name="kode_buku" placeholder="Tambahkan Kode Buku" value="<?php echo $data['kode_buku']; ?>" disabled>
                        <input type="hidden" class="form-control" name="kode_buku" placeholder="Tambahkan Kode Buku" value="<?php echo $data['kode_buku']; ?>">
                    </div>

                    <div class="mb-3">
                        <label class="col-form-label">Judul:</label>
                        <input type="text" class="form-control" name="judul_buku" placeholder="Tambahkan Judul Buku" value="<?php echo $data['judul_buku']; ?>">
                    </div>

                    <div class="mb-3">
                        <label class="col-form-label">Penulis:</label>
                        <input type="text" class="form-control" name="penulis" placeholder="Tambahkan Penulis Buku" value="<?php echo $data['penulis']; ?>">
                    </div>

                    <div class="mb-3">
                        <label class="col-form-label">Penerbit:</label>
                        <input type="text" class="form-control" name="penerbit" placeholder="Tambahkan Penerbit Buku" value="<?php echo $data['penerbit']; ?>">
                    </div>

                    <div class="mb-3">
                        <label class="col-form-label">Tahun Terbit:</label>
                        <input type="date" class="form-control" name="tgl_terbit" placeholder="Tambahkan Tahun Terbit" value="<?php echo $data['tgl_terbit']; ?>">
                    </div>

                    <div class="mb-3">
                        <label class="col-form-label">Halaman:</label>
                        <input type="number" class="form-control" name="halaman" placeholder="Masukan Halaman Buku" value="<?php echo $data['halaman']; ?>">
                    </div>

                    <div class="mb-3">
                        <label class="col-form-label">Stok:</label>
                        <input type="number" class="form-control" name="stok" placeholder="Tambahkan Stok Buku" value="<?php echo $data['stok']; ?>">
                    </div>

                    <div class="mb-3">
                        <label class="col-form-label">Deskripsi:</label>
                        <textarea class="form-control" name="deskripsi" placeholder="Tambahkan Deskripsi di sini"><?php echo $data['deskripsi']; ?></textarea>
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" name="edit" class="btn btn-primary">Edit</button>
                    </div>
                  </form>
                </div>
              </div>
          </div>
        </div>
        <?php } ?>

        <?php


        if(isset($_POST['edit'])){
          $fotolama = $_POST['fotolama'];
          $ubahgambar = $_FILES['foto']['name'];
          $lokasifoto = $_FILES['foto']['tmp_name'];
          //jika foto di rubah
          if($lokasifoto)
          {
              unlink("foto_buku/".$fotolama);
              move_uploaded_file($lokasifoto,"foto_buku/".$ubahgambar);
              $query = $koneksi->query("UPDATE master_buku SET kode_buku='$_POST[kode_buku]', foto_buku='$ubahgambar', judul_buku='$_POST[judul_buku]', penulis='$_POST[penulis]', halaman='$_POST[halaman]', tgl_terbit='$_POST[tgl_terbit]', penerbit='$_POST[penerbit]', deskripsi='$_POST[deskripsi]', stok='$_POST[stok]' WHERE kode_buku='$_POST[kode_buku]'");
          }
          else
          {
              move_uploaded_file($lokasifoto,"foto_buku/".$ubahgambar);
              $query = $koneksi->query("UPDATE master_buku SET kode_buku='$_POST[kode_buku]', judul_buku='$_POST[judul_buku]', penulis='$_POST[penulis]', halaman='$_POST[halaman]', tgl_terbit='$_POST[tgl_terbit]', penerbit='$_POST[penerbit]', deskripsi='$_POST[deskripsi]', stok='$_POST[stok]' WHERE kode_buku='$_POST[kode_buku]'");
          }

            if($query){
                echo "<script>alert('Berhasil Mengubah Data!'); window.location.href='admin.php?halaman=buku';</script>";
            }else{
              echo '<div class="alert alert-warning">Gagal melakukan edit data!!</div>';
            }
        }
        ?>
      <!------------------------------------------------------------------------------------------------------------------------------------
      ---------------------------------------------------FORM EDIT END-------------------------------------------------------------------
      -------------------------------------------------------------------------------------------------------------------------------------->

      <!------------------------------------------------------------------------------------------------------------------------------------
      ---------------------------------------------------FORM VIEW START-------------------------------------------------------------------
      -------------------------------------------------------------------------------------------------------------------------------------->
      <?php
        $select = mysqli_query($koneksi, "SELECT * FROM master_buku ORDER BY kode_buku DESC ");
        while($data = mysqli_fetch_array($select)){
        $kode_buku = $data['kode_buku'];
        $foto_buku = $_POST['foto_buku'];
        $judul_buku = $_POST['judul_buku'];
        $penulis = $_POST['penulis'];
        $halaman = $_POST['halaman'];
        $tgl_terbit = $_POST['tgl_terbit'];
        $penerbit = $_POST['penerbit'];
        $deskripsi = $_POST['deskripsi'];
        $stok = $_POST['stok'];
      ?>
      <div class="modal fade" id="view<?php echo $data['kode_buku']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Buku</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mx-auto mt-4">

                    <div class="col-lg-3 mx-4">
                        <div class="from-row">
                            <p class="image_view">
                                <label class="img-view">
                                    <img src="foto_buku/<?php echo $data['foto_buku']; ?>" alt="" class="foto-view">
                                </label>
                            </p>
                        </div>
                    </div>



                    <div class="mx-4">
                        <div class="col-lg-12 d-flex" style="margin-left: -8px;">
                            <div class="form-row mb-4">
                                <div class="col-lg-12">
                                    <span class="col-form-label">Judul:</span>
                                    <h1 style="font-size: 1.5em"><?php echo $data['judul_buku']; ?></h1>
                                </div>
                            </div>
                        </div>


                        <div class="d-flex">
                          <div class="col-lg-7 mb-3">
                              <div class="form-row ">
                                  <div class="mb-3">
                                      <span class="col-form-label">Penulis:</span>
                                      <p style="font-size: 16px"><?php echo $data['penulis']; ?></p>
                                  </div>
                              </div>


                              <div class="form-row mr-5">
                                  <div class="">
                                      <span class="col-form-label">Halaman:</span>
                                      <p style="font-size: 16px"><?php echo $data['halaman']; ?></p>
                                  </div>
                              </div>
                          </div>



                          <div class="col-lg-6 mb-3">
                            <div class="form-row mb-3">
                                <div class="">
                                    <span class="col-form-label">Terbit:</span>
                                    <p style="font-size: 16px"><?php echo $data['tgl_terbit']; ?></p>
                                </div>
                            </div>

                              <div class="form-row">
                                  <div class="">
                                      <span class="col-form-label">Stok:</span>
                                      <p style="font-size: 16px"><?php echo $data['stok']; ?></p>
                                  </div>
                              </div>
                          </div>
                        </div>


                        <div class="col-lg-12 mb-3" style="margin-left: -5px;">
                          <div class="form-row">
                              <div class="col-lg-12">
                                  <span class="col-form-label">Penerbit:</span>
                                  <p style="font-size: 16px"><?php echo $data['penerbit']; ?></p>
                              </div>
                          </div>
                        </div>
                    </div>


                    <div class="mx-4 col-lg-11">
                      <div class="mb-3 form-row">
                          <div class="col-lg-12">
                              <label class="col-form-label">Deskripsi:</label>
                              <p style="font-size: 16px;" class="text-justify m-auto"><?php echo $data['deskripsi'];?></p>
                          </div>
                      </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>
      <!------------------------------------------------------------------------------------------------------------------------------------
      ---------------------------------------------------FORM VIEW END-------------------------------------------------------------------
      -------------------------------------------------------------------------------------------------------------------------------------->




        <script>
          var exampleModal = document.getElementById('exampleModal')
          exampleModal.addEventListener('show.bs.modal', function (event) {
          // Button that triggered the modal
          var button = event.relatedTarget
          // Extract info from data-bs-* attributes
          var recipient = button.getAttribute('data-bs-whatever')
          // If necessary, you could initiate an AJAX request here
          // and then do the updating in a callback.
          //
          // Update the modal's content.
          var modalTitle = exampleModal.querySelector('.modal-title')
          var modalBodyInput = exampleModal.querySelector('.modal-body input')

          modalTitle.textContent = 'New message to ' + recipient
          modalBodyInput.value = recipient
          })
        </script>
