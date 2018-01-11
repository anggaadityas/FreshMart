<?php 
include '../../config/config.php';

$id=$_POST['id'];
$nama_produk=$_POST['judul'];
$isi=$_POST['isi'];
$hari=$_POST['hari'];
$bulan=$_POST['bulan'];
$penulis=$_POST['penulis'];
$tgl=date('Y-m-d');
$nama_file=$_FILES['gambar']['name'];
$link_awal=$_FILES['gambar']['tmp_name'];
move_uploaded_file($link_awal,"../../../img/$nama_file");
 
 
mysql_query("UPDATE info set id_user='$penulis', nama_artikel='$nama_produk', foto_artikel='$nama_file', ket='$isi', hari='$hari', bulan='$bulan', tgl_artikel='$tgl' where id_info='$id'");
header("location:../artikel");
?>