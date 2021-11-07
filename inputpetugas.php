<?php

include 'koneksi.php';

?>
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
                    <h2>Halaman Petugas</h2>
                    <p class="mb-md-0">Halaman Data User Petugas Perpustakaan.</p>
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
                  <p class="card-title">Tambah Petugas</p>
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
                    <table id="recent-purchases-listing" class="table">
                      <thead>
                        <tr>
                          <th>Nama</th>
                          <th>Username</th>
                          <th>Alamat</th>
                          <th>Email</th>
                          <th>Gender</th>
                          <th>Telepon</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $query = $_POST['query'];
                          if($query != ''){
                            $select = mysqli_query($koneksi, "SELECT * FROM data_petugas WHERE name_petugas LIKE '%$query%' OR
                            username_petugas LIKE '%$query%' OR telpon_petugas LIKE '%$query%' OR alamat_petugas LIKE '%$query%'
                            OR email_petugas LIKE '%$query%' OR gender_petugas LIKE '%$query%'");
                          }else{
                            $select = mysqli_query($koneksi,"SELECT * FROM data_petugas");
                          }
                          while($data=mysqli_fetch_array($select)):
                        ?>
                        <tr>
                            <td><?php echo $data['name_petugas']; ?></td>
                            <td><?php echo $data['username_petugas']; ?></td>
                            <td><?php echo $data['alamat_petugas']; ?></td>
                            <td><?php echo $data['email_petugas']; ?></td>
                            <td><?php echo $data['gender_petugas']; ?></td>
                            <td><?php echo $data['telpon_petugas']; ?></td>
                            <td style="display: flex;">
                              <!--view-->
                              <a data-bs-toggle="modal" data-bs-target="#view<?php echo $data['id_petugas']; ?>" style="cursor:pointer;" class="icon-aksi"><i class="fa fa-eye bg-success" aria-hidden="true"></i></a>
                              <!--edit-->
                              <a data-bs-toggle="modal" data-bs-target="#edit<?php echo $data['id_petugas']; ?>" style="cursor:pointer;" class="icon-aksi"> <i class="fa fa-pencil-square-o bg-warning" aria-hidden="true"></i></a>
                              <!--deleted-->
                              <a href="admin.php?halaman=petugas&id_petugas=<?php echo $data['id_petugas']; ?>" class="icon-aksi" class="icon-aksi"><i class="fa fa-trash bg-danger" aria-hidden="true"></i></a>
                              <!--deleted end-->
                            </td>
                        </tr>
                      </tbody>
                        <?php endwhile; ?>
                    </table>

                    <!--deleted--->
                      <?php
                        if(isset($_GET['id_petugas'])){
                            $select = mysqli_query($koneksi,"SELECT * FROM data_petugas WHERE id_petugas='$_GET[id_petugas]'");
                            $data = $select->fetch_assoc();
                            $fotopetugas = $data['foto_petugas'];
                            if (file_exists("foto_pegawai/$fotopetugas"))
                            {
                                unlink("foto_pegawai/$fotopetugas");
                            }

                            mysqli_query($koneksi,"DELETE FROM data_petugas WHERE id_petugas='$_GET[id_petugas]'");

                            echo "<script>alert('Data berhasil di hapus ');</script>";
                            echo "<script>location='admin.php?halaman=petugas';</script>";
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
                    height: 150px;
                    border-radius: 50%;
                }


                .img-upload .foto-upload{
                    border-radius: 50%;
                    z-index: 2;
                    width: 150px;
                    height: 150px;
                    transition: 0.5s;
                    position: absolute;
                    background-position: center;
                    background-size: cover;
                    cursor: pointer;
                    background: url(img/profil.png);
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
                    height: 150px;
                    border-radius: 50%;
                    background: black;
                    position: relative;
                    display: inline-block;
                    cursor: pointer;
                }

                .img-upload .btn-input{
                    font-size: 24px;
                    color: #ffffff;
                    padding: 45px 37px;
                    text-align: center;
                    line-height: 30px;
                }
                /*img uplod form input end */

                /*img edit form input start */
                .image_edit{
                    position: relative;
                    overflow: hidden;
                    width: 150px;
                    height: 150px;
                    border-radius: 50%;
                }


                .img-edit .foto-edit{
                    border-radius: 50%;
                    z-index: 2;
                    width: 150px;
                    height: 150px;
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
                    height: 150px;
                    border-radius: 50%;
                    background: black;
                    position: relative;
                    display: inline-block;
                    cursor: pointer;
                }

                .img-edit .btn-input{
                    font-size: 24px;
                    color: #ffffff;
                    padding: 45px 37px;
                    text-align: center;
                    line-height: 30px;
                }
                /*img edit form input end */

                /*img view form start */
                .image_view{
                    position: relative;
                    overflow: hidden;
                    width: 150px;
                    height: 150px;
                    border-radius: 50%;
                }


                .img-view .foto-view{
                    border-radius: 50%;
                    z-index: 2;
                    width: 150px;
                    height: 150px;
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
                    <label class="col-form-label">NIP:</label>
                    <input type="text" class="form-control" name="nip" placeholder="Tambahkan NIP" required>
                </div>

                <div class="mb-3">
                    <label class="col-form-label">Nama:</label>
                    <input type="text" class="form-control" name="name_petugas" placeholder="Tambahkan Nama Petugas" required>
                </div>

                <div class="mb-3">
                    <label class="col-form-label">Username:</label>
                    <input type="text" class="form-control" name="username_petugas" placeholder="Tambahkan Username Petugas" required>
                </div>

                <div class="mb-3">
                    <label class="col-form-label">Alamat:</label>
                    <input type="text" class="form-control" name="alamat_petugas" placeholder="Tambahkan Alamat Petugas" required>
                </div>

                <div class="mb-3">
                    <label class="col-form-label">Email:</label>
                    <input type="text" class="form-control" name="email_petugas" placeholder="Tambahkan Email Petugas" required>
                </div>

                <div class="mb-3">
                    <label class="col-form-label">Telepon:</label>
                    <input type="text" class="form-control" name="telpon_petugas" placeholder="Tambahkan Telepon Petugas" required>
                </div>

                <div class="mb-3">
                    <label class="col-form-label">Gender:</label>
                    <select type="text" name="gender_petugas" class="form-control dropdown-toggle" data-bs-toggle="dropdown" required>
                    <option selected disabled class="dropdown-menu" aria-labelledby="dropdownMenuButton1"> Pilih Gender </option>
                        <option value="Laki - laki" class="dropdown-item">Laki-laki</option>
                        <option value="Perempuan" class="dropdown-item">Perempuan</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="col-form-label">Password:</label>
                    <input type="password" class="form-control" name="password_petugas" placeholder="Tambahkan Password" required>
                </div>

                <div class="mb-3">
                    <input type="hidden" name="level" value="Petugas" class="form-control" required>
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
        include 'koneksi.php';

        if(isset($_POST['tambah'])){
            $nama = $_FILES['foto']['name'];
            $lokasi = $_FILES['foto']['tmp_name'];
            move_uploaded_file($lokasi,"foto_pegawai/".$nama);

            $cek = mysqli_query($koneksi, "SELECT * FROM data_petugas WHERE id_petugas='$id_petugas'") or die(mysqli_error($koneksi));

            if(mysqli_num_rows($cek) == 0){

              $sql = mysqli_query($koneksi,"INSERT INTO data_petugas(nip,telpon_petugas,name_petugas,username_petugas,alamat_petugas,email_petugas,password_petugas,gender_petugas,foto_petugas,level)
              VALUES('$_POST[nip]','$_POST[telpon_petugas]','$_POST[name_petugas]','$_POST[username_petugas]','$_POST[alamat_petugas]','$_POST[email_petugas]','$_POST[password_petugas]','$_POST[gender_petugas]','$nama','$_POST[level]')") or die(mysqli_error($koneksi));

              if($sql){
                echo '<script>alert("Berhasil menambahkan data."); document.location="admin.php?halaman=petugas";</script>';
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
          $select = mysqli_query($koneksi, "SELECT * FROM data_petugas ORDER BY id_petugas DESC ");
          while($data = mysqli_fetch_array($select)){
        ?>
        <div class="modal fade" id="edit<?php echo $data['id_petugas']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <img src="foto_pegawai/<?php echo $data['foto_petugas']; ?>" alt="" class="foto-upload">
                                <label class="btn-input">
                                    <input type="file" name="foto">
                                    <i class="fa fa-camera" aria-hidden="true"></i>
                                    Upload
                                </label>
                            </label>
                        </p>
                    </div>

                    <input type="hidden" name="fotolama" value="<?php echo $data['foto_petugas']; ?>">

                    <div class="mb-3">
                        <label class="col-form-label">NIP:</label>
                        <input type="text" class="form-control" name="nip" placeholder="Tambahkan NIP" value="<?php echo $data['nip']; ?>">
                    </div>

                    <div class="mb-3">
                        <label class="col-form-label">Nama:</label>
                        <input type="text" class="form-control" name="name_petugas" placeholder="Tambahkan Nama Petugas" value="<?php echo $data['name_petugas']; ?>">
                    </div>

                    <div class="mb-3">
                        <label class="col-form-label">Username:</label>
                        <input type="text" class="form-control" name="username_petugas" placeholder="Tambahkan Username Petugas" value="<?php echo $data['username_petugas']; ?>">
                    </div>

                    <div class="mb-3">
                        <label class="col-form-label">Alamat:</label>
                        <input type="text" class="form-control" name="alamat_petugas" placeholder="Tambahkan Alamat Petugas" value="<?php echo $data['alamat_petugas']; ?>">
                    </div>

                    <div class="mb-3">
                        <label class="col-form-label">Email:</label>
                        <input type="text" class="form-control" name="email_petugas" placeholder="Tambahkan Email Petugas" value="<?php echo $data['email_petugas']; ?>">
                    </div>

                    <div class="mb-3">
                        <label class="col-form-label">Telepon:</label>
                        <input type="text" class="form-control" name="telpon_petugas" placeholder="Tambahkan Telepon Petugas" value="<?php echo $data['telpon_petugas']; ?>">
                    </div>

                    <div class="mb-3">
                        <label class="col-form-label">Gender:</label>
                        <select type="text" name="gender_petugas" class="form-control dropdown-toggle" data-bs-toggle="dropdown" value="<?php echo $data['gender_petugas']; ?>">
                        <option selected class="dropdown-menu" aria-labelledby="dropdownMenuButton1"> <?php echo $data['gender_petugas']; ?> </option>
                            <option value="Laki - laki" class="dropdown-item">Laki-laki</option>
                            <option value="Perempuan" class="dropdown-item">Perempuan</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="col-form-label">Level:</label>
                        <input type="text" name="level" value="Petugas" class="form-control" disabled>
                        <input type="hidden" name="level" value="Petugas" class="form-control" required>
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
              unlink("foto_pegawai/".$fotolama);
              move_uploaded_file($lokasifoto,"foto_pegawai/".$ubahgambar);
              $query = $koneksi->query("UPDATE data_petugas SET nip='$_POST[nip]',telpon_petugas='$_POST[telpon_petugas]', name_petugas='$_POST[name_petugas]', username_petugas='$_POST[username_petugas]', alamat_petugas='$_POST[alamat_petugas]', email_petugas='$_POST[email_petugas]', gender_petugas='$_POST[gender_petugas]', foto_petugas='$ubahgambar', level='$_POST[level]' WHERE nip='$_POST[nip]'");
          }
          else
          {
            move_uploaded_file($lokasifoto,"foto_pegawai/".$ubahgambar);
            $query = $koneksi->query("UPDATE data_petugas SET nip='$_POST[nip]',telpon_petugas='$_POST[telpon_petugas]', name_petugas='$_POST[name_petugas]', username_petugas='$_POST[username_petugas]', alamat_petugas='$_POST[alamat_petugas]', email_petugas='$_POST[email_petugas]', gender_petugas='$_POST[gender_petugas]', level='$_POST[level]' WHERE nip='$_POST[nip]'");
          }

            if($query){
                echo "<script>alert('Berhasil Mengubah Data!'); window.location.href='admin.php?halaman=petugas';</script>";
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
      $select = mysqli_query($koneksi, "SELECT * FROM data_petugas ORDER BY id_petugas DESC ");
      while($data = mysqli_fetch_array($select)){
    ?>
    <div class="modal fade" id="view<?php echo $data['id_petugas']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Pegawai</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="mb-3 from-row">
                  <p class="image_view">
                      <label class="img-view">
                          <img src="foto_pegawai/<?php echo $data['foto_petugas']; ?>" alt="" class="foto-view">
                      </label>
                  </p>
                </div>

                <div class="d-flex mt-3">
                  <div class="mb-3 col-lg-3">
                      <label class="col-form-label">NIP:</label>
                      <p><?php echo $data['nip'] ;?></p>
                  </div>

                  <div class="mb-3 col-lg-8">
                      <label class="col-form-label">Nama:</label>
                      <p><?php echo $data['name_petugas'] ;?></p>
                  </div>
                </div>

                <div class="d-flex">
                  <div class="mb-3 col-lg-3">
                      <label class="col-form-label">Username:</label>
                      <p><?php echo $data['username_petugas'] ;?></p>
                  </div>

                  <div class="mb-3 col-lg-8">
                      <label class="col-form-label">Email:</label>
                      <p><?php echo $data['email_petugas'] ;?></p>
                  </div>
                </div>

                <div class="d-flex">
                  <div class="mb-3 col-lg-3">
                      <label class="col-form-label">Telepon:</label>
                      <p><?php echo $data['telpon_petugas'] ;?></p>
                  </div>

                  <div class="mb-3 col-lg-8">
                      <label for="gender" class="col-form-label">Gender:</label>
                      <p><?php echo $data['gender_petugas'] ;?></p>
                  </div>
                </div>

                <div class="col-lg-12">
                  <div class="mb-3">
                      <label class="col-form-label">Alamat:</label>
                      <p><?php echo $data['alamat_petugas'] ;?></p>
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
