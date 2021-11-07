    <style>
        .icon-aksi:hover{
          text-decoration: none;
          color: #000;
        }

        .icon-aksi {
            padding: 0 15px 0 0;
            text-decoration: none;
            font-size: 12px;
            font-weight: 200;
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
                    <h2>Halaman Peminjaman</h2>
                    <p class="mb-md-0">Data Peminjaman Buku Siswa.</p>
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
                  <p class="card-title">Daftar Pinjaman</p>
                  <div class="row">
                      <div class="col-lg-5">
                        <button href="" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambah">
                          Tambah <span class="add">+</span>
                        </button>
                      </div>

                      <div class="col-lg-7">
                        <form class="input-group mb-3" action="" method="POST">
                          <input type="text" class="form-control" placeholder="Cari data" name="query" aria-label="Cari data" aria-describedby="button-addon2">
                          <button class="btn btn-outline-primary" type="cari" name="cari" id="button-addon2"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>
                      </div>
                  </div>

                  <div class="dropdown">
                    <a class="btn btn-secondary dropdown-toggle p-0 bg-transparent border-0 text-dark shadow-none font-weight-medium" href="#" role="button" id="dropdownMenuLinkA" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <h5 class="mb-0 d-inline-block">Peminjaman</h5>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLinkA">
                      <a class="dropdown-item" href="admin.php?halaman=keterlambatan">Keterlambatan</a>
                    </div>
                  </div>

                  <div class="table-responsive mt-2">
                    <table id="recent-purchases-listing" class="table">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>NIS</th>
                          <th>Kode Buku</th>
                          <th>Username</th>
                          <th>Judul</th>
                          <th>Penulist</th>
                          <th>Penerbit</th>
                          <th>Tanggal Peminjaman</th>
                          <th>Tanggal Pengembalian</th>
                          <th>Status</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        $query = $_POST['query'];
                        if($query != ''){
                          $select = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE judul_buku LIKE '%$query%' OR
                          kode_buku LIKE '%$query%' OR username LIKE '%$query%' OR tanggal_peminjaman LIKE '%$query%' OR
                          tanggal_pengembalian LIKE '%$query%' OR penulis LIKE '%$query%'");
                        }else{
                          $select = mysqli_query($koneksi,"SELECT * FROM peminjaman WHERE CURDATE() <= tanggal_pengembalian");
                        }
                        $nomor = $halaman_awal+1;
                        while($data=$select->fetch_assoc()){

                      ?>
                        <tr>
                            <td><?php echo $nomor++; ?></td>
                            <td><?php echo $data['nis'];?></td>
                            <td><?php echo $data['kode_buku'];?></td>
                            <td><?php echo $data['username'];?></td>
                            <td><?php echo $data['judul_buku'];?></td>
                            <td><?php echo $data['penulis'];?></td>
                            <td><?php echo $data['penerbit'];?></td>
                            <td><?php echo $data['tanggal_peminjaman'];?></td>
                            <td><?php echo $data['tanggal_pengembalian'];?></td>
                            <td class="text-success">Dipinjam</td>
                            <td>
                              <a href="pindah_data.php?id=<?php echo $data['id']; ?>" class="icon-aksi bg-warning">Dikembalikan</a>
                            </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->


        <!--pop up modal tambah-->
        <div class="modal fade" id="ModalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form method="POST">

                    <div class="mb-3">
                        <label class="col-form-label">Kode:</label>
                        <select type="text" name="kode_buku" class="form-control"  required>
                          <option selected disabled class="dropdown-menu"> Masukan Kode Buku </option>
                          <?php
                            $select = mysqli_query($koneksi,"SELECT kode_buku FROM master_buku");
                            while($data=mysqli_fetch_array($select)):
                          ?>
                          <option multiple><?php echo $data['kode_buku']?></option>
                          <?php endwhile; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="col-form-label">NIS:</label>
                        <select type="text" name="nis" class="form-control"  required>
                          <option selected disabled class="dropdown-menu"> Masukan NIS Siswa </option>
                          <?php
                            $select = mysqli_query($koneksi,"SELECT nis FROM data_siswa");
                            while($data=mysqli_fetch_array($select)):
                          ?>
                          <option multiple><?php echo $data['nis']?></option>
                          <?php endwhile; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="col-form-label">Username:</label>
                        <select type="text" name="username" class="form-control dropdown-toggle"  required>
                          <option selected disabled class="dropdown-menu" > Masukan Username siswa </option>
                          <?php
                            $select = mysqli_query($koneksi,"SELECT username FROM data_siswa");
                            while($data=mysqli_fetch_array($select)):
                          ?>
                          <option multiple><?php echo $data['username']?></option>
                          <?php endwhile; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="col-form-label">Judul:</label>
                        <select type="text" name="judul_buku" class="form-control dropdown-toggle"  required>
                          <option selected disabled class="dropdown-menu" > Masukan Judul Buku </option>
                          <?php
                            $select = mysqli_query($koneksi,"SELECT judul_buku FROM master_buku");
                            while($data=mysqli_fetch_array($select)):
                          ?>
                          <option multiple><?php echo $data['judul_buku']?></option>
                          <?php endwhile; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="col-form-label">Penulis:</label>
                        <select type="text" name="penulis" class="form-control dropdown-toggle"  required>
                          <option selected disabled class="dropdown-menu" > Masukan Penulis Buku </option>
                          <?php
                            $select = mysqli_query($koneksi,"SELECT penulis FROM master_buku");
                            while($data=mysqli_fetch_array($select)):
                          ?>
                          <option multiple><?php echo $data['penulis']?></option>
                          <?php endwhile; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="col-form-label">Penerbit:</label>
                        <select type="text" name="penerbit" class="form-control dropdown-toggle"  required>
                          <option selected disabled class="dropdown-menu" > Masukan Penulis Buku </option>
                          <?php
                            $select = mysqli_query($koneksi,"SELECT penerbit FROM master_buku");
                            while($data=mysqli_fetch_array($select)):
                          ?>
                          <option multiple><?php echo $data['penerbit']?></option>
                          <?php endwhile; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="col-form-label">Tanggal Peminjaman:</label>
                        <input type="date" name="tanggal_peminjaman" class="form-control" required>
                    </div>


                    <input type="hidden" name="stok" class="form-control" value="1">


                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" name="tambah" class="btn btn-primary">Pinjam</button>
                    </div>
                  </form>
                </div>
              </div>
          </div>
        </div>



<?php

if (isset($_POST['tambah'])) {

      include 'koneksi.php';
      $nis = $_POST['nis'];
      $kode_buku = $_POST['kode_buku'];
      $username = $_POST['username'];
      $judul_buku = $_POST['judul_buku'];
      $penulis = $_POST['penulis'];
      $penerbit = $_POST['penerbit'];
      $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
      $tanggal_pengembalian = strtotime("+5 day", strtotime($tanggal_peminjaman)); // +7 hari dari tgl peminjaman
      $tanggal_pengembalian = date('Y-m-d', $tanggal_pengembalian); // format tgl peminjaman tahun-bulan-hari
      $stok = $_POST['stok'];

      $cek = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE nis='$nis'") or die(mysqli_error($koneksi));

      if(mysqli_num_rows($cek) == 0){

      $sql = $koneksi->query("INSERT INTO peminjaman (nis, kode_buku, username, judul_buku, penulis, penerbit,
      tanggal_peminjaman, tanggal_pengembalian, stok) VALUES ('$nis', '$kode_buku', '$username', '$judul_buku',
      '$penulis', '$penerbit', '$tanggal_peminjaman', '$tanggal_pengembalian', '$stok')");

      if($sql) {
          echo "<script>alert('Berhasil Meminjam buku'); window.location.href='admin.php?halaman=peminjaman';</script>";
      }
      else {
          echo "<script>alert('Gagal meminjam!');</script>";
      }
      }else{
          echo "<script>alert('Siswa ini sudah meminjam buku!');</script>";
      }



  } else { }


?>
