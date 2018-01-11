

      <div class="container">

      <div class="page-header">
        <h1>Freshmart</h1>
      </div>

  <div class="row">

<!-- content thumbnail slider-->

        <div class="col-sm-8">

          <div class="thumbnail">
            <div class="caption text-center">
              <div id="slider">
          <div class="flexslider">
            <ul class="slides">
              <li>
                <img src="img/vegetable01.jpg" />
              </li>
              <li>
                <img src="img/vegetable03.jpg" />
              </li>
              <li>
                <img src="img/vegetable02.jpg" />
              </li>
              </li>
            </ul>
          </div>
        </div>
            </div>
            </div>
         <p align="center"><strong>Freshmart</strong> adalah situs belanja online <strong>buah-buahan dan sayur-sayuran</strong> yang terletak didaerah Jakarta.</p><p> Freshmart Juga menjelaskan
            manfaat dari setia buah dan sayuran.</p></dl>
          <h3>Fitur</h3>
            <ul>
              <li>Buah-buahan</li>
              <li>Sayur-sayuran</li>
            </ul>

        </div>


<!-- content diskon dan kategori-->

        <div class="col-sm-4">
           <div class="panel panel-default">
            <div class="panel-heading ">
              <i class="fa fa-minus-square col-sm-2 fa-2x"></i>  <h3 class="panel-title">Diskon</h3>
            </div>
            <marquee direction="up" height="410" width="357" scrollamount="4" scrolldelay="4" onMouseOut="this.start()" onMouseOver="this.stop()">
          <?php
          $sql=mysql_query("select * from produk where diskon_produk order by id_produk desc LIMIT 0,2");
          while ($r=mysql_fetch_array($sql))
          {
          $harga = number_format($r[harga_produk],2,",",".");
          $disc     = ($r[diskon_produk]/100)*$r[harga_produk];
          $hargadisc     = number_format(($r[harga_produk]-$disc),2,",",".");

          $d=$r['diskon_produk'];
          $hargatetap="<b>Rp.$hargadisc,-</b>";
          $hargadiskon="<b><del>Rp. $harga,-/Kg</del>&nbsp;<h5>Diskon $r[diskon_produk]%</h5>Rp. $hargadisc,-/Kg</b>";
      if ($d!= "0"){
      $divharga=$hargadiskon;
      }else{
      $divharga=$hargatetap;
      } 
      ?>
            <div class="panel-body bg-grey text-center">
              <img id="zoom_07" src="img/<?php echo $r['foto']; ?>"  class="img-circle" width="320px">
              <h2><?php echo $divharga; ?></h2>
            <a href="#" class="btn btn-success" role="button">Beli Produk</a>
            <p>
            <hr>
            </div> 
          <?php
            }
          ?>
          </marquee> 
          </div>


                <div class="panel panel-default">
            <div class="panel-heading ">
              <i class="fa fa-th-list col-sm-2 fa-2x"></i>  <h3 class="panel-title">Kategori</h3>
            </div>
            <div class="panel-body bg-grey">
               <h5>
                    <a data-toggle="collapse" data-parent="#category" href="#buah">
                      <?php
                      include"kategori_link.php";
                      ?>
                    </a>
                  </h5>
            </div>  
          </div>

             <div class="panel panel-default">
            <div class="panel-heading ">
              <i class="fa fa-shopping-cart col-sm-2 fa-2x"></i> <h3 class="panel-title">Keranjang Belanja</h3>
            </div>
            <div class="panel-body bg-grey">
              <img src="images/keranjang.png"  width="80" height="70" margin-right="30px"/>
              <?php
              include"php/cart_items.php";
              ?>
            </div>  
          </div>

        </div>  

      </div>

<!-- content produk -->
  <br><br>
     <div class="row">
<div>
  <h5>
    <ol class="breadcrumb">
    <li class="active"><h5>Produk</li>
    <li><a href="#">Buah</a></li>
    <li><a href="#">Sayur</a></h5></li>
    </ol>
  </h5>
