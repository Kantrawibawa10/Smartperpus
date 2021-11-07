<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body dashboard-tabs p-0">
        <ul class="nav nav-tabs px-4" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="sales-tab" data-toggle="tab" href="#sales" role="tab" aria-controls="sales" aria-selected="false">Pinjaman</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="purchases-tab" data-toggle="tab" href="#purchases" role="tab" aria-controls="purchases" aria-selected="false">Pengembalian</a>
          </li>
        </ul>
        <div class="tab-content py-0 px-0">
          <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
            <div class="d-flex flex-wrap justify-content-xl-between">
              <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                <i class="mdi mdi-calendar-heart icon-lg mr-3 text-primary"></i>
                <div class="d-flex flex-column justify-content-around">
                  <small class="mb-1 text-muted">Start date</small>
                    <a class="btn btn-secondary dropdown-toggle p-0 bg-transparent border-0 text-dark shadow-none font-weight-medium" href="#" role="button" id="dropdownMenuLinkA" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <h5 class="mb-0 d-inline-block"><?php echo date('d - M - Y'); ?></h5>
                    </a>
                </div>
              </div>
              <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                <i class="fa fa-users mr-3 icon-lg text-danger" aria-hidden="true"></i>
                <div class="d-flex flex-column justify-content-around">
                  <small class="mb-1 text-muted">Siswa</small>
                  <?php
                    $data_siswa = mysqli_query($koneksi,"SELECT * FROM data_siswa WHERE id_siswa");

                    // menghitung data barang
                    $jumlah_siswa = mysqli_num_rows($data_siswa);
                  ?>
                  <h5 class="mr-2 mb-0"><?php echo $jumlah_siswa;?></h5>
                </div>
              </div>
              <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                <i class="mdi mdi-eye mr-3 icon-lg text-success"></i>
                <div class="d-flex flex-column justify-content-around">
                  <small class="mb-1 text-muted">Kunjungan</small>
                  <?php
                    $data_siswa = mysqli_query($koneksi,"SELECT * FROM data_siswa WHERE id_siswa");

                    // menghitung data barang
                    $jumlah_siswa = mysqli_num_rows($data_siswa);
                  ?>
                  <h5 class="mr-2 mb-0"><?php echo $jumlah_siswa;?></h5>
                </div>
              </div>
              <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                <i class="fa fa-book mr-3 icon-lg text-warning" aria-hidden="true"></i>
                <div class="d-flex flex-column justify-content-around">
                  <small class="mb-1 text-muted">Buku</small>
                  <?php
                    $data_buku = mysqli_query($koneksi,"SELECT * FROM master_buku WHERE kode_buku");

                    // menghitung data barang
                    $jml_buku = mysqli_num_rows($data_buku);
                  ?>
                  <h5 class="mr-2 mb-0"><?php echo $jml_buku;?></h5>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="sales" role="tabpanel" aria-labelledby="sales-tab">
            <div class="d-flex flex-wrap justify-content-xl-between">
              <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                <i class="mdi mdi-calendar-heart icon-lg mr-3 text-primary"></i>
                <div class="d-flex flex-column justify-content-around">
                  <small class="mb-1 text-muted">Start date</small>
                  <div class="dropdown">
                    <a class="btn btn-secondary dropdown-toggle p-0 bg-transparent border-0 text-dark shadow-none font-weight-medium" href="#" role="button" id="dropdownMenuLinkA" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <h5 class="mb-0 d-inline-block"><?php echo date('d - M - Y'); ?></h5>
                    </a>
                  </div>
                </div>
              </div>
              <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                <i class="fa fa-users mr-3 icon-lg text-danger" aria-hidden="true"></i>
                <div class="d-flex flex-column justify-content-around">
                  <small class="mb-1 text-muted">Siswa</small>
                  <?php
                    $data_siswa = mysqli_query($koneksi,"SELECT * FROM peminjaman WHERE id");

                    // menghitung data barang
                    $jml_peminjam = mysqli_num_rows($data_siswa);
                  ?>
                  <h5 class="mr-2 mb-0"><?php echo $jml_peminjam;?></h5>
                </div>
              </div>
              <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                <i class="mdi mdi-eye mr-3 icon-lg text-success"></i>
                <div class="d-flex flex-column justify-content-around">
                  <small class="mb-1 text-muted">Kunjungan</small>
                  <?php
                    $data_siswa = mysqli_query($koneksi,"SELECT * FROM peminjaman WHERE id");

                    // menghitung data barang
                    $jml_peminjam = mysqli_num_rows($data_siswa);
                  ?>
                  <h5 class="mr-2 mb-0"><?php echo $jml_peminjam;?></h5>
                </div>
              </div>
              <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                <i class="fa fa-book mr-3 icon-lg text-warning" aria-hidden="true"></i>
                <div class="d-flex flex-column justify-content-around">
                  <small class="mb-1 text-muted">Buku</small>
                  <?php
                    $data_siswa = mysqli_query($koneksi,"SELECT * FROM peminjaman WHERE id");

                    // menghitung data barang
                    $jml_peminjam = mysqli_num_rows($data_siswa);
                  ?>
                  <h5 class="mr-2 mb-0"><?php echo $jml_peminjam;?></h5>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="purchases" role="tabpanel" aria-labelledby="purchases-tab">
            <div class="d-flex flex-wrap justify-content-xl-between">
              <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                <i class="mdi mdi-calendar-heart icon-lg mr-3 text-primary"></i>
                <div class="d-flex flex-column justify-content-around">
                  <small class="mb-1 text-muted">Start date</small>
                  <div class="dropdown">
                    <a class="btn btn-secondary dropdown-toggle p-0 bg-transparent border-0 text-dark shadow-none font-weight-medium" href="#" role="button" id="dropdownMenuLinkA" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <h5 class="mb-0 d-inline-block"><?php echo date('d - M - Y'); ?></h5>
                    </a>
                  </div>
                </div>
              </div>
              <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                <i class="fa fa-book mr-3 icon-lg text-warning" aria-hidden="true"></i>
                <div class="d-flex flex-column justify-content-around">
                  <small class="mb-1 text-muted">Buku</small>
                  <?php
                    $data_siswa = mysqli_query($koneksi,"SELECT * FROM pengembalian WHERE id_pengembalian");

                    // menghitung data barang
                    $jml_pengembalian = mysqli_num_rows($data_siswa);
                  ?>
                  <h5 class="mr-2 mb-0"><?php echo $jml_pengembalian;?></h5>
                </div>
              </div>
              <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                <i class="mdi mdi-eye mr-3 icon-lg text-success"></i>
                <div class="d-flex flex-column justify-content-around">
                  <small class="mb-1 text-muted">Kunjungan</small>
                  <?php
                    $data_siswa = mysqli_query($koneksi,"SELECT * FROM pengembalian WHERE id_pengembalian");

                    // menghitung data barang
                    $jml_pengembalian = mysqli_num_rows($data_siswa);
                  ?>
                  <h5 class="mr-2 mb-0"><?php echo $jml_pengembalian;?></h5>
                </div>
              </div>
              <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                <i class="fa fa-users mr-3 icon-lg text-danger" aria-hidden="true"></i>
                <div class="d-flex flex-column justify-content-around">
                  <small class="mb-1 text-muted">Siswa</small>
                  <?php
                    $data_siswa = mysqli_query($koneksi,"SELECT * FROM pengembalian WHERE id_pengembalian");

                    // menghitung data barang
                    $jml_pengembalian = mysqli_num_rows($data_siswa);
                  ?>
                  <h5 class="mr-2 mb-0"><?php echo $jml_pengembalian;?></h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
