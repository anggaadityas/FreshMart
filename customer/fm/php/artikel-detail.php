    
<br><br><br>
<?php 
$id = $_GET['kd'];
$show = mysql_query("SELECT * FROM info WHERE id_info='$id'");

if(mysql_num_rows($show)){
     
    //jika data ditemukan, maka membuat variabel $data
    $data = mysql_fetch_assoc($show); //mengambil data ke database yang nantinya akan ditampilkan di form edit di bawah
  }
        ?>
        <!--container start-->
    <div class="container">
      <div class="row">
        <!--blog start-->

        <div class="col-lg-9 ">
          
          <div class="blog-item">
            <div class="row">
              <div class="col-lg-2 col-sm-2">
                <div class="date-wrap">
                  <span class="date">
                    <?php echo $data['hari'];?>
                  </span>
                  <span class="month">
                    <?php echo $data['bulan'];?>
                  </span>
                </div>

              </div>
              <div class="col-lg-10 col-sm-10">
                <div class="blog-img">
                  <img src="../img/<?php echo $data['foto_artikel']; ?>" alt=""/>
                </div>

              </div>
            </div>
            <div class="row">
              <div class="col-lg-2 col-sm-2 text-right">
                <div class="author">
                  By
                  <a href="#">
                    <?php echo $data['id_user']; ?>
                  </a>
                </div>
                <ul class="list-unstyled">
                  <li>
                    <a href="javascript:;">
                      <em>
                        Artikel
                      </em>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:;">
                      <em>
                        Manfaat
                      </em>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:;">
                      <em>
                        Buah 
                      </em>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:;">
                      <em>
                        Sayur 
                      </em>
                    </a>
                  </li>
                </ul>
      
              <div class="social-links">
                  <ul class="list-unstyled">
                    <li>
                      <a href="#"><i class="social-icon-facebook"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="social-icon-instagram"></i></a>
                    </li>
                    <li>
                     <a href="#"><i class="social-icon-pinterest"></i></a>
                    </li>
                    <li>
                    <a href="#"><i class="social-icon-twitter"></i></a>
                    </li>
                    <li>
                     <a href="#"><i class="social-icon-linkedin"></i></a>
                    </li>
                  </ul>
                </div>
              </div>

              <div class="col-lg-10 col-sm-10">
                <h1>
                  <a href="detail-artikel-<?php echo $data['id_info'];?>-<?php echo $data['nama_artikel'];?>.html">
                    <?php echo $data['nama_artikel']; ?>
                  </a>
                </h1>
                <br>
                <p style="text-indent:20px;">
                 <?php echo $data['ket']; ?>
                </p>

              </div>
            </div>
          </div>
        

<br>


        </div>

        <div class="col-lg-3">
          <div class="blog-side-item">
              <form  role="blog" action="#">
              <input type="text" class="form-control blog" id="kotakpencarianblog">
             <div id="hasilpencarianblog">
        </div>
      </form>
            <div class="category">
              <h3>
                Kategori Produk
              </h3>

                    <?php
                    include"php/kategori-produk-blog.php";
                    ?>
            </div>


            <div class="blog-post">
              <h3>
               Blog Posting Terakhir
              </h3>
              <?php
               $sql = mysql_query("SELECT * FROM info ORDER BY id_info DESC LIMIT 3");
                while($data = mysql_fetch_assoc($sql))
                {
              ?>
              <div class="media">
                <a class="pull-left" href="javascript:;">
                  <img class="imgblog" src="../img/<?php echo $data ['foto_artikel'];?>" alt="" width="81px" height="81px">
                </a>
                <div class="media-body">
                  <h5 class="media-heading">
                    <a href="javascript:;">
                      <?php echo $data ['tgl'];?>
                    </a>
                  </h5>
                  <p style="text-indent:20px;">
                    <?php echo substr($data['ket'], 0,50) ;?><br> <a href="detail-artikel-<?php echo $data['id_info'];?>-<?php echo $data['nama_artikel'];?>.html">Selengkapnya</a>
                  </p>
                </div>
              </div>
              <?php
            }
            ?>
          </diV>


             <div class="tags">
              <h3>
                Tags
              </h3>
              <ul class="tag">
                <li>
                  <a href="#">
                    <i class="fa fa-tags pr-5">
                    </i>
                    Produk
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-tags pr-5">
                    </i>
                    Pemesanan
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-tags pr-5">
                    </i>
                    Keranjang Belanja 
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-tags pr-5">
                    </i>
                    Blog
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-tags pr-5">
                    </i>
                    Buah
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-tags pr-5">
                    </i>
                    Sayuran
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-tags pr-5">
                    </i>
                    Daftar
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-tags pr-5">
                    </i>
                   Masuk
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-tags pr-5">
                    </i>
                    Home
                  </a>
                </li>
              </ul>
            </div>

            <br>
            <div class="shipping text-center"><!--shipping-->
              <img src="../img/home/shipping.jpg" alt="" />
            </div><!--/shipping-->
            
<br><br>
<!-- Tempatkan tag ini di mana pun Anda ingin widget ditampilkan. -->
<div class="g-person" data-width="280" data-href="//plus.google.com/u/0/112585367540283168718" data-rel="author"></div>

<!-- Tempatkan tag ini setelah tag widget terakhir. -->
<script type="text/javascript">
  window.___gcfg = {lang: 'id'};

  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/platform.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
            </div>
        </div>

        <!--blog end-->
      </div>

    </div>
    <!--container end-->



