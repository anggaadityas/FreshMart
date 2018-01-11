<?php
session_start();
error_reporting(0);

# MENGHAPUS DATA BARANG YANG ADA DI KERANJANG
// Membaca Kode dari URL
if(isset($_GET['aksi']) and trim($_GET['aksi'])=="Hapus")
{ 
	// Membaca Id data yang dihapus
	$idHapus	= $_GET['idHapus'];

	$bacaSql	= "SELECT * FROM keranjang WHERE id_keranjang";
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
	$mySql = "DELETE FROM keranjang  WHERE id_keranjang='$idHapus'";
	$myQry = mysql_query($mySql, $Koneksi) or die ("Eror hapus data".mysql_error());
		echo "<meta http-equiv='refresh' content='0; url=cart.html'>";

}

// Mengecek data keranjang belanja
$cekSql = "SELECT * FROM keranjang WHERE id_produk";
$cekQry = mysql_query($cekSql, $Koneksi) or die (mysql_error());
$cekQty = mysql_num_rows($cekQry);
if($cekQty < 1)
{
	echo "<meta http-equiv='refresh' content='0; url=cartkosong.html'>";
}
?>