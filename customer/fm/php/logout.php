<?php
session_start();
include "../../config/config.php";
unset($_SESSION['uname']);

	$bacaSql	= "SELECT * FROM keranjang";
	$bacaQry	= mysql_query($bacaSql, $Koneksi) or die ("Gagal query 2".mysql_error());
			while ($bacaData = mysql_fetch_array($bacaQry)) 
			{
				// Simpan data dari Keranjang belanja ke Pemesanan_Item
				$Kode_produk 	= $bacaData['id_produk'];
				$Jumlah			= $bacaData['qty_keranjang'];

				$mySql = "UPDATE produk SET stok_produk=stok_produk+$Jumlah WHERE id_produk='$Kode_produk'";
				mysql_query($mySql,$Koneksi) or die ("Gagal query simpan".mysql_error());
			}

	// Menghapus data keranjang sesuai Kode yang dibaca di URL
	$mySql = "DELETE FROM keranjang ";
	$myQry = mysql_query($mySql, $Koneksi) or die ("Eror hapus data".mysql_error());
		echo "<meta http-equiv='refresh' content='0; url=../../index.html'>";

  session_destroy();
echo"<script>location.href='../../index.html';</script>'";
?>