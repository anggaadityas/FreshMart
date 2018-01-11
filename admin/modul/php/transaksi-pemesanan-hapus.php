<?php
//memulai proses hapus data

//cek dahulu, apakah benar URL sudah ada GET id -> hapus.php?id=siswa_id

	
	//inlcude atau memasukkan file koneksi ke database
	$host="localhost";
        $user="root";
        $pass="";
        $db="db_freshmart";
        $Koneksi=mysql_connect($host,$user,$pass);
        mysql_select_db($db);
	
	//membuat variabel $id yg bernilai dari URL GET id -> hapus.php?id=siswa_id
	$id = $_GET['id'];

		
		//jika data ada di database, maka melakukan query DELETE table siswa dengan kondisi WHERE siswa_id='$id'
		$del = "DELETE FROM transaksi WHERE id_transaksi='$id'";
		$editQry = mysql_query($del,$Koneksi) or die ("Erorr Query Edit".mysql_error());
		if($editQry)
		{
			# Pindahkan data dari pemesanan Item (belum dibayar) ke Penjualan Item (sudah dibayar)
			$itemSql = "SELECT * FROM transaksi WHERE id_transaksi='$id'";
			$itemQry = mysql_query($itemSql,$Koneksi) or die ("Gagal query ambil data".mysql_error());
			while ($itemRow = mysql_fetch_array($itemQry))
			{		
				$jumlahBrg 	= $itemRow['qty_transaksi'];
				$kodeBrg	= $itemRow['id_produk'];
				$id 		= $itemRow['id_transaksi'];

				# Update stok
				$mySql = "UPDATE produk SET stok_produk=stok_produk + $jumlahBrg WHERE id_produk='$kodeBrg'";
				mysql_query($mySql,$Koneksi) or die ("Gagal query update stok".mysql_error());

				$del2= "DELETE FROM detail_transaksi WHERE id_transaksi='$id'";
				mysql_query($del2,$Koneksi) or die ("Gagal delete id_transaksi".mysql_error());
			}
		echo "<script>location.href='pemesanan'</script>";
		
		}
	
?>