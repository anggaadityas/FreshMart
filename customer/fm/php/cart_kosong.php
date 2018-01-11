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
              <img src="../../img/home/pricing.png" alt="" />
            </div><!--/shipping-->

            <br>

             <div class="shipping text-center"><!--shipping-->
              <img src="../../img/home/baju.jpg" alt="" />
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
			<form method="post" name="form1">
			<div class="table table-bordered table cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td></td>
						</tr>
					</thead>
<tbody>
						<tr>

							<td>
<?php
	echo "<br><br>";
	echo "<center>";
	echo "<b><h2> KERANJANG BELANJA ANDA KOSONG </h2></b>";
	echo "<br><br><br>";
	echo "<center>";

?>			
						</td></tr>
					</tbody>
				</table>
			</div>
		</div>
	</form>
	</section> <!--/#cart_items-->

	</div>
       </div>