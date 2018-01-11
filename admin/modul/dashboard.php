<?php
require ("../config/config.php");
require ("../config/date.php");
require_once "../config/db-class.php";
require_once "../config/paging-class.php";

session_start();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
if (empty($_SESSION[nama]) AND empty($_SESSION[password]))
{
  echo "<link href='../css/bootstrap.css' rel='stylesheet' type='text/css'>
        <link href='../font-awesome/css/font-awesome.min.css' rel='stylesheet' type='text/css'>
        <link href='../css/open-sans.css' rel='stylesheet'>
        <link href='../css/oswald.css' rel='stylesheet'>
    <div class='container'>
       <div class='row'>
          <br><br>
               <div class='col-md-4 col-md-offset-4'>
                   <div class='login-panel panel panel-primary'>
                      <div class='panel-body' align='center'>
                          <h3> Untuk mengakses admin Freshmart Anda harus login!</h3>
                             <a href=../index.php><button class='btn btn-warning' name='login'>Halaman Login</button></a>
                       </div>
                    </div>
              </div>
        </div>
     </div>";
}
else
{
?>
<!DOCTYPE html>
<html><head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Dashboard Freshmart - Smartway</title>

    <link href="../css/animate.css" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap-datetimepicker.min" rel="stylesheet">
    <link href="../css/custom.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../css/open-sans.css" rel="stylesheet">
    <link href="../css/oswald.css" rel="stylesheet">
    <link rel="shortcut icon" href="../../img/ico.png">
    <link rel="stylesheet" type="text/css" href="../js/plugins/tigra_calendar/tcal.css" />

    <script type="text/javascript" src="../js/plugins/tigra_calendar/tcal.js"></script> 
    <script type="text/javascript" src="../js/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="admin/jquery.touchSwipe.min"></script>

    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <script src="../js/jquery.js"></script>   
    <script type="text/javascript">
    $(window).load(function(){
      $("[data-toggle]").click(function() {
        var toggle_el = $(this).data("toggle");
        $(toggle_el).toggleClass("open-sidebar");
      });
    });
    
    </script>
</head>
  <body>
    <div class="container">
      <div id="sidebar">
          <ul>
              <li><a href="dashboard">Menu Utama</a></li>
              <li><a href="member">Pelanggan</a></li> 
              <li><a href="items">Produk</a></li>
              <li><a href="artikel">Artikel</a></li>
              <?php
              $cek=  mysql_connect("localhost","root","")or die(mysql_error());
              mysql_select_db("db_freshmart") or die(mysql_error());          
              $result=  mysql_query("SELECT * FROM transaksi");
              $row=  mysql_num_rows($result);
              ?>
              <li><a href="pemesanan">Pemesanan <span class="badge"><?php echo $row; ?></a></li>
              <?php
              $cek=  mysql_connect("localhost","root","")or die(mysql_error());
              mysql_select_db("db_freshmart") or die(mysql_error());          
              $result=  mysql_query("SELECT * FROM konfirmasi");
              $row=  mysql_num_rows($result);
              ?>
              <li><a href="konfirmasi">Konfirmasi <span class="badge"><?php echo $row; ?></a></li>
              <li><a href="#laporan" data-toggle="modal">Laporan</a></li>
              <li><a href="../logout.php">Keluar</a></li>
          </ul>
      </div>
      <div class="main-content">
          <a href="#" data-toggle=".container" id="sidebar-toggle">
              <span class="bar"></span>
              <span class="bar"></span>
              <span class="bar"></span>
          </a>
          <div class="content">

              <?php
              include"php/laporan-menu.php";
              ?>

              <!-- awal untuk modal dialog -->
             <div id="item" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                        <div class="modal-content"> 
              <!-- tempat untuk menampilkan form mahasiswa -->
              <div class="modal-body"></div>
                  </div>
                  </div>
              </div>       

                            <?php
                error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                switch ($_GET['fm'])
                {

                    case"member":
                    if(!file_exists("php/member.php"))
                        die("Php Tidak Ditemukan");
                        include "php/member.php";
                        break;
                     case"member-hapus":
                    if(!file_exists("php/member-hapus.php"))
                        die("Php Tidak Ditemukan");
                        include "php/member-hapus.php";
                        break;

                    case"items":
                    if(!file_exists("php/items.php"))
                        die("Php Tidak Ditemukan");
                        include "php/items.php";
                        break;
                    case"items-data":
                    if(!file_exists("php/items-data.php"))
                        die("Php Tidak Ditemukan");
                        include "php/items-data.php";
                        break;
                    case"items-hapus":
                    if(!file_exists("php/items-hapus.php"))
                        die("Php Tidak Ditemukan");
                        include "php/items-hapus.php";
                        break;
                    case"artikel":
                    if(!file_exists("php/artikel.php"))
                        die("Php Tidak Ditemukan");
                        include "php/artikel.php";
                        break;
                    case"artikel-data":
                    if(!file_exists("php/artikel-data.php"))
                        die("Php Tidak Ditemukan");
                        include "php/artikel-data.php";
                        break;
                    case"artikel-edit":
                    if(!file_exists("php/artikel-edit.php"))
                        die("Php Tidak Ditemukan");
                        include "php/artikel-edit.php";
                        break;
                     case"artikel-hapus":
                    if(!file_exists("php/artikel-hapus.php"))
                        die("Php Tidak Ditemukan");
                        include "php/artikel-hapus.php";
                        break;
                     case"pemesanan":
                    if(!file_exists("php/transaksi-pemesanan.php"))
                        die("Php Tidak Ditemukan");
                        include "php/transaksi-pemesanan.php";
                        break;
                       case"pemesanan-hapus":
                    if(!file_exists("php/transaksi-pemesanan-hapus.php"))
                        die("Php Tidak Ditemukan");
                        include "php/transaksi-pemesanan-hapus.php";
                        break;
                       case"pemesanan-pengiriman":
                    if(!file_exists("php/transaksi-pemesanan-pengiriman.php"))
                        die("Php Tidak Ditemukan");
                        include "php/transaksi-pemesanan-pengiriman.php";
                        break;
                       case"pemesanan-pembayaran":
                    if(!file_exists("php/transaksi-pemesanan-pembayaran.php"))
                        die("Php Tidak Ditemukan");
                        include "php/transaksi-pemesanan-pembayaran.php";
                        break;
                      case"pemesanan-lihat":
                    if(!file_exists("php/transaksi-pemesanan-lihat.php"))
                        die("Php Tidak Ditemukan");
                        include "php/transaksi-pemesanan-lihat.php";
                        break;
                    case"konfirmasi":
                    if(!file_exists("php/konfirmasi.php"))
                        die("Php Tidak Ditemukan");
                        include "php/konfirmasi.php";
                        break;
                     case"konfirmasi-hapus":
                    if(!file_exists("php/konfirmasi-hapus.php"))
                        die("Php Tidak Ditemukan");
                        include "php/konfirmasi-hapus.php";
                        break; 
                  default:
                    if(!file_exists("php/freshmart.php"))
                        die("Php tidak ada");
                        include('php/freshmart.php');
                        break;                        
                }
                ?>
          </div>
      </div>
    </div>
    <script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="../ckeditor/style.js"></script>
    <script src="../js/bootstrap.min.js"></script>  
    <script src="../js/jquery-1.8.3.min.js"></script>
    <script src="php/items-edit-link.js"></script>
    <script src="php/member-link.js"></script>
    <script src="php/artikel-link.js"></script>
    <script src="php/konfirmasi-link.js"></script>
    <script src="../js/bootstrap-datetimepicker.js"></script>
    <script src="../js/bootstrap-datetimepicker.id.js"></script>
    <script type="text/javascript">
       $('.form_date').datetimepicker({
              language:  'id',
              weekStart: 1,
              todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
          });
    </script>
  </body>
</html>
<?php
}
?>