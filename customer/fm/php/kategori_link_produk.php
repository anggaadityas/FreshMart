<?php
$cek="SELECT nama_kategori, kategori.id_kategori, nama_kategori, 
    count(produk.id_produk) as jml From kategori left join produk
    on produk.id_kategori=kategori.id_kategori
    group by id_kategori";
$hasil=mysql_query($cek);
if ($hasil > 0) {
    echo "<li>
     <a href=\"produk.html\">Semua</a><li>";
  while($data=mysql_fetch_array($hasil))
    {
      
    echo "<li><a href=\"kategori-$data[id_kategori].html\">$data[nama_kategori] <span class='badge'>$data[jml]</li></a>";
      
    }
}
?>