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
                <div class="container" style="margin-top: 130px; margin-bottom: 210px;">
                   <div class="col-lg-7">
                      <form class="input-group mb-3" action="" method="post">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-search" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" placeholder="Cari data" name="query" aria-label="Cari data" aria-describedby="button-addon2">
                      </form>
                    </div>
                  <div class="table-responsive mt-5">
                    <table id="recent-purchases-listing" class="table">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>NIS</th>
                          <th>Kode Buku</th>
                          <th>Username</th>
                          <th>Judul</th>
                          <th>Penulis</th>
                          <th>Tanggal Peminjaman</th>
                          <th>Tanggal Pengembalian</th>
                          <th>Status</th>
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
                          $select = mysqli_query($koneksi,"SELECT * FROM peminjaman WHERE username = '$_SESSION[username]'");
                        }
                        $nomor = $halaman_awal+1;
                        while($data=mysqli_fetch_array($select)){

                      ?>
                        <tr>
                            <td><?php echo $nomor++; ?></td>
                            <td><?php echo $data['nis'];?></td>
                            <td><?php echo $data['kode_buku'];?></td>
                            <td><?php echo $data['username'];?></td>
                            <td><?php echo $data['judul_buku'];?></td>
                            <td><?php echo $data['penulis'];?></td>
                            <td><?php echo $data['tanggal_peminjaman'];?></td>
                            <td><?php echo $data['tanggal_pengembalian'];?></td>
                            <td>Dipinjam</td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                    <div class="Card__content">
                      <div class="Card__content-text">

                        <?php
                          $data_buku = mysqli_query($koneksi,"SELECT * FROM peminjaman WHERE username= '$_SESSION[username]'");

                          // menghitung data barang
                          $jumlah_buku = mysqli_num_rows($data_buku);
                        ?>
                        <p> <b><?php echo $jumlah_buku;?></b> result </p>

                      </div>
                    </div>
                  </div>
                </div>
        <!-- content-wrapper ends -->
