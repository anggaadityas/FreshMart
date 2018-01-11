
    <div class="container">
      <div class="row">

        <div class="col-sm-3">
          <div class="left-sidebar">

            <br><br>
            <h2>Kategori</h2>
           <div id="sidebar">
          <ul>
         <?php
         include"kategori_link_produk.php";
         ?>
          </ul>
      </div>
      <br>

            <div class="shipping text-center"><!--shipping-->
              <img src="../../img/home/pricing.png" alt="" />
            </div><!--/shipping-->

            <br>

             <div class="shipping text-center"><!--shipping-->
              <img src="../../img/home/drink.jpg" alt="" />
            </div><!--/shipping-->
        
          </div>
        </div>
<br><br>
        <div class="col-sm-9 padding-right">
            <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Detail Produk</h2>
        <br>
        <form action="php/produk_detail_data.php" name="id_barang" method="POST">
      <?php
$id = $_GET['kd'];
$show = mysql_query("SELECT * FROM produk WHERE id_produk='$id'");
  
    //jika data ditemukan, maka membuat variabel $data
    $data = mysql_fetch_assoc($show); //mengambil data ke database yang nantinya akan ditampilkan di form edit di bawah
      $d=$data['diskon_produk'];
          $hargatetap="";
          $diskon="<img src='../../img/home/sale.png' class='sale'/>";
          if ($d!= "0"){
          $sale=$diskon;
          }else{
          $sale=$tetap;
          }

        ?>

            <div class="col-sm-5">
              <div class="view-product">
      <div id="gallery" class="span3">
      <style>
      #jquery-overlay {position: absolute;top: 0;left: 0;z-index: 90;width: 100%;height: 200px;}
      #jquery-lightbox {position: absolute;top: 0;left: 0;width: 70%;z-index: 100;text-align: center;line-height: 0;}
      #jquery-lightbox a img { border: none; }#lightbox-container-image-box {position: relative;background-color: #fff;width: 950px;height: 660px;margin: 0 auto;}
      #lightbox-container-image { padding: 10px; }#lightbox-loading {position: absolute;top: 40%;left: 0%;height: 85%;width: 100%;text-align: center;line-height: 80px;}
      #lightbox-nav { position: absolute;top: 0;left: 0;height: 100%;width: 100%;z-index: 10;}#lightbox-container-image-box > #lightbox-nav { left: 0; }#lightbox-nav a { outline: none;}
      #lightbox-nav-btnPrev, #lightbox-nav-btnNext {width: 49%;height: 100%;zoom: 1;display: block;}
      #lightbox-nav-btnPrev { left: 0; float: left;}#lightbox-nav-btnNext { right: 0; float: right;}
      #lightbox-container-image-data-box {font: 20px Verdana, Helvetica, sans-serif;background-color: #fff;margin: 0 auto;line-height: 0.8em;overflow: auto;width: 100%;padding: 0 10px 0;}
      #lightbox-container-image-data {  padding: 0 10px;  color: #666; }
      #lightbox-container-image-data #lightbox-image-details {width: 70%; float: left; text-align: left; }  
      #lightbox-image-details-caption { font-weight: bold; }#lightbox-image-details-currentNumber {display: block; clear: left; padding-bottom: 1.0em;}
      #lightbox-secNav-btnClose {width: 66px; float: right;padding-bottom: 0.7em; }
      </style>
           <img src="../../img/<?php echo $data['foto']; ?>" width="100%" alt="<?php echo $data['nama_produk'];?>"/>
               <a href="../../img/<?php echo $data['foto']; ?>" title="<?php echo $data['nama_produk']; ?>"><h3>Perbesar</h3></a>
                   <br><br>
            </div>
          </div>
        </div>
          
            <div class="col-sm-7">
              <div class="product-information"><!--/product-information-->
                <?php echo $sale;?>
                <h1 name="nama_produk"><?php echo $data['nama_produk']; ?></h1>
                <p><a href=""><img src="../../img/home/rating.png" alt="" /></a></p>
                <span>
                  <span name="harga"><?php $harga = $data['harga_produk'] ?><?php echo "Rp " .number_format($harga, 0, ',', '.').",-" ?>/Kg</span>
                  </span>
                  <span>
                  <label>Jumlah :</label>
                  <input type="number" class="span1" name="jumlah" autofocus required="" placeholder="0">
                  <input type="hidden" class="span1" name="id_produk" value="<?php echo $data['id_produk']; ?>" autofocus required="" >
                  <input type="hidden" class="span1" name="nama_produk" value="<?php echo $data['nama_produk']; ?>" autofocus required="" >
                  <input type="hidden" class="span1" name="harga" value="<?php echo $data['harga_produk']; ?>" autofocus required="" >
                  <button type="submit" name="simpan"class="btn btn-default cart">
                    <i class="fa fa-shopping-cart"></i>
                    Beli Produk
                  </button>
                </span>
                <p><b>Tersedia :</b> <?php echo $data['stok_produk'];?> Stok</p>
                <p><b>Kategori :</b> <?php echo $data['id_kategori']; ?></p>
                <div class="social-links">
               <a href="#"><i class="social-icon-facebook"></i></a>
                  <a href="#"><i class="social-icon-instagram"></i></a>
                    <a href="#"><i class="social-icon-pinterest"></i></a>
                      <a href="#"><i class="social-icon-twitter"></i></a>
                        <a href="#"><i class="social-icon-linkedin"></i></a>
                        </div>
              </div><!--/product-information-->
            </div>
            <br>

          </div><!--/product-details-->
        </form>
          <br><br>
 
            <h2 class="title text-center">Rekomendasi Produk</h2>

          <br><br>
          
        <div id="other-prod-slider">
          <div class="navigation"></div>
            <div class="other-products">

       <?php
       $f=mysql_query("select * from produk LIMIT 8");
       while($data=mysql_fetch_array($f))
       {   
      $stok=$data['stok_produk'];
      $tombolbeli="<a href=\"home.php?fm=produkbeli&kd=$data[id_produk]\" class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Beli Produk</a>";
      $tombolhabis="<img src='../../images/cart_hbs.png' width='130' height='33px' float='center'></span>";
      if ($stok!= "0"){
      $tombol=$tombolbeli;
      }else{
      $tombol=$tombolhabis;
      } 
        ?>
        
        <div class='col-sm-3'>

              <div class="product-image-wrapper">
                <div class="single-products">
                  <div class="productinfo text-center">
                    <img src="../../img/<?php echo $data['foto']; ?>" alt=""></img>
                    <h2>Rp.<?php echo number_format($data['harga_produk'],2,",",".");?></h2>
                    <p><?php echo $data['nama_produk']; ?></p>
                    <a href="home.php?fm=produkbeli&kd=<?php echo $data['id_produk'];?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Beli Produk</a>
                  </div>
                  <div class="product-overlay">
                    <div class="overlay-content">
                      <h2>Rp.<?php echo number_format($data['harga_produk'],2,",",".");?></h2>
                      <p><?php echo $data['nama_produk']; ?></p>
                      <?php echo $tombol;?>
                    </div>
                  </div>
                </div>
              </div>
          
          </div>
          <?php
          }
          ?>  
          </div>
            </div>   

        </div>
          </div>
            </div>
            <br><br><br>
            


