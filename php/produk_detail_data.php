<?php
include_once "../config/config.php";
$cek=$_POST['id_produk'];
$id=$cek;


$mySql = "SELECT * FROM produk WHERE id_produk='$id'";
					$myQry = mysql_query($mySql,$Koneksi) or die ("Gagal ambil data barang".mysql_error());
					$myData = mysql_fetch_array($myQry);
					$stk=$myData['stok_produk'];

if ($stk > 0) 
	{	
	$cekSql = "SELECT * FROM keranjang WHERE id_produk='$id'";
	$cekQry = mysql_query($cekSql,$Koneksi) or die ("Cek data produk".mysql_error());
	$jumlah=$_POST['jumlah'];

	if(mysql_num_rows($cekQry) >=1) 
	{
	
	if($jumlah <=1){
	echo "<script>window.alert('Penginputan data tidak boleh minus!');
	window.location=('../produk.html')</script>";
	}
	else{

		// Jika barang sudah pernah dipilih, maka update saja jumlah barangnya (+1)
		$mySql = "UPDATE keranjang SET qty_keranjang=qty_keranjang + $jumlah WHERE id_produk='$id'";
		$result_keranjang = mysql_query($mySql,$Koneksi)or die("0");

		$stok_baru = $stk - $jumlah;
		$update_barang = "UPDATE produk SET stok_produk ='$stok_baru' WHERE id_produk='$id'";
		$result_barang = mysql_query($update_barang)or die("0");
		echo "<script>location.href='../cart.html'</script>";
	}
	
	}
	elseif ($jumlah > $stk){
	echo "<script>window.alert('Jumlah yang dibeli melebihi stok yang ada');
	window.location=('../produk.html')</script>";
	}
	elseif($jumlah == 0){
	echo "<script>window.alert('Anda tidak boleh menginputkan angka 0 atau mengkosongkannya!');
	window.location=('../produk.html')</script>";
	}
	elseif($jumlah <=0){
	echo "<script>window.alert('Penginputan data tidak boleh minus!');
	window.location=('../produk.html')</script>";
	}
	else {
		// Jika barang belum pernah dipilih, maka tambahkan baris baru ke keranjang
		$cek=$_POST['id_produk'];
		$id=$cek;
		$mySql = "SELECT * FROM produk WHERE id_produk='$id'";
		$myQry = mysql_query($mySql,$Koneksi) or die ("Gagal ambil data barang".mysql_error());
		$myData = mysql_fetch_array($myQry);
		
		// Membaca data dari tabel Barang, untuk diinput ke tabel TMP
		$id=$myData['id_produk'];
		$nama_produk=$myData['nama_produk'];
		$price=$myData['harga_produk'];
		$stk=$myData['stok_produk'];
		$diskon=$myData['diskon_produk'];
		$tanggal= date('Y-m-d');
	
		$stok_baru = $stk - $jumlah;
		$Sql = "UPDATE produk SET stok_produk='$stok_baru' WHERE id_produk='$id'";
		
		// Simpan data ke TMP (Keranjang Belanja)
		$input1=" INSERT INTO keranjang(id_produk, produk_keranjang, harga_keranjang, diskon_keranjang, qty_keranjang,tgl_keranjang) VALUES ('$id','$nama_produk','$price','$diskon','$jumlah','$tanggal')";

		$result = mysql_query($Sql)or die("1");	
		$result1 = mysql_query($input1)or die("2");	
		echo "<script>location.href='../cart.html'</script>";	
		}		
}
else {
		echo "<script> alert('Stok tidak Mencukupi!');location.href='../produk.html'</script>";
	}
?>

