<?php
include_once "Koneksi.php";
include_once "Koneksi2.php";

if(isset($_GET['Kode'])) {
	// Membaca Kode dari URL
	$Kode	= $_GET['Kode'];
	
	// Query membaca data Utama Pemesanan 
	$mySql = "SELECT detailtransaksi.*, provinsi.*
			FROM detailtransaksi, provinsi
			WHERE detailtransaksi.Kd_prov=provinsi.Kd_prov 	
			AND detailtransaksi.No_transaksi ='$Kode'";
	$myQry = mysql_query($mySql, $Koneksi) or die ("Gagal query");
	$myData = mysql_fetch_array($myQry);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Pemesanan Detil Barang</title>
<link href="../style/styles_cetak.css" rel="stylesheet" type="text/css">
<link href="../style/button.css" rel="stylesheet" type="text/css">
</head>
<body>
<h1>TRANSAKSI PEMESANAN </h1>
<table width="550" border="0" cellspacing="2" cellpadding="3" class="table table-bordered table">
  <tr>
    <td bgcolor="#CCCCCC"><strong>TRANSAKSI</strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="31%"><b>No. Pemesanan</b></td>
    <td width="2%">:</td>
    <td width="67%"><?php echo $Kode; ?></td>
  </tr>
  <tr>
    <td><b>Tanggal</b></td>
    <td>:</td>
    <td><?php echo IndonesiaTgl($myData['Tgl_transaksi']); ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#CCCCCC"><strong>PENERIMA</strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><b>Nama Penerima</b></td>
    <td>:</td>
    <td><?php echo $myData['Nm_penerima']; ?></td>
  </tr>
  <tr>
    <td><b>Alamat Penerima</b></td>
    <td>:</td>
    <td><?php echo $myData['Almt_lengkap']; ?></td>
  </tr>
  <tr>
    <td><strong>Provinsi</strong></td>
    <td>:</td>
    <td><?php echo $myData['Nm_prov'];  ?></td>
  </tr>
  <tr>
    <td><b>No. Telepon </b></td>
    <td>:</td>
    <td><?php echo $myData['No_tlp'];  ?></td>
  </tr>
   <tr>
    <td><b>No. Rekening </b></td>
    <td>:</td>
    <td><?php echo $myData['No_rek'];  ?></td>
  </tr>
   <tr>
    <td><b>Nama Rekening </b></td>
    <td>:</td>
    <td><?php echo $myData['Nm_rek'];  ?></td>
  </tr>
   <tr>
    <td><b>Bank  </b></td>
    <td>:</td>
    <td><?php echo $myData['Bank'];  ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#FFFF99"><b>Status Pembayaran </b></td>
    <td>:</td>
    <td><?php echo $myData['Status_byr']; ?> * </td>
  </tr>
  <tr>
    <td bgcolor="#FFFF99"><b>Status Pengirimian </b></td>
    <td>:</td>
    <td><?php echo $myData['Status_pengiriman']; ?> * </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<h2>DAFTAR PESANAN BARANG</h2>
<table width="800" border="0" cellpadding="2" cellspacing="0" class="table-list">
  <tr>
    <td width="30" align="center" bgcolor="#CCCCCC"><strong>No</strong></td>
    <td width="74" bgcolor="#CCCCCC"><strong>Kode</strong></td>
    <td width="404" height="22" bgcolor="#CCCCCC"><b>Nama Barang </b></td>
    <td width="111" align="right" bgcolor="#CCCCCC"><b><b>Harga (Rp)</b></b></td>
    <td width="54" align="center" bgcolor="#CCCCCC"><b>Jumlah</b></td>
    <td width="103" align="right" bgcolor="#CCCCCC"><b>Total (Rp)</b></td>
  </tr>
  <?php 
	  // Deklarasi variabel
	  $subTotal		= 0;
	  $totalBarang 	= 0;
	  $totalBiayaKirim = 0;
	  $totalHarga 	= 0;
	  $totalBayar 	= 0;
	  
	// SQL Menampilkan data Barang yang dipesan
	$tampilSql = "SELECT barang.Nm_brg, transaksi.*
				FROM detailtransaksi, transaksi
				LEFT JOIN barang ON transaksi.Kd_brg=barang.Kd_brg
				WHERE detailtransaksi.No_transaksi=transaksi.No_transaksi
				AND detailtransaksi.No_transaksi='$Kode'
				ORDER BY transaksi.Kd_brg";
	$tampilQry = mysql_query($tampilSql, $Koneksi) or die ("Gagal SQL".mysql_error()); 
	$total = 0;
	$nomor = 0;
	while ($tampilData = mysql_fetch_array($tampilQry)) {
	  $nomor++;
	  // Menghitung harga bersih
	  $subTotal		= $tampilData['Hrg'] * $tampilData['Qty']; 
	  
	  // Menghitung total harga semua barang
	  $totalHarga 	= $totalHarga + $subTotal;  
	  
	  // Menghitung total barang
	  $totalBarang	= $totalBarang + $tampilData['Qty']; 
  ?>
  <tr>
    <td align="center"><?php echo $nomor; ?></td>
    <td><?php echo $tampilData['Kd_brg']; ?></td>
    <td><?php echo $tampilData['Nm_brg']; ?></td>
    <td align="right">Rp. <?php echo $tampilData['Hrg']; ?></td>
    <td align="center"><?php echo $tampilData['Qty']; ?></td>
    <td align="right">Rp.<?php echo format_angka($subTotal); ?></td>
  </tr>
  <?php
	}
  	# SKRIP REKAP DATA
	// Total biaya Kirim = Biaya kirim x Total barang
	$totalBiayaKirim = $myData['Biaya_kirim'] * $totalBarang;
	
	// Menghitung total bayar
	$totalBayar = $totalHarga + $totalBiayaKirim;  
	?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="5" align="right" bgcolor="#F5F5F5"><strong>Total Belanja (Rp) : </strong></td>
    <td align="right" bgcolor="#F5F5F5"><?php echo format_angka($totalHarga); ?></td>
  </tr>
  <tr>
    <td colspan="5" align="right"><strong>Total Biaya Kirim  (Rp) : </strong></td>
    <td align="right"><?php echo format_angka($totalBiayaKirim); ?></td>
  </tr>
  <tr>
    <td colspan="5" align="right" bgcolor="#F5F5F5"><strong>GRAND TOTAL  (Rp) : </strong></td>
    <td align="right" bgcolor="#F5F5F5"><b><?php echo format_angka($totalBayar); ?></b></td>
  </tr>
</table>
<?php
} 
else {
	// Kode tidak terbaca
	echo "<meta http-equiv='refresh' content='0; url=?open=Transaksi-Tampil'>";
}
?>
<p><b>* Keterangan Status Pembayaran :</b></p>
<ul>
  <li><b>Pesan :</b> Masih dalam pemesanan (bisa batal), atau <strong>Belum Dibayar</strong>.</li>
  <li><b>Lunas :</b> Pemesanan sudah dibayar Lunas, dan <strong>Dalam Proses Pengiriman</strong>.</li>
  <li><b>Batal :</b> Pemesanan batal.     </li>
</ul>
</body>
</html>
