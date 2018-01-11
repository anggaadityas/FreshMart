  <?php
  include_once'config/config.php';
  include_once"config/date.php";
  include "config/class_paging.php";
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <!-- start: Meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta charset="utf-8">
  <title>Freshmart | Belanja buah dan sayur via online terlengkap dan terpercaya di Jakarta</title> 
  <meta name="description" content="Jalan pintar belanja online buah dan sayuran dijakarta"/>
  <meta name="keywords" content="sayuran, Murah, jakarta, Baru, terlengkap, harga, terjangkau" />
  <meta name="author" content=""/>
  <!-- end: Meta -->

  <!-- CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/custom.css" rel="stylesheet">
  <link href="css/animate.css" rel="stylesheet">
  <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
  <link href="css/open-sans.css" rel="stylesheet">
  <link href="css/oswald.css" rel="stylesheet">
  <!-- End CSS -->

  <!-- Font icons-->
  <link href="css/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link type="text/css" href="css/fonts/rondo/style.css" rel="stylesheet">

  <!-- Le fav and touch icons -->
  <link rel="shortcut icon" href="img/ico.png">
  
  <!-- google plus -->
  <script src="https://apis.google.com/js/platform.js" async defer>
  {lang: 'id'}
  </script>

  <!-- Js search -->
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/jquery.watermarkinput.js"></script>
  <!-- search produk -->
  <script type="text/javascript">
  $(document).ready(function(){

  $(".search").keyup(function() 
  {
  var kotakpencarian = $(this).val();
  var dataString = 'searchword='+ kotakpencarian;

  if(kotakpencarian=='')
  {
  
  }

  else
  {
  $.ajax({
  type: "POST",
  url: "php/search-produk.php",
  data: dataString,
  cache: false,
  success: function(html)
  {
  $("#hasilpencarian").html(html).show();
  }

  });
  }
  return false;    
  });
  });

  jQuery(function($){
     $("#kotakpencarian").Watermark("Cari Produk");// Untuk menampilkan tulisan "Cari" di kotakpencarian
     });
  </script>

  <!-- search blog -->
  <script type="text/javascript">
  $(document).ready(function(){

  $(".blog").keyup(function() 
  {
  var kotakpencarianblog = $(this).val();
  var dataString = 'searchword='+ kotakpencarianblog;

  if(kotakpencarianblog=='')
  {
  
  }

  else
  {
  $.ajax({
  type: "POST",
  url: "php/search.php",
  data: dataString,
  cache: false,
  success: function(html)
  {
  $("#hasilpencarianblog").html(html).show();
  }

  });
  }
  return false;    
  });
  });

  jQuery(function($){
     $("#kotakpencarianblog").Watermark("Cari Artikel");// Untuk menampilkan tulisan "Cari" di kotakpencarian
     });
  </script>
  
  <!-- Js untuk validasi form -->
  <script language="javascript">
    function getkey(e)
    {
    if (window.event)
       return window.event.keyCode;
    else if (e)
       return e.which;
    else
       return null;
    }
    function goodchars(e, goods, field)
    {
    var key, keychar;
    key = getkey(e);
    if (key == null) return true;

    keychar = String.fromCharCode(key);
    keychar = keychar.toLowerCase();
    goods = goods.toLowerCase();

    // check goodkeys
    if (goods.indexOf(keychar) != -1)
      return true;
    // control keys
    if ( key==null || key==0 || key==8 || key==9 || key==27 )
       return true;
       
    if (key == 13) {
      var i;
      for (i = 0; i < field.form.elements.length; i++)
        if (field == field.form.elements[i])
          break;
      i = (i + 1) % field.form.elements.length;
      field.form.elements[i].focus();
      return false;
      };
    // else return false
    return false;
    }
