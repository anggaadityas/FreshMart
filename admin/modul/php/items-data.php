<?php

$nama_produk=$_POST['nama_produk'];
$jenis=$_POST['kategori'];
$stok=$_POST['stok'];
$price=$_POST['harga'];
$tgl=date('Y-m-d');
$nama_file=$_FILES['gambar']['name'];
$link_awal=$_FILES['gambar']['tmp_name'];
move_uploaded_file($link_awal,"../../img/$nama_file");

$input=" INSERT INTO produk (id_kategori,nama_produk,harga_produk,stok_produk,satuan_produk,foto,tgl_produk) VALUES ('$jenis','$nama_produk','$price','$stok','Kg','$nama_file','$tgl')";
$simpan=mysql_query($input) or die("Tidak bisa input").mysql_error();
echo"<script>location.href='items'</script>";
?>