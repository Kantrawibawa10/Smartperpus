<!--home admin-->
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
                    <h2>Selamat Datang <?php echo $_SESSION['level'] = "Petugas"; ?></h2>
                    <p class="mb-md-0">Selamat Bekerja Dengan Baik.</p>
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



          <!--end table pinjaman & pengembalian-->
          <div class="row">
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Buku yang sering di pinjam</h4>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Judul</th>
                          <th>Penulis</th>
                          <th>Tahun Terbit</th>
                          <th>Ranting</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $ambil=$koneksi->query("SELECT * FROM master_buku"); ?>
		                  <?php While($data = $ambil ->fetch_assoc()){; ?>
                        <tr>
                          <td><?php echo $data['judul_buku']; ?></td>
                          <td><?php echo $data['penulis']; ?></td>
                          <td><?php echo $data['tgl_terbit']; ?></td>
                          <td><label class="badge badge-success">Terbaik</label></td>
                        </tr>
                        <?php }?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Siswa</h4>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Username</th>
                          <th>Kelas</th>
                          <th>NIS</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $ambil=$koneksi->query("SELECT * FROM data_siswa"); ?>
		                  <?php While($data= $ambil ->fetch_assoc()){; ?>
                        <tr>
                          <td><?php echo $data['name']; ?></td>
                          <td><?php echo $data['kelas']; ?></td>
                          <td><?php echo $data['nis']; ?> </td>
                          <td><label class="badge badge-warning">Siswa</label></td>
                        </tr>
                        <?php }?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
            <!--end table pinjaman & pengembalian-->

          <div class="row">
            <div class="col-md-12 stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Daftar Buku</p>
                  <div class="table-responsive">
                    <table id="recent-purchases-listing" class="table">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Judul</th>
                          <th>Penulis</th>
                          <th>Jumlah Halaman</th>
                          <th>Tahun Terbit</th>
                          <th>Penerbit</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $ambil=$koneksi->query("SELECT * FROM master_buku"); ?>

		                    <?php
                        $nomor = $halaman_awal+1;
                        While($data = $ambil ->fetch_assoc()){;
                        ?>
                        <tr>
                          <td><?php echo $nomor++; ?></td>
                          <td><?php echo $data['judul_buku']; ?></td>
                          <td><?php echo $data['penulis']; ?></td>
                          <td><?php echo $data['halaman']; ?></td>
                          <td><?php echo $data['tgl_terbit']; ?></td>
                          <td><?php echo $data['penerbit']; ?></td>
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
<!-- home admin ends -->
