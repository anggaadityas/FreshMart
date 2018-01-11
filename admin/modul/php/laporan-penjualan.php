<?php

//file pendukung class pdf dan koneksi ke database
require("../../config/config.php");
include ('class.ezpdf.php');

//Pengaturan kertas untuk saat ini tipe kertas A4
$pdf =& new Cezpdf('A1','portrait');


		// Atur margin
		$pdf->ezSetCmMargins(1, 3, 3, 3);

		$pdf->addObject($all, 'all');
		$pdf->closeObject();
		
		//baris kode dibawah ini digunakan untuk mencetak info toko dalam pdf
		$pdf->ezText('FRESHMART', 25, array('justification' => 'center'));
		$pdf->ezSetDy(-6);
		$pdf->ezText('LAPORAN DATA PENJUALAN', 15, array('justification' => 'center'));
		$pdf->ezSetDy(-10);
		$pdf->ezText('JL.Mangrove 4 Rt.03 Rw.07 Mampang Perapatan XI Kecamatan Jakarta Selatan Kode Pos 1843', 10, array('justification' => 'center'));
		$pdf->ezText('Telp : 081287747040', 10, array('justification' => 'center'));
		$pdf->ezText('Email : anggaadityasundawaa@gmail.com', 10, array('justification' => 'center'));
		$pdf->ezSetDy(-10); //perintah untuk memberikan jarak spasi paragraf
		
		//$pdf->line(50,1500,2273,1500); //perintah untuk membuat garis atas tabel
					
		$pdf->ezSetDy(-10);
		
//$sql1 = mysql_query("SELECT * FROM transaksitbl"); 	 	
//$hasil = mysql_query($sql1);
//$numrows = mysql_num_rows($sql1);

   //echo "Pengulangan ke " . $x . "<br/>;

//while($cari = mysql_fetch_array($sql1)) {
		//$idx= $cari['notransaksi'];
		//$pdf->ezText($idx, 13, array('justification' => 'LEFT'));

//for($x=$cari['notransaksi']; $x<=$numrows; $x++)
//{
	
	$sql = mysql_query("SELECT * FROM transaksi inner join detail_transaksi on transaksi.id_transaksi = detail_transaksi.id_transaksi"); 	 	
		$i = 1;
		while($tampil = mysql_fetch_array($sql)) {
		
			$format_harga  = number_format($tampil['harga_transaksi'], 0, ',', '.');//format angka
			$total         = $tampil['harga_transaksi'] * $tampil['qty_transaksi'];
			 
			$data[$i]=array('FAKTUR'=> $tampil['id_transaksi'], 	 	
							'MEMBER'=>$tampil['id_member'],
							'PRODUK'=>$tampil['produk_transaksi'],
							'HARGA'=>$format_harga,
							'JUMLAH'=>$tampil['qty_transaksi'],
							'SUB TOTAL'=>$total,
							'NAMA PENERIMA' =>$tampil['nama_penerima'],
							'ID LOKASI'=>$tampil['id_lokasi'],
							'ALAMAT'=>$tampil['alamat_lengkap'],
							'KODE POS'=>$tampil['kode_pos'],
							'TLP'=>$tampil['no_hp'],
							'BANK'=>$tampil['nama_bank'],
							'NO.REK'=>$tampil['no_rek'],
							'NAMA REK'=>$tampil['nama_rek'],
							'STATUS BAYAR'=>$tampil['status_bayar'],
							'STATUS PENGIRIMAN'=>$tampil['status_pengiriman'],
							);
								
			$i++;
			
		}
		
//$x++;
//}
//}
		//perintah untuk mengatur teks yang di cetak pada pdf
		//$pdf->ezStartText(100, 557, 12);
		//$pdf->ezStartText2(500, 557, 12);
		$pdf->ezStartPageNumbers(35, 15, 10);
		$pdf->ezTable($data, '', '', '');
		$pdf->ezSetDy(-50);
		
		$pdf->ezText('NB :', 13, array('justification' => 'LEFT')); //membuat teks NB di bawah tabel
		
		$pdf->ezStream();
?>
