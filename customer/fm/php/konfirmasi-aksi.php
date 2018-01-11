<?php
include"../../config/config.php";
//Buat konfigurasi upload
//Folder tujuan upload file
$eror		= false;
$folder		= './../../../admin/bukti-trans/$nama_file';
//type file yang bisa diupload
$file_type	= array('jpg','jpeg','png');
//tukuran maximum file yang dapat diupload
$max_size	= 50000; // 50kb
if(isset($_POST['send'])){
	//Mulai memorises data
	$Kode		= $_POST['notrans'];
	$file_name	= $_FILES['gambar']['name'];
	$file_size	= $_FILES['gambar']['size'];
	//cari extensi file dengan menggunakan fungsi explode
	$explode	= explode('.',$file_name);
	$extensi	= $explode[count($explode)-1];
	
	//check data no transaksi
	$sqlCek = "SELECT * FROM transaksi WHERE id_transaksi='$Kode'";
	$qryCek = mysql_query($sqlCek,$Koneksi) or die ("Gagal Cek");
	$adaCek = mysql_num_rows($qryCek);
	$Kode 	= $adaCek['id_transaksi'];
	if($adaCek = $Kode )
	{	
		$eror   = true;
		$pesan  = '- Nomor transaksi tidak ada';
	}
	//check apakah type file sudah sesuai
	if(!in_array($extensi,$file_type))
	{
		$eror   = true;
		$pesan  = '- Type file yang anda upload tidak sesuai';
	}
	if($file_size > $max_size)
	{
		$eror   = true;
		$pesan  = '- Ukuran file melebihi batas maximum';
	}
	//check ukuran file apakah sudah sesuai
	if($eror == true)
	{
		echo"<script>
				alert('$pesan');location.href='../home.html';
			</script>";
	}
	else
	{
			$nama_file=$_FILES['gambar']['name'];
			$link_awal=$_FILES['gambar']['tmp_name'];
			$direktori="../../../admin/bukti-trans/$nama_file";
		//mulai memproses upload file
		if(move_uploaded_file($link_awal,"$direktori"))
		{
			//catat nama file ke database
			$catat = mysql_query('insert into konfirmasi(id_transaksi,nama_pembeli,jumlah_transaksi,tgl_konfirmasi,gambar) values ("'.$_POST['notrans'].'","'.$_POST['nama'].'","'.$_POST['jumtrans'].'","'.date('Y-m-d H:i:s').'","'.$file_name.'")');
			echo"<script>
				alert('Data konfirmasi berhasil diupload');location.href='../home.html';
				</script>";
		}
		else
		{
			echo "Proses upload eror";
		}
	}
}
?>