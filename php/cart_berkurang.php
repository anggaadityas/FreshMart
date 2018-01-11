<?php

if(isset($_GET['kd'])) {
	// Baca Kode Barang yang dipilih
	$Kode = $_GET['kd'];
	$jml  = $_GET['txtJum'];


					$mySql = "SELECT * FROM produk WHERE id_produk='$Kode'";
					$myQry = mysql_query($mySql, $Koneksi) or die ("Gagal ambil data barang".mysql_error());
					$tampil = mysql_fetch_array($myQry);
					$stk=$tampil['stok_produk'];

		
		// Jika barang sudah pernah dipilih, maka update saja jumlah barangnya (-1)
		if ($jml <= 1) 
	{

					// Jika barang sudah pernah dipilih, maka update saja jumlah barangnya (-1)
					$mySql = "UPDATE keranjang SET qty_keranjang=qty_keranjang - 1 WHERE id_produk='$Kode'";
					$result_keranjang = mysql_query($mySql)or die("0");

					$stok_baru = $stk + 1;
					$update_barang = "UPDATE produk SET stok_produk ='$stok_baru' WHERE id_produk='$Kode'";
					$result_barang = mysql_query($update_barang)or die("0");

					echo "<script>location.href='cart.html'</script>";
	}
	else {
				echo "<script> alert('Stok tidak Mencukupi!');location.href='cart.html'</script>";
		 }
	}

?>