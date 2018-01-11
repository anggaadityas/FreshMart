				<?php
				error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
				if(isset($_POST['send']))
				{

				$kode   =$_POST['tkode'];
				$name   =$_POST['tnama'];
				$namel  =$_POST['namalengkap'];
				$email  =$_POST['temail'];
				$alamat =$_POST['talamat'];
				$jenis 	=$_POST['jenis'];
				$tlp 	=$_POST['ttlp'];
				$ktp 	=$_POST['tktp'];
				$tgl	=date('Y-m-d');
				$pass   = $_POST['password'];
				$password	= md5($pass);
				$c_password = $_POST['c_password'];
				$pass		= md5($c_password);

				if($password != $pass)
				{
				print "<script>alert('Konfirmasi password harus sama dengan password !'); 
				javascript:history.go( - 1);</script>";
				exit;
				}
					// Valiasii id_member, tidak boleh ada yang kembar
					$sqlCek = "SELECT * FROM member WHERE email_member='$email'";
					$qryCek = mysql_query($sqlCek,$Koneksi) or die ("Gagal Cek");
					$adaCek = mysql_num_rows($qryCek);
					if($adaCek >= 1) {	
							$pesanError[] = "Failed Registrasi, Maaf email<b> $email </b> sudah terdaftar.";
					}


				elseif((!empty($kode)) && (!empty($name)) && (!empty($email)) && (!empty($password)) && (!empty($alamat)) && (!empty($jenis)) && (!empty($tlp)) && (!empty($ktp)) && (!empty($tgl)) )
				{
				$aktivasi = md5(uniqid(rand(), true));
				$query =mysql_query("INSERT INTO member (id_member,nama_akun,nama_lengkap,email_member,password,alamat,jenis_kelamin,telp,no_ktp,tgl_member,aktivasi) values ('$kode','$name','$namel','$email','$password','$alamat','$jenis','$tlp','$ktp','$tgl','$aktivasi')");
				$pesan = " Untuk aktivasi pendaftaran silahkan klik link konfirmasi yang ada dibawah ini \n\nKlik link aktifasi http://localhost/program/freshmart/php/aktif.php?email=".$email."&key=".$aktivasi;
				mail($email,'Registrasi Pendaftaran',$pesan);
				}

				else
				{
				print "<script>alert('Maaf, tidak boleh ada field yang kosong !');
				javascript:history.go( - 1);</script>";
				}

				} // End if($_POST)
				?>

				<?php
					$sql=mysql_query("SELECT * FROM member order by id_member DESC LIMIT 0,1");
					$data=mysql_fetch_array($sql);
					$kodeawal=substr($data['id_member'],4,5)+1;
					if ($kodeawal <10) {
					$kode='FM000'.$kodeawal;}
  					elseif ($kodeawal > 9 && $kodeawal <=99) {
 					$kode='FM00'.$kodeawal;}
  					else{
   					$kode='FM00'.$kodeawal;
  					}
				?>

<div class="modal fade" id="registrasi" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<form class="form-horizontal" action="<?php $_SERVER['PHP_SELF']; ?>" target="_self" method="post">
					<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h2><span class="fa fa-fw fa-users"></span>Daftar</h2>
					</div>
					<input type="hidden" name="tkode" value="<?php echo $kode;?>"/>

					<div class="modal-body">
					<?php
						# JIKA ADA PESAN ERROR DARI VALIDASI
					if (count($pesanError)>=1 ){
						echo "<center><br>";
						echo "<div class='alert alert-danger alert-dismissable'>";
						echo "<a class='close' data-dismiss='alert' href='#'>&times</a>";
							$noPesan=0;
							foreach ($pesanError as $indeks=>$pesan_tampil) { 
							$noPesan++;
								echo "<p class='alert-heading' align='center'> $noPesan. $pesan_tampil</p><br>";	
							} 
						echo "</div></center>";
					}        
					?>  

				<div class="form-group">
					<label for="contact-name" class="col-lg-3 control-label">Nama Akun :</label>
				<div class="col-lg-8">
					<input type="text" class="form-control" name="tnama" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',this)"id="contact-name" maxlength="3" placeholder="XXX" autofocus
					required>
				<span class="help-block">*Username hanya 3 karakter dan hanya boleh huruf.</span>
				</div>
				</div>

				<div class="form-group">
					<label for="contact-name" class="col-lg-3 control-label"> Nama Lengkap :</label>
				<div class="col-lg-8">
					<input type="text" class="form-control" name="namalengkap" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ',this)"id="contact-name" maxlength="36" placeholder="Nama Lengkap" autofocus
					required>
				</div>
				</div>

				<div class="form-group">
					<label for="contact-name" class="col-lg-3 control-label"> Alamat :</label>
				<div class="col-lg-8">
					<textarea type="text" class="form-control" name="talamat" id="contact-name" placeholder="Alamat Lengkap"
					required></textarea>
				</div>
				</div>

				 <div class="form-group">
                     <label for="contact-name" class="col-lg-3 control-label">Jenis Kelamin :</label>
                 <div class="col-lg-8">
                     <select class="form-control" name="jenis" id="contact-name" required="">
                        <option>-Pilih-</option>
                        <option>Perempuan</option>
                        <option>Laki-laki</option>
                    </select>
                </div>
                </div>

                <div class="form-group">
                	<label for="contact-name" class="col-lg-3 control-label"> No.Tlp :</label>
                <div class="col-lg-8">
                	<input type="tel" class="form-control" onKeyPress="return goodchars(event,'0123456789',this)" name="ttlp" id="contact-name" placeholder="No.Telephone" required="">
                </div>
            	</div>

            	<div class="form-group">
                	<label for="contact-name" class="col-lg-3 control-label"> No.KTP :</label>
                <div class="col-lg-8">
                	<input type="text" class="form-control" name="tktp" onKeyPress="return goodchars(event,'0123456789',this)" id="contact-name" placeholder="No.Kartu Tanda Penduduk" required="">
                </div>
            	</div>

            	<div class="form-group">
					<label for="contact-name" class="col-lg-3 control-label">Email :</label>
				<div class="col-lg-8">
					<input type="email" class="form-control" name="temail" id="contact-name" placeholder="Email" required="">
				</div>
				</div>

				<div class="form-group">
					<label for="contact-name" class="col-lg-3 control-label">Kata Kunci :</label>
				<div class="col-lg-8">
					<input type="password" class="form-control" name="password" minlength="8"  id="contact-name" placeholder="Kata Kunci" required="">
				</div>
				</div>

				<div class="form-group">
					<label for="contact-name" class="col-lg-3 control-label"> Konfrimasi Kata Kunci :</label>
				<div class="col-lg-8">
					<input type="password" class="form-control" name="c_password" id="contact-name" placeholder="Masukan Kata Kunci Ulang" required="">
				</div>
				</div>
		
				</div>

				<div class="modal-footer">
                     <h5 class="pull-left">Copyright by : <a href="http://www.Fristmart.com">Fristmart.com</a></h5>
                     <button type="submit" name="send" class="btn btn-primary">Kirim</button>
                     <a class="btn btn-danger" data-dismiss="modal">Batal</a>
                </div>
			</form>
		</div>
	</div>
</div>