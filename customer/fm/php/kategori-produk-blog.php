<?php
$cek="SELECT nama_kategori, kategori.id_kategori, nama_kategori, 
	  count(produk.id_produk) as jml From kategori left join produk
	  on produk.id_kategori=kategori.id_kategori
	  group by id_kategori";
$hasil=mysql_query($cek);
if ($hasil > 0) {
		echo "<ul class='list-unstyled'>
		<li><i class='fa fa-angle-right pr-10'>
             </i><a href=\"produk.html\">&nbsp;&nbsp;Semua</a>
		</li>";
	while($data=mysql_fetch_array($hasil))
		{
			
		echo "<ul class='list-unstyled'>
		<li><i class='fa fa-angle-right pr-10'></i><a href=\"kategori-$data[id_kategori].html\">&nbsp;&nbsp;$data[nama_kategori]</a>
		<span class='badge'>$data[jml]</span></li></ul></ul>";
			
		}
}
?>