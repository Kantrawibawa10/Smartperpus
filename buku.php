   <style>
   .input-group{
      width: 100%;
      margin: auto;
      max-width: 98%;
      border-radius: 10px;
      background: rgb(211, 211, 211, 0.5);
      padding: 2px;
    }

    .form-control-search{
      background: rgb(211, 211, 211, 0.5);
      border: 0 !important;
      border-radius: 30px !important;
      margin: 2px;
      box-shadow: none !important
    }


    .input-group-text{
      width: 100px;
      margin-left: 715px;
      border: 0 !important;
      background: rgb(0, 0, 0, 0.5) !important;
      padding: 0 25px !important;
      border-radius: 10px !important;
      box-shadow: none !important;
    }

   </style>
   <div class="container">
      <!--search start-->
      <div class="container mt-5">
        <form action="" method="post">
          <div class="input-group">
            <i class="fa fa-search text-secondary" aria-hidden="true" style="font-size: 25px; padding: 5px 5px 10px 12px;"></i>
            <input class="form-control-search" style="background: transparent;" name="query" placeholder="Explore your book" autocomplete="off">
            <div class="input-group-append">
              <button type="submit" name="submit" class="input-group-text btn" style="color: white;">Search</button>
            </div>
          </div>
        </form>
      </div>
      <!--search end-->



    <div class="container">
      <div class="content mt-5">

            <div class="d-flex mt-5 category">
              <div class="box">
                <div class="content-box">
                  <img src="img/icon/8-books.png" alt="" class="box-category">
                  <div class="title">
                    <span>Category</span>
                  </div>
                </div>
              </div>

              <div class="box">
                <div class="content-box">
                  <img src="img/icon/0-chemical.png" alt="" class="box-category">
                  <div class="title">
                    <span>Category</span>
                  </div>
                </div>
              </div>

              <div class="box">
                <div class="content-box">
                  <img src="img/icon/6-blackboard.png" alt="" class="box-category">
                  <div class="title">
                    <span>Category</span>
                  </div>
                </div>
              </div>

              <div class="box">
                <div class="content-box">
                  <img src="img/icon/3-diploma.png" alt="" class="box-category">
                  <div class="title">
                    <span>Category</span>
                  </div>
                </div>
              </div>
          </div>
        </div>


        <!--card book start-->
        <div class="row no-gutters">
          <?php
            $query = $_POST['query'];
            if($query != ''){
              $select = mysqli_query($koneksi, "SELECT * FROM master_buku WHERE judul_buku LIKE '%$query%' OR
              penulis LIKE '%$query%'");
            }else{
              $select = mysqli_query($koneksi,"SELECT * FROM master_buku");
            }
            if(mysqli_num_rows($select)){
            while($data=mysqli_fetch_array($select)):


          ?>
            <!--card book start-->
            <div class="col-lg-3" style="width: 15rem;">
              <div class="card-body text-center mt-4 mx-1" style="width: 13rem;">
                <img src="foto_buku/<?php echo $data['foto_buku']; ?>" class="card-img-top" style="width: 160px; height: 250px;" alt="...">
                <div class="card-body">
                  <h5 class="card-title" style="font-size: 15px;"><?php echo $data['judul_buku'];?></h5>
                  <p class="card-text text-secondary" style="font-size: 11px;"><?php echo $data['penulis'];?></p>
                </div>
              </div>

              <div class="card-body d-flex" style="margin-top: -25px;">
                <div class="d-flex" style="margin-right: 10px;">
                  <a href="perpustakaan.php?halaman=detail&kode_buku=<?php echo $data['kode_buku']; ?>" class="btn btn-dark mr-2">Detail</a>
                </div>
                <div class="d-flex">
                  <a href="#" class="btn"><i class="fa fa-bookmark" style="font-size: 20px;  position:absolute;" aria-hidden="true"></i></a>
                  <a href="" class="btn"><i class="fa fa-share-alt" style="font-size: 20px;  position:absolute;" aria-hidden="true"></i></a>
                  <a href="#" class="btn"><i class="fa fa-heart text-danger" style="font-size: 20px;" aria-hidden="true"></i></a>
                </div>
              </div>
            </div>
            <?php endwhile;}else{

            } ?>
          </div>
        <!--card book end-->
        <div class="mb-5"></div>
      </div>
    </div>
