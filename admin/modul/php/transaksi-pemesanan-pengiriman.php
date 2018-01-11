<?php


// Keterangan : Skrip ini untuk menjalankan Aksi dari file program pemesanan_lihat.php dan pemesanan_tampil.php

# Membaca Kode dari URL
if(empty($_GET['Kode'])){
	echo "<b>Data yang diubah tidak ada</b>";
}
else {
	# MEMBACA KODE
	$Kode	= $_GET['Kode'];
	
	# JIKA KLIK TOMBOL LUNAS, maka status Pemesanan jadi Lunas
	if($_GET['Aksi']=="Dikirim") {
		$editSql = "UPDATE transaksi SET status_pengiriman='Dikirim' WHERE id_transaksi='$Kode'";
		$editQry = mysql_query($editSql, $koneksi) or die ("Eror Query Edit".mysql_error());
			// Refresh
			echo "<meta http-equiv='refresh' content='0; url=pemesanan'>";

	}
	
	// JIKA KLIK TOMBOL PESAN, maka status Pemesanan jadi Pesan 
	if($_GET['Aksi']=="Pending") {
		# Jika sudah terlanjur di Set Lunas (sudah bayar), ternyata salah
		# Ternyata belum bayar (pembayaran batal, atau mungkin uangnya tidak sampai/kembali)
		$editSql = "UPDATE transaksi SET status_pengiriman='Pending' WHERE id_transaksi='$Kode'";
		$editQry = mysql_query($editSql, $koneksi) or die ("Eror Query Edit".mysql_error());
			// Refresh
			echo "<meta http-equiv='refresh' content='0; url=pemesanan'>";
	}
}
?>