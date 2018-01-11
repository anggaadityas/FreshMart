<?php

//file pendukung class pdf dan koneksi ke database
require("../../config/config.php");
include ('class.ezpdf.php');

//Pengaturan kertas untuk saat ini tipe kertas A4
$pdf =& new Cezpdf('A3','portrait');


		// Atur margin
		$pdf->ezSetCmMargins(1, 3, 3, 3);

		$pdf->addObject($all, 'all');
		$pdf->closeObject();
		
		//baris kode dibawah ini digunakan untuk mencetak info toko dalam pdf
		$pdf->ezText('FRESHMART', 25, array('justification' => 'center'));
		$pdf->ezSetDy(-6);
		$pdf->ezText('LAPORAN DATA PRODUK', 15, array('justification' => 'center'));
		$pdf->ezSetDy(-10);
		$pdf->ezText('JL.Mangrove 4 Rt.03 Rw.07 Mampang Perapatan XI Kecamatan Jakarta Selatan Kode Pos 1843', 10, array('justification' => 'center'));
		$pdf->ezText('Telp : 081287747040', 10, array('justification' => 'center'));
		$pdf->ezText('Email : anggaadityasundawaa@gmail.com', 10, array('justification' => 'center'));
		$pdf->ezSetDy(-10); //perintah untuk memberikan jarak spasi paragraf
		
		//$pdf->line(50,1500,2273,1500); //perintah untuk membuat garis atas tabel
					
		$pdf->ezSetDy(-10);
		
		$sql = mysql_query("SELECT * FROM produk order by id_produk asc"); 	 	
		$i = 1;
		while($tampil = mysql_fetch_array($sql)) {
			 
			$data[$i]=array('ID'=> $tampil['id_produk'], 	 	
							'KATEGORI'=>$tampil['id_kategori'],
							'NAMA'=>$tampil['nama_produk'],
							'HARGA'=>$tampil['harga_produk'],
							'DISKON'=>$tampil['diskon_produk'],
							'STOK'=>$tampil['stok_produk'],
							'TANGGAL'=>$tampil['tgl_produk'],
							);
								
			$i++;
			
		}
		
		//perintah untuk mengatur teks yang di cetak pada pdf
		//$pdf->ezStartText(100, 557, 12);
		//$pdf->ezStartText2(500, 557, 12);
		$pdf->ezStartPageNumbers(35, 15, 10);
		$pdf->ezTable($data, '', '', '');
		$pdf->ezSetDy(-50);
		
		$pdf->ezText('NB :', 13, array('justification' => 'LEFT')); //membuat teks NB di bawah tabel
		
		$pdf->ezStream();
?>
