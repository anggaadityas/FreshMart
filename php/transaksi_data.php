<?php
session_start();

# SAAT TOMBOL SIMPAN DIKLIK, Masuk ke proses simpan data
if(isset($_POST['btnSimpan']))
{
	# Baca Variabel Form
	
	$nextID	= $_POST['trx'];
	$nextID	= str_replace("'","&acute;",$nextID);

	$nama	= $_POST['nama'];
	$nama	= str_replace("'","&acute;",$nama);

	$id_lokasi= $_POST['id_lokasi'];
	$id_lokasi= str_replace("'","&acute;",$id_lokasi);

	$alamat_lengkap		= $_POST['alamat_lengkap'];
	$alamat_lengkap	= str_replace("'","&acute;",$alamat_lengkap);
	
	$kd_pos	= $_POST['kd_pos'];
	$kd_pos	= str_replace("'","&acute;",$kd_pos);
	
	$telp	= $_POST['telp'];
	$telp	= str_replace("'","&acute;",$telp);
	
	$rek	= $_POST['rek'];
	$rek= str_replace("'","&acute;",$rek);
	
	$atm	= $_POST['atm'];
	$atm	= str_replace("'","&acute;",$atm);

	$nama_rek	= $_POST['nama_rek'];
	$nama_rek	= str_replace("'","&acute;",$nama_rek);

	// Valiasii id_transaksi, tidak boleh ada yang kembar
					$sqlCek = "SELECT * FROM transaksi WHERE id_transaksi='$nextID'";
					$qryCek = mysql_query($sqlCek,$Koneksi) or die ("Gagal Cek");
					$adaCek = mysql_num_rows($qryCek);
					if($adaCek >= 1) {	
							$pesanError[] = "Failed transaksi, Maaf transaksi dengan Kode<b> $nextID </b> sudah ada, silakan melakukan membelanjaan kembali.";
					}   
                   
	else {
		# SIMPAN DATA KE DATABASE. Jika tidak menemukan pesan error, simpan data ke database
		$tanggal		= date('Y-m-d');
		$totalHarga		= $_POST['totalHarga'];
		$total			= $totalHarga;
		$nextID			= $_POST['trx'];
		$Kode 			= $nextID;
		$total_trans    = $_POST['total'];
		$member 		= 'nomember';
		
		# SIMPAN DATA IDENTITAS PENGIRIMAN KE DATABASE
		$mySql	= "INSERT INTO transaksi (id_transaksi,id_member, tanggal_transaksi, total_transaksi, nama_penerima, id_lokasi,alamat_lengkap, kode_pos, no_hp, nama_bank, no_rek, nama_rek)
		 VALUES('$nextID','$member','$tanggal','$total_trans', '$nama','$id_lokasi', '$alamat_lengkap', '$kd_pos', '$telp', '$rek', '$atm', '$nama_rek')";
		$myQry	= mysql_query($mySql,$Koneksi) or die ("Gagal query 1".mysql_error());
		if($myQry){
			// Membaca data dari TMP (Kantong belanja)
			$bacaSql	= "SELECT * FROM keranjang WHERE id_keranjang";
			$bacaQry	= mysql_query($bacaSql,$Koneksi) or die ("Gagal query 2".mysql_error());
			while ($bacaData = mysql_fetch_array($bacaQry)) {
				// Simpan data dari Keranjang belanja ke Pemesanan_Item
				$Kode_produk 	= $bacaData['id_produk'];
				$Nama 			= $bacaData['produk_keranjang'];
				$Harga			= $bacaData['harga_keranjang'];
				$Jumlah			= $bacaData['qty_keranjang'];
				$tanggal		= date('Y-m-d');
				$nextID			= $_POST['trx'];
				$member 		= 'nomember';
					
				$simpanSql="INSERT INTO detail_transaksi(id_transaksi, id_produk, produk_transaksi, harga_transaksi, qty_transaksi,tgl_transaksi) 
							VALUES('$Kode', '$Kode_produk', '$Nama', '$Harga', '$Jumlah','$tanggal')";
				mysql_query($simpanSql,$Koneksi) or die ("Gagal query simpan".mysql_error());

			}
			
			// Kosongkan data Keranjang milik Pelanggan 
			$hapusSql	= "DELETE FROM keranjang WHERE id_keranjang";
			mysql_query($hapusSql,$Koneksi) or die ("Gagal query hapus keranjang".mysql_error());
			
			// Refresh
			echo "<meta http-equiv='refresh' content='0; url=cekout-$Kode.html'>";
		}
		exit;
	}	
} // End if($_POST)

   # MENGHAPUS DATA BARANG YANG ADA DI KERANJANG
            // Membaca Kode dari URL
        if(isset($_GET['aksi']) and trim($_GET['aksi'])=="Hapus")
{ 
	// Membaca Id data yang dihapus
	$idHapus	= $_GET['idHapus'];

	$bacaSql	= "SELECT * FROM keranjang WHERE id_keranjang";
	$bacaQry	= mysql_query($bacaSql,$Koneksi) or die ("Gagal query 2".mysql_error());
			while ($bacaData = mysql_fetch_array($bacaQry)) 
			{
				// Simpan data dari Keranjang belanja ke Pemesanan_Item
				$Kode_produk 	= $bacaData['id_produk'];
				$Jumlah			= $bacaData['qty_keranjang'];

				$mySql = "UPDATE produk SET stok_produk=stok+$Jumlah WHERE id_produk='$Kode_produk'";
				mysql_query($mySql,$Koneksi) or die ("Gagal query simpan".mysql_error());
			}

	// Menghapus data keranjang sesuai Kode yang dibaca di URL
	$mySql = "DELETE FROM keranjang  WHERE id_keranjang='$idHapus'";
	$myQry = mysql_query($mySql,$Koneksi) or die ("Eror hapus data".mysql_error());

		echo "<meta http-equiv='refresh' content='0; url=cart.html'>";
}

?>
