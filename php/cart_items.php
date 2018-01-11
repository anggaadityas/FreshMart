<?php
session_start();
  $sql = mysql_query("SELECT SUM(qty_keranjang*harga_keranjang) as total,SUM(qty_keranjang) as totaljumlah FROM keranjang");
                      
  while($r=mysql_fetch_array($sql)){

  if ($r['totaljumlah'] != "")
{
    $total_rp    = ($r['total']);

    echo "<strong><span class='badge'>$r[totaljumlah]</span> Data Produk</strong>
          <hr>
          <strong>Total: <span>Rp. $total_rp</strong></span>
          <br>
            <a href='cart.html'><strong><span>Lihat Cart</strong></a>";  }
  else
  {
    echo "<strong><span> 0 Data Produk<span/></strong>
          <hr>";
  } 
}
?>
