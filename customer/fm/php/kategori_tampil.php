<!-- Menampilkan produk dan kategori produk -->
<?php
if(isset($_GET['id_kategori']))

  {
    $id_kategori = $_GET['id_kategori']; 
  }
  include("config/config.php");

$query = "SELECT * from produk order by id_produk DESC";
$hasil = mysql_query($query);
$numrows = 9;
$jumlah = mysql_num_rows($hasil);
$jumlah2 =mysql_num_rows($hasil);
$limit = 6;
$limit2 = 6;
  
  $p      = new paging3;
  $batas  = 6;
  $posisi = $p->cariPosisi($batas);


if((isset($id_kategori)) ==''){
  if (empty($offset)) {
    $offset = 0;
  }
  if(isset($_GET['offset'])){$offset = $_GET['offset']; }
  $query = "SELECT * from produk order by id_produk desc LIMIT $offset, $limit";
  $hasil = mysql_query($query);
  $numrows = mysql_num_rows($hasil);
  echo "<div align=\"right\"><ul class=\"pagination\">";
    $halaman = intval($jumlah/$limit);
    if ($jumlah%$limit) { 
      $halaman++; 
    } 
      for ($i=1;$i<=$halaman;$i++) {
        $newoffset=$limit*($i-1); 
          if ($offset!=$newoffset)
            { 
            echo "<li><a href=\"hal-produk-$newoffset.html\">$i</a></li>";
          } else { 
            echo "<li class=\"active\"><a href=\"hal-produk-$newoffset.html\">$i</a></li>"; 
          } 
      }
            echo "</div></ul>";
}
else
{
  if (empty($offset)) {
    $offset = 0;
  }
  if(isset($_GET['offset'])){$offset = $_GET['offset']; }
  $query = "SELECT * from produk where id_kategori = '$id_kategori' order by id_produk desc LIMIT $posisi, $batas";
  $hasil = mysql_query($query);
  $numrows = mysql_num_rows($hasil);
  echo "<div align=\"right\"><ul class=\"pagination\">";

  $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM produk WHERE id_kategori='$id_kategori'"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman($_GET[halkategori], $jmlhalaman);


            echo "$linkHalaman";
            echo "</div></ul>";
          }  

?>
