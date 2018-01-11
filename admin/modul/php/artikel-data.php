<?php

$title=$_POST['judul'];
$isi=$_POST['isi'];
$penulis=$_POST['penulis'];
$hari=$_POST['hari'];
$bulan=$_POST['bulan'];
$tgl=date('Y-m-d');
$nama_file=$_FILES['gambar']['name'];
$link_awal=$_FILES['gambar']['tmp_name'];
move_uploaded_file($link_awal,"../../img/$nama_file");

$input="INSERT INTO info(id_user,nama_artikel,foto_artikel,ket,hari,bulan,tgl_artikel) VALUES ('$penulis','$title','$nama_file','$isi','$hari','$bulan','$tgl')";
$simpan=mysql_query($input) or die("Tidak bisa input").mysql_error();
echo "<script>location.href='artikel'</script>";
?>