<?php
require('../../config/config.php');

	$id	= $_POST['id'];
	$id_kategori	= $_POST['id_kategori'];
	$nama_produk	= $_POST['nama_produk'];
	$harga	= $_POST['harga'];
	$stok	= $_POST['stok'];
	$tgl=date('Y-m-d');
	$nama_file=$_FILES['foto']['name'];
	$link_awal=$_FILES['foto']['tmp_name'];
	move_uploaded_file($link_awal,"../../../img/$nama_file");
	
			$Sql=mysql_query("UPDATE produk set id_kategori = '$id_kategori',nama_produk = '$nama_produk',harga_produk = '$harga',stok_produk = '$stok',diskon_produk='0',foto='$nama_file',tgl_produk='$tgl' where id_produk='$id'");
			echo "<script>location.href='../items'</script>";
?>
