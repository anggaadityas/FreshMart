<?php

# MEMERIKSA DATA DALAM KERANJANG
$cekSql = "SELECT * FROM keranjang WHERE id_keranjang";
$cekQry = mysql_query($cekSql, $Koneksi) or die (mysql_error());
$cekQty = mysql_num_rows($cekQry);
if($cekQty < 1){
	echo "<meta http-equiv='refresh' content='0; url=cartkosong.html'>";
}


	// Delete all cart entries older than one day

function deleteAbandonedCart(){
	$kemarin = date('Y-m-d', mktime(0,0,0, date('m'), date('d') - 1, date('Y')));
	mysql_query("DELETE FROM keranjang 
	        WHERE tgl_keranjang < '$kemarin'");
}

?>
<br><br>
    <div class="container">
      <div class="row">

        <div class="col-sm-3">
          <div class="left-sidebar">

            
            <h2>Kategori</h2>
           <div id="sidebar">
          <ul>
         <?php
         include"kategori_link_produk.php";
         ?>
          </ul>
      </div>
      <br>

            <div class="shipping text-center"><!--shipping-->
              <img src="img/home/pricing.png" alt="" />
            </div><!--/shipping-->

            <br>

             <div class="shipping text-center"><!--shipping-->
              <img src="img/home/baju.jpg" alt="" />
            </div><!--/shipping-->
        
          </div>
        </div>
        <div class="col-sm-9 padding-right">
       <section id="cart_items">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Keranjang Belanja</li>
				</ol>
			</div>
			<form method="get" action="#">
			<div class="table table-bordered table cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Produk</td>
							<td class="description"></td>
							<td class="price">Harga</td>
							<td class="quantity">Jumlah</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<?php

	// Menampilkan data Barang dari tmp_keranjang (Keranjang Belanja)
	$mySql = "SELECT produk.nama_produk, produk.foto, kategori.nama_kategori, keranjang.*
			FROM keranjang
			LEFT JOIN produk ON keranjang.id_produk=produk.id_produk
			LEFT JOIN kategori ON produk.id_kategori=kategori.id_kategori 
			WHERE keranjang.id_keranjang 
			ORDER BY keranjang.id_keranjang";
	$myQry = mysql_query($mySql, $Koneksi) or die ("Gagal SQL".mysql_error());
	$total = 0; $grandTotal = 0;
	$no	= 0;
	while ($myData = mysql_fetch_array($myQry)) {
	  $no++;
	   // Menghitung sub total harga
	  $total 		= $myData['harga_keranjang'] * $myData['qty_keranjang'];
	  $grandTotal	= $grandTotal + $total;
	  
	  // Menampilkan gambar
	  if ($myData['foto']=="") {
			$Gambar = "img/noimage.jpg";
	  }
	  else {
			$Gambar	= $myData['foto'];
	  }
	  
	  #Kode Barang
	  $Kode = $myData['id_produk'];
	?>
					<tbody>
						<tr>
							<td class="cart_product">
								<a href=""><img src="img/<?php echo $Gambar; ?>" width="150px"alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?php echo $myData['nama_produk']; ?></a></h4>
								<p><?php echo $myData['nama_kategori']; ?></p>
							</td>
							<td class="cart_price">
								<h4>Rp.<?php echo $myData['harga_keranjang'];?></h4>
							</td>
						  <td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" href="cart-tambah-<?php echo $myData['id_produk'];?>-<?php echo $myData['nama_produk'];?>.html"> + </a>
									<strong><input class="cart_quantity_input" readonly required="" name="txtJum" type="number" value="<?php echo $myData['qty_keranjang']; ?>" size="2" maxlength="2"></strong>
									<a class="cart_quantity_down" href="cart-berkurang-<?php echo $myData['id_produk'];?>-<?php echo $myData['nama_produk'];?>.html"> - </a>
								</div>
						
					      </td>
							<td class="cart_total">
								<h4><strong>Rp. <?php echo $total; ?></strong></h4>
							</td>
							<td class="cart_delete">
								<a onclick="return confirm('Anda yakin ingin hapus?');"  class="cart_quantity_delete" href="cart-hapus-<?php echo $myData['id_keranjang'];?>.html"><i class="fa fa-times"></i></a>
							</td>			
						</tr>
						<?php 
						} 
						?>
    <tr>
      <td align="center" class="cart_total" align="top">&nbsp;</td>
      <td>&nbsp;</td>
      <td colspan="2" class="cart_total" align="right"><h3><strong>GRAND TOTAL   : </strong></h3></td>
      <td  class="cart_total"><h3><strong><?php echo "Rp. ".$grandTotal; ?></strong></h3></td>
      <td>&nbsp;</td>
    </tr>
					</tbody>
				</table>
			</div>
			<a class="btn btn-default update" href="produk.html">Lanjutkan Belanja</a>
			<a class="btn btn-default check_out" href="transaksi-<?php echo "$grandTotal";?>.html"> Selesai Belanja</a><br>
		</div>
	</form>
	</section> <!--/#cart_items-->

	</div>
       </div>