</script>
</head>
<body>

  <!-- Preloader -->
  <div id="preloader">
    <div id="load"></div>
  </div>

  <nav class="navbar navbar-default navbar-fixed-top">
   

      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
      <a style="color:#fff" class="navbar-brand" href="index.html"><strong>FreshMart</strong></a>
      </div>

    <div class="navbar-collapse collapse">  

    <ul class="nav navbar-nav navbar-left center-nav">

      <form class="navbar-nav size-search" role="search" action="#">
        <div class="form-group">
           <div class="col-lg-8">
          <input type="text" class="form-control search" id="kotakpencarian">
        </div>
           <div class="size-btn-search"> 
             <button type="submit" class=" size-btn-search btn btn-default"><i class="fa fa-search fa-lg"></i></button>
           </div>
           <div id="hasilpencarian">
        </div>
         </div>
      </form>
         
      </ul>

          <ul class="nav navbar-nav navbar-right top-nav">
        <li class="active">
          <a class="fa fa-home fa-lg" href="index.html"></a>
        </li>
        <li> 
          <a href="#login" data-toggle="modal" >Masuk</a>
        </li>
        <li>
          <a href="#registrasi" data-toggle="modal">Daftar</a>
        </li>
        <li>
          <a href="produk.html">Produk</a>
        </li>
        <?php           
              $result=  mysql_query("SELECT * FROM keranjang");
              $row=  mysql_num_rows($result);
        ?>
        <li class="presentation"> 
          <a href="cart.html">Keranjang Belanja <i class="fa fa-shopping-cart"></i><span align="left" class="badge"><?php echo $row; ?></span></a>
        </li>
       
        <li class="dropdown">
               <a href="" data-close-others="false" data-delay="0" data-hover=
                      "dropdown" data-toggle="dropdown"> Syarat & Ketentuan <b class="caret"> </b></a>
        <ul class="dropdown-menu">
            <li>
                <a href="syarat&ketentuan.html" ><i class="fa fa-arrow-circle-o-right fa-fw"></i> Cara Pembelian</a>
            </li>
            <li>
                <a href="#datapembelian" data-toggle="modal"><i class="fa fa-fw fa-credit-card"></i> Cek Data Pembelian & Konfirmasi</a>
            </li>
        </ul>
        </li>
        <li>
          <a href="artikel.html">Artikel</a>
        </li>
      </ul>
    </div>

  </nav>
  <br>

    <?php
    include'php/login.php';
    ?>
    <?php
    include'php/registrasi.php';
    ?>      
    <?php
    include'php/konfirmasi.php';
    ?>   
    <?php
    include'php/data-pembelian.php';
    ?>  
                <?php
                error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                switch ($_GET['fm'])
                {
                    case"produk":
                    if(!file_exists("php/produk.php"))
                        die("Php Tidak Ditemukan");
                        include "php/produk.php";
                        break;
                    case"detail":
                    if(!file_exists("php/produk_detail.php"))
                        die("Php Tidak Ditemukan");
                        include "php/produk_detail.php";
                        break;
                    case"produkbeli":
                    if(!file_exists("php/produk_beli.php"))
                        die("Php Tidak Ditemukan");
                        include "php/produk_beli.php";
                        break;
                    case"kategori-produk-halaman":
                    if(!file_exists("php/kategori_produk_halaman.php"))
                        die("Php Tidak Ditemukan");
                        include "php/kategori_produk_halaman.php";
                        break;
                    case"cart":
                    if(!file_exists("php/cart.php"))
                        die("Php Tidak Ditemukan");
                        include "php/cart.php";
                        break;
                    case"cart-hapus":
                    if(!file_exists("php/cart_hapus.php"))
                        die("Php Tidak Ditemukan");
                        include "php/cart_hapus.php";
                        break;
                     case"cart-tambah":
                    if(!file_exists("php/cart_tambah.php"))
                        die("Php Tidak Ditemukan");
                        include "php/cart_tambah.php";
                        break;
                     case"cart-berkurang":
                    if(!file_exists("php/cart_berkurang.php"))
                        die("Php Tidak Ditemukan");
                        include "php/cart_berkurang.php";
                        break;
                    case"cartkosong":
                    if(!file_exists("php/cart_kosong.php"))
                        die("Php Tidak Ditemukan");
                        include "php/cart_kosong.php";
                        break;
                    case"pemesanan":
                    if(!file_exists("php/pemesanan.php"))
                        die("Php Tidak Ditemukan");
                        include "php/pemesanan.php";
                        break;
                    case"transaksi";
                    if(!file_exists("php/transaksi.php"))
                      die("Php Tidak Ditemukan");
                      include"php/transaksi.php";
                      break;
                    case"cekout";
                    if(!file_exists("php/transaksi_selesai.php"))
                      die("Php Tidak Ditemukan");
                      include"php/transaksi_selesai.php";
                      break;
                    case"artikel";
                    if(!file_exists("php/artikel.php"))
                        die("Php Tidak Ditemukan");
                      include"php/artikel.php";
                      break;
                      case"detail-artikel":
                    if(!file_exists("php/artikel-detail.php"))
                        die("Php Tidak Ditemukan");
                        include "php/artikel-detail.php";
                        break;
                       case"loginbel":
                    if(!file_exists("php/loginbel.php"))
                        die("Php Tidak Ditemukan");
                        include "php/loginbel.php";
                        break;
                      case"datapembelian":
                     if(!file_exists("php/search-datapembelian.php"))
                        die("Php Tidak Ditemukan");
                        include "php/search-datapembelian.php";
                        break;
                  default:
                    if(!file_exists("php/content.php"))
                        die("Php Tidak ditemukan");
                        include('php/content.php');
                        break;
                        
                }
                ?>

        <?php
        include'php/footer.php';
        ?>

    <script type="text/javascript" src="jquery.min.js"></script>
    <script type="text/javascript" src="bootstrap.min.js"></script>
    <script type="text/javascript" src="formValidation.js"></script>
    <script type="text/javascript" src="bootstrap.js"></script>

  <script src="js/jquery.scrollUp.min.js"></script>
  <script src="js/jquery.prettyPhoto.js"></script>
  <script src="js/jquery.lightbox-0.5.js"></script>
  <script type="text/javascript">
    $(function() {
        $('#gallery a').lightBox();
    });
  </script>
  <script type="text/javascript"  src="js/jquery.flexslider-min.js"></script>
  <script type="text/javascript" src="js/jquery.elevateZoom-3.0.8.min.js"></script>
  <script type="text/javascript"> 
         $("#zoom_07").elevateZoom({ zoomType : "lens", lensShape : "round", lensSize : 200 }); 
  </script>
  <script type="text/javascript">
  $(window).load(function() {
    $('.flexslider').flexslider({
      animation: "slide"
    });
  });
  </script>
    <script type="text/javascript">
