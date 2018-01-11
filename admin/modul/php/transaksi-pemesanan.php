<h1 class="page-header text-info"><span class="fa fa-3x fa-users"></span><b> Data Transaksi Pemesanan</b></h1>
<?php

    $Host="localhost";
    $User="root";
    $Pass="";
    $Db="db_freshmart";
    $Koneksi=mysql_connect($Host,$User,$Pass);

$SqlPeriode = ""; $awalTgl=""; $akhirTgl=""; $tglAwal=""; $tglAkhir="";

# Set Tanggal skrg
$awalTgl    = isset($_GET['awalTgl']) ? $_GET['awalTgl'] : "01-".date('m-Y');
$tglAwal    = isset($_POST['txtTglAwal']) ? $_POST['txtTglAwal'] : $awalTgl ;

$akhirTgl   = isset($_GET['akhirTgl']) ? $_GET['akhirTgl'] : date('d-m-Y'); 
$tglAkhir   = isset($_POST['txtTglAkhir']) ? $_POST['txtTglAkhir'] : $akhirTgl;

# Jika Tombol Tampilkan diklik
if (isset($_POST['btnTampil'])) {
    $SqlPeriode = " tanggal_transaksi BETWEEN '".InggrisTgl($tglAwal)."' AND '".InggrisTgl($tglAkhir)."'";
}
else {
    $SqlPeriode = " tanggal_transaksi BETWEEN '".InggrisTgl($awalTgl)."' AND '".InggrisTgl($akhirTgl)."'";
}
$baris = 5;
$hal = isset($_GET['halaman']) ? $_GET['halaman'] : 0;
$pageSql = "SELECT * FROM transaksi WHERE $SqlPeriode";
$pageQry = mysql_query($pageSql, $Koneksi) or die ("error paging: ".mysql_error());
$jml     = mysql_num_rows($pageQry);
$maksData = ceil($jml/$baris);
?>
<div class="row">
<div class="col-sm-6">
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="form1" target="_self">
    <div class="form-group">
    <label  class="col-sm-2 control-label" required autofocus><h4><b>Priode :</h4></b></label> 
      <div class='col-sm-4'>
               <div class="input-group date form_date col-md-12" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                    <input class="form-control" size="10" type="text" name="txtTglAwal" id="harga" value="<?php echo $tglAwal; ?>">
                     <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
              </div>
     </div>
        <div class='col-sm-4'>
                 <div class="input-group date form_date col-md-12" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                    <input class="form-control" size="10" type="text" name="txtTglAkhir" id="harga" value="<?php echo $tglAkhir; ?>">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
       </div>
   </div>
       <button type="submit" name="btnTampil"  class="btn btn-success" value="Tampilkan"><span class="fa fa-upload fa-fw"></span> Proses</button>
</form><br>
</div>
  <div class="col-md-12">

        <table class="table table-hover table-condensed">
            <thead>
            <th class="success text-info">No</th>
                <th class="success text-danger">No.transaksi</th>
                <th class="success text-danger">Tanggal</th>
                <th class="success text-danger">Total Bayar</th>
                <th class="success text-danger">Status Pembayaran</th>
                <th class="success text-danger">Konfirmasi Pembayaran</th>
                <th class="success text-danger">Status Pengiriman</th>
                <th class="success text-danger">Konfirmasi Pengiriman</th>
                <th class="success text-danger">#</th>
            </thead>
            <tbody>
                <?php

                    $batas=8; //satu halaman menampilkan 10 baris
                    $halaman=$_GET['halaman'];
                    $posisi=null;
                    if(empty($halaman)){
                      $posisi=0;
                      $halaman=1;
                    }else{
                      $posisi=($halaman-1)* $batas;
                    }
                     
                    //3). melakukan query dan menampilkan data
                    //query data menggunakan limit $posisi dan batas
                    $sql="SELECT * from transaksi WHERE $SqlPeriode ORDER BY RIGHT(transaksi.id_transaksi,5) limit $posisi,$batas";
                     
                    $result=mysql_query($sql) or die(mysql_error());
                    $no=1;
                    while($user=mysql_fetch_object($result)){                        
                    ?>
                    <tbody>
                    <td class="text-info"><?php echo $posisi+$no;?></td>
                    <td><?php echo $user->id_transaksi;?></td>
                    <td><?php echo $user->tgl_transaksi;?></td>
                    <td>Rp. <?php echo $user->total_transaksi;?></td>
                    <td><?php echo $user->status_bayar; ?></td>
                    <td>
                    <?php 
                    if($user->status_bayar=="Pesan")
                    { ?> 
                      <a  href="dashboard.php?fm=pemesanan-pembayaran&Aksi=Lunas&Kode=<?php echo $user->id_transaksi; ?> "><strong><span class="fa fa-check"></span> Konfirmasi </strong></a>
                      <?php }
                    else { ?> 
                      <a  href="dashboard.php?fm=pemesanan-pembayaran&Aksi=Pesan&Kode=<?php echo $user->id_transaksi; ?>"><strong><span class="fa fa-times"></span> Batalkan</strong></a>
                      <?php 
                    } ?>      
                    </td>
                    <td><?php echo $user->status_pengiriman;?></td>
                    <td>
                     <?php 
                     if($user->status_pengiriman=="Pending") 
                     { ?> 
                      <a href="dashboard.php?fm=pemesanan-pengiriman&Aksi=Dikirim&Kode=<?php echo $user->id_transaksi; ?> "><span class="fa fa-check"></span><strong> Konfirmasi </strong></a>
                      <?php } 
                     else { ?> 
                      <a href="dashboard.php?fm=pemesanan-pengiriman&Aksi=Pending&Kode=<?php echo $user->id_transaksi; ?>"><strong><span class="fa fa-times"></span> Batalkan</strong></a>
                      <?php 
                    } ?>   
                    </td>
                    <td>
                    <a href="dashboard.php?fm=pemesanan-lihat&id=<?php echo $user->id_transaksi;?>" target="_blank"><span class="fa fa-eye fa-lg"></span></a>
                    <a href="dashboard.php?fm=pemesanan-hapus&id=<?php echo $user->id_transaksi;?>" onclick="return confirm('Anda yakin ingin hapus?');"><span class="fa fa-fw fa-trash-o"></span></a>
                    </td>
                    </tbody>
                        <?php
                        $no++;
                        }
                        ?>    
            </tbody>
        </table>
        <?php
        $sql_paging = mysql_query("SELECT id_transaksi from transaksi");
            $jmldata = mysql_num_rows($sql_paging);
            $jumlah_halaman = ceil($jmldata / $batas);

            echo "<ul class='pagination'>"; 
            for($i = 1; $i <= $jumlah_halaman; $i++)
                if($i != $halaman) {
                    echo "<li><a href=dashboard.php?fm=pemesanan&halaman=$i>$i</a></li>";
                } else 
                {
                    echo "<li class='active'><a href=dashboard.php?fm=pemesanan&halaman=$i>$i</a></li>";
                }
                echo "</ul>";
            mysql_close();?>
        <br>
        Jumlah data : <?php echo $jmldata;?>
    </div>
</div>
