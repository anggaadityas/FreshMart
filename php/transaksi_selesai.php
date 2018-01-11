<?php	
session_start();

    $Kode=$_GET['Kode'];
    $sql = "SELECT * FROM transaksi Where id_transaksi='$Kode'";
	$tampil = mysql_query($sql);
	while ($tampilkan = mysql_fetch_array($tampil)) 
{ 
		echo'
     	<div class="container">
     	<div class="row">
     	<br><br><br><br>
     	<div class="col-sm-3"></div>
     	<div class="col-sm-6">';
     echo '
     	<div class="panel panel-info">
              <div class="panel-heading">
              <br>
              <h3 class="panel-title" ><i class="fa fa-user fa-lg"> </i> Struk Pembayaran </h3> 
              <br>
              </div>
              <div class="panel-body">
              <div class="table-responsive">
		';
     echo'<br>';
     echo 'Terima kasih Anda sudah berbelanja di Toko Online kami dan berikut ini adalah data yang perlu anda baca terlebih dahulu :
     <br><br>
	 <ul>
	 <li>Total biaya untuk pembelian produk adalah sebesar <strong>Rp. ' . $tampilkan['total_transaksi'] . ',- </strong> dan biaya bisa dikirim ke nomor rekening <strong>123-234-56347-8</strong> atas nama <strong>Freshmart</strong>.</li>
	 <li>Paling lambat batas transfer selama <strong>24 jam</strong> dimulai dari hari ini.</li>
	 <li><strong>Jika melewati batas transfer</strong> yang sudah kami tentukan, maka <strong>barang pemesanan/pembelian akan kami batalkan</strong>.</li>
	 <li>Jika anda sudah melakukan transfer produk pembelian anda, silakan upload bukti transfer ke form <strong>konfirmasi</strong>.</li>
	 </ul>';
	 echo '<p></p>';
	 echo 'Dan produk akan kami kirim ke alamat di bawah ini:';
	 echo '<p></p>';
	 echo 'No.Transaksi 	: ' . $tampilkan['id_transaksi']. '<br>';
	 echo 'Nama Penerima 	: ' . $tampilkan['nama_penerima'] . '<br>';
	 echo 'Nama Lokasi 		: ' . $tampilkan['id_lokasi'] . '<br>';
	 echo 'Alamat Lengkap	: ' . $tampilkan['alamat_lengkap'] . '<br>';  
	 echo 'Kode Pos 		: ' . $tampilkan['kode_pos'] . '<br>'; 
	 echo 'No.Telp          : ' . $tampilkan['no_hp'] . '<br>'; 
	 echo '<div class="text-right">
             <a href="#" class="btn btn-success btn-md" onclick="window.print();return false">Cetak  <i class="fa fa-print"></i></a>
 		   </div>';                        
	 echo'
		</div>
		</div>
		</div>
		</div>
	    <div class="col-sm-4"></div>
	    </div><br><br>
	    </div>';
	}
	    ?>