</div>
        <?php

  $query = "select * from produk order by id_produk desc";
  $hasil = mysql_query($query);
  $numrows = mysql_num_rows($hasil);
  
  //Paging Data sebanyak 30 data product perlembar
  $jumlah = mysql_num_rows($hasil);
  $limit = 6;

  if (empty($offset)) {
    $offset = 0;
  }
    if(isset($_GET['offset'])){$offset = $_GET['offset']; }
    $seleksi = "SELECT * FROM produk ORDER BY id_produk DESC LIMIT $offset, $limit";
    $result = mysql_query($seleksi);

    echo "<div align=\"right\"><ul class=\"pagination\">";
    $halaman = intval($jumlah/$limit);
    if ($jumlah%$limit) { 
      $halaman++; 
    } 
      for ($i=1;$i<=$halaman;$i++) {
        $newoffset=$limit*($i-1); 
          if ($offset!=$newoffset)
            { 
            echo "<li><a href=\"index-$newoffset.html\">$i</a></li>";
          } else { 
            echo "<li class=\"active\"><a href=\"index-$newoffset.html\">$i</a></li>"; 
          } 
      }
            echo "</div></ul>";
      //Batas kode paging data
?>

      <?php
  $kolom=3;
  $x = 0;
  if($numrows > 0){
  while($data=mysql_fetch_array($result))
    {
        if ($x >= $kolom) 
          {
            echo "</tr><tr>";
            $x = 0;
        }
      

    $stok=$data['stok_produk'];
    $tombolbeli="<a href=\"produk-$data[id_produk]-$data[nama_produk].html\"><i class='fa fa-plus-square'></i>Beli Produk</a>";
    $tombolhabis="<img src='images/cart_hbs.png' width='130' height='33px' float='center'></span>";
      if ($stok!= "0"){
      $tombol=$tombolbeli;
      }else{
      $tombol=$tombolhabis;
      } 

          $d=$data['diskon_produk'];
          $hargatetap="";
          $diskon="<img src='img/home/sale.png' class='sale'/>";
          if ($d!= "0"){
          $sale=$diskon;
          }else{
          $sale=$tetap;
          }
  $x++;
?>

            <div class="col-sm-4">
              <div class="icons-box">
               <div class="product-image-wrapper">
                <div class="single-products">
                  <div class="productinfo text-center">
                    <img src="img/<?php echo $data['foto']; ?>" alt=""/>
                     <h2>Rp. <?php echo number_format ($data[harga_produk],2,",",".");?>/Kg</h2>
                    <p><?php echo $data['nama_produk'];?></p>
                    <a href="produk-<?php echo $data['id_produk'];?>-<?php echo $data['nama_produk'];?>.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Beli Produk</a>
                  </div>
                  <div class="product-overlay">
                    <div class="overlay-content">
                      <h2>Rp. <?php echo number_format ($data[harga_produk],2,",",".");?>/Kg</h2>
                      <p><?php echo $data['nama_produk'];?></p>
                      <a href="produk-<?php echo $data['id_produk'];?>-<?php echo $data['nama_produk'];?>.html"  class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Beli Produk</a>
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
          </div>
              <?php   
              }
              }             
              ?>
     </div>

<!-- content manfaat buah dan sayuran-->
<div>
  <h5>
    <ol class="breadcrumb">
      <li class="active"><h5>Manfaat</li>
      <li><a href="#">Buah</a></li>
      <li><a href="#">Sayur</a></h5></li>
    </ol>
  </h5>
</div>

   <?php 
   $artikel=mysql_query("SELECT * FROM info ORDER BY id_info DESC LIMIT 0,3");
   while ($data=mysql_fetch_assoc($artikel)) {
     
   ?>
      
      <div class="col-sm-4">
        <div class="icons-box">
        <a href="#" class="thumbnail home-thumb">
          <img src="img/<?php echo $data['foto_artikel']; ?>" alt="Jeruk"/>
        </a>
        <h3><?php echo $data['nama_artikel']; ?></h3>
        <p><?php echo substr($data['ket'], 0,180) ;?><br> <a href="detail-artikel-<?php echo $data['id_info'];?>-<?php echo $data['nama_artikel'];?>.html">Selengkapnya</a></p>
        <div class="social-links">
       <a href="#"><i class="social-icon-facebook"></i></a>
          <a href="#"><i class="social-icon-instagram"></i></a>
            <a href="#"><i class="social-icon-pinterest"></i></a>
              <a href="#"><i class="social-icon-twitter"></i></a>
                <a href="#"><i class="social-icon-linkedin"></i></a>
                </div>
                <br><br>
        <a href="artikel.html" class="btn btn-danger">Lihat</a>
  </div> 
</div>

  <?php   
  }
  ?>

</div>


