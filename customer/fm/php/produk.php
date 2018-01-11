
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
              <img src="../../img/home/shipping.jpg" alt="" />
            </div><!--/shipping-->
        
          </div>
        </div>

      
        <br><br>
        <div class="col-sm-9 padding-right">
          <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Fitur Produk</h2>

            <?php
            include_once"php/kategori_tampil.php";
            ?>

<div>
        
<?php
  $kolom=3;
  $x = 0;
  if($numrows > 0){
  while($data=mysql_fetch_array($hasil))
    {
        if ($x >= $kolom) 
          {
            echo "</tr><tr>";
            $x = 0;
        }

          $harga = number_format($data[harga_produk],2,",",".");
          $disc     = ($data[diskon_produk]/100)*$data[harga_produk];
          $hargadisc     = number_format(($data[harga_produk]-$disc),2,",",".");

          $d=$data['diskon_produk'];
          $hargatetap="<b>Rp.$hargadisc,- /Kg</b>";
          $hargadiskon="<b><del>Rp. $harga,- /Kg</del>&nbsp;<h5>Diskon $data[diskon_produk]%</h5>Rp. $hargadisc,-/Kg</b>";
      if ($d!= "0"){
      $divharga=$hargadiskon;
      }else{
      $divharga=$hargatetap;
      }

    $stok=$data['stok_produk'];
    $tombolbeli="<a class='prod_cart' href=\"produk-$data[id_produk]-$data[nama_produk].html\"><i class='fa fa-plus-square'></i>Beli Produk</a>";
    $tombolhabis="<img src='../../images/cart_hbs.png' width='60' height='33px' float='center'></span>";
      if ($stok!= "0"){
      $tombol=$tombolbeli;
      }else{
      $tombol=$tombolhabis;
      } 

          $d=$data['diskon_produk'];
          $hargatetap="";
          $diskon="<img src='../../img/home/sale.png' class='sale'/>";
          if ($d!= "0"){
          $sale=$diskon;
          }else{
          $sale=$tetap;
          }
  $x++;
?>  
            <div class="col-sm-4">
              <div class="product-image-wrapper">
                <div class="single-products">
                  <div class="productinfo text-center">
                    <img src="../../img/<?php echo $data['foto']; ?>" alt=""/>
                    <h2><?php echo $divharga; ?></h2>
                    <p><?php echo $data['nama_produk']; ?></p>
                    <a href="produk-<?php echo $data['id_produk'];?>-<?php echo $data['nama_produk'];?>.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Beli Produk</a>
                  </div>
                  <div class="product-overlay">
                    <div class="overlay-content">
                      <h2><?php echo $divharga; ?></h2>
                      <p><?php echo $data['nama_produk']; ?></p>
                      <a href="produk-<?php echo $data['id_produk'];?>-<?php echo $data['nama_produk'];?>.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Beli Produk</a>
                    </div>
                  </div>
                  <?php echo $sale;?>
                </div>
                <div class="choose">
                  <ul class="nav nav-pills nav-justified">
                    <li><?php echo $tombol;?></li>
                    <li><a href="detail-<?php echo $data['id_produk'];?>-<?php echo $data['nama_produk'];?>.html"><i class="fa fa-plus-square"></i>Detail Produk</a></li>
                  </ul>
                </div>
              </div>
            </div>
              <?php   
              }
              }
              
              ?>
    </div>
       </div>
     </div>

    </div>
      </div>


  