<?php
include"../../config/config.php";

if($_POST)
{

$q=$_POST['searchword'];

$sql_res=mysql_query("SELECT * from info where nama_artikel like '%$q%' or kategori like '%$q%' order by id_info LIMIT 5");
while($row=mysql_fetch_array($sql_res))
{
$nama_produk=$row['nama_artikel'];
$id_kategori=$row['kategori'];
$foto=$row['foto_artikel'];

$re_nama_produk='<b>'.$q.'</b>';
$re_id_kategori='<b>'.$q.'</b>';

$final_nama_produk = str_ireplace($q, $re_nama_produk, $nama_produk);

$final_id_kategori = str_ireplace($q, $re_id_kategori, $id_kategori);


?>
<div class="kotak_hasilpencarian" align="left">

<a href="detail-artikel-<?php echo $row['id_info'];?>-<?php echo $row['nama_artikel'];?>.html"><img src="../img/<?php echo $foto; ?>" style="width:100px; float:left; margin-right:6px" /></a><?php echo $final_nama_produk; ?><br/>
<span style="font-size:11px;"><?php echo $final_id_kategori; ?></span></div>
<?php
}

}
else
{
}

?>
