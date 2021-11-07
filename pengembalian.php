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
                    <h2>Halaman Pengembalian</h2>
                    <p class="mb-md-0">Data Pengembalian Buku Siswa.</p>
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
                  <div class="row">
                      <div class="col-lg-5">
                        <p class="card-title">Daftar Pengembalian</p>
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
                          <th>No</th>
                          <th>NIS</th>
                          <th>Kode Buku</th>
                          <th>Username</th>
                          <th>Judul</th>
                          <th>Penulis</th>
                          <th>Penerbit</th>
                          <th>Tanggal Peminjaman</th>
                          <th>Tanggal Pengembalian</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $query = $_POST['query'];
                          if($query != ''){
                            $select = mysqli_query($koneksi, "SELECT * FROM pengembalian WHERE judul_buku LIKE '%$query%' OR
                            kode_buku LIKE '%$query%' OR username LIKE '%$query%' OR tanggal_peminjaman LIKE '%$query%' OR
                            tanggal_pengembalian LIKE '%$query%' OR penulis LIKE '%$query%'");
                          }else{
                            $select = mysqli_query($koneksi,"SELECT * FROM pengembalian");
                          }
                          $nomor = $halaman_awal+1;
                          while($data=mysqli_fetch_array($select)):
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
                            <td>Dikembalikan</td>
                        </tr>
                        <?php endwhile; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