$(document).ready(function() {
    // Generate a simple captcha
    
    $('#defaultForm').formValidation({
        message: 'This value is not valid',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            nama: {
                message: 'Nama Belum diisi',
                validators: {
                    notEmpty: {
                        message: 'Nama Belum diisi'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'Nama lengkap min 6 sampai 30 karakter'
                    },
                }
            },
            id_lokasi: {
                validators: {
                    notEmpty: {
                        message: 'Id lokasi Belum dipilih'
                    }
                }
            },
            nama_lokasi: {
                validators: {
                    notEmpty: {
                        message: 'Isi nama lokasi tujuan '
                    },
                    namalok: {
                        message: 'Nama lokasi belum diisi'
                    }
                }
            },
            alamat_lengkap: {
                validators: {
                    notEmpty: {
                        message: 'Alamat tujuan belum diisi'
                    }
                }
            },
            kd_pos: {
              message: 'Kode pos belum diisi',
                validators: {
                    digits: {
                        message: 'Kode pos harus angka'
                    }
                }
            },
            telp: {
              message: 'nomor telphone belum diisi',
                validators: {
                    digits: {
                        message: 'Nomor Telpon harus angka'
                    }
                }
            },
            rek: {
                validators: {
                    notEmpty: {
                        message: 'Nama Bank Belum dipilih'
                    }
                }
            },
             atm: {
              message: 'Nomor atm belum diisi',
               validators: {
                    digits: {
                        message: 'Nomor Rekening harus angka'
                    }
                }
            },
            nama_rek: {
              message: 'Nama rekening belum diisi',
                validators: {
                    varchar: {
                        message: 'Nama Rekening harus nama'
                    }
                }
            },
            agree: {
                validators: {
                    notEmpty: {
                        message: 'Anda harus mengceklist jika ingin melanjutkan transaksi'
                    }
                }
            }
        }
    });
});
</script>

        <script src="js/vendor/plugins.js"></script>
        <script src="js/vendor/main.js"></script>
        <script src="js/price-range.js"></script>
        <script src="js/main.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/loader.js"></script>
        <script src="js/hover-dropdown.js"></script>
  
  </body>
  </html>