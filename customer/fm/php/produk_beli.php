<?php

if(isset($_GET['kd'])) {
	// Baca Kode Barang yang dipilih
	$Kode = $_GET['kd'];

					$mySql = "SELECT * FROM produk WHERE id_produk='$Kode'";
					$myQry = mysql_query($mySql, $Koneksi) or die ("Gagal ambil data barang".mysql_error());
					$myData = mysql_fetch_array($myQry);
					$stk=$myData['stok_produk'];

	if ($stk > 0) 
	{	
		$cekSql = "SELECT * FROM keranjang WHERE id_produk='$Kode'";
		$cekQry = mysql_query($cekSql, $Koneksi) or die ("Cek data produk".mysql_error());

		
		// Jika barang sudah pernah dipilih, maka update saja jumlah barangnya (+1)
		if(mysql_num_rows($cekQry) >=1) 
		{
					// Jika barang sudah pernah dipilih, maka update saja jumlah barangnya (+1)
					$mySql = "UPDATE keranjang SET qty_keranjang=qty_keranjang + 1 WHERE id_produk='$Kode'";
					$result_keranjang = mysql_query($mySql)or die("0");

					$stok_baru = $stk - 1;
					$update_barang = "UPDATE produk SET stok_produk ='$stok_baru' WHERE id_produk='$Kode'";
					$result_barang = mysql_query($update_barang)or die("0");
				} 
		else {
					$mySql = "SELECT * FROM produk WHERE id_produk='$Kode'";
					$myQry = mysql_query($mySql, $Koneksi) or die ("Gagal ambil data barang".mysql_error());
					$myData = mysql_fetch_array($myQry);

					$id=$myData['id_produk'];
					$nam=$myData['nama_produk'];
					$har=$myData['harga_produk'];
					$stk=$myData['stok_produk'];
					$diskon=$myData['diskon_produk'];
					$jmlubah="1";
					$tanggal=date('Y-m-d');
	
					$fix = $stk-$jmlubah;
					$Sql = "UPDATE produk SET stok_produk ='$fix' WHERE id_produk='$Kode'";
						
					$query = "INSERT INTO keranjang (id_keranjang,id_produk,produk_keranjang, harga_keranjang,diskon_keranjang, qty_keranjang, tgl_keranjang) 
					VALUES('$kode','$id', '$nam', '$har','$diskon', '1', '$tanggal')";

					$result = mysql_query($query)or die("0");	
					$result1 = mysql_query($Sql)or die("0");	
					
				}		
				echo "<script>location.href='cart.html'</script>";
	
	}
	else {
				echo "<script> alert('Stok tidak Mencukupi!');location.href='produk.html'</script>";
		 }
	}
?>