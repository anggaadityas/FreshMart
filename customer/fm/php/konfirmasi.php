<div class="modal fade" id="konfirmasi" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<form class="form-horizontal" enctype='multipart/form-data' action="php/konfirmasi-aksi.php" method="post">
					<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h2><span class="fa fa-fw fa-users"></span>Konfirmasi</h2>
					</div>

					<div class="modal-body">

				<div class="form-group">
				<label for="contact-name" class="col-lg-3 control-label">No.Transaksi :</label>
				<div class="col-lg-4">
          		<input class="form-control" type="text" name="notrans" placeholder="TRX00XXX" maxlength="8" required=""/>
        		</div>
        		</div>

				<div class="form-group">
					<label for="contact-name" class="col-lg-3 control-label"> Nama Pembeli :</label>
				<div class="col-lg-8">
					<input type="text" class="form-control" name="nama" id="contact-name" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ',this)"  placeholder="Nama Pembeli" required=""/>
				</div>
				</div>

				<div class="form-group">
					<label for="contact-name" class="col-lg-3 control-label"> Jumlah Transfer :</label>
				<div class="col-lg-8">
					<input type="text" class="form-control" name="jumtrans" id="contact-name" onKeyPress="return goodchars(event,'0123456789',this)" placeholder="Jumlah Transfer" required=""/>
				</div>
				</div>

				<div class="form-group">
					<label for="contact-name" class="col-lg-3 control-label">Bukti Transfer :</label>
				<div class="col-lg-8">
					<input type="file" name="gambar" required="">
					<span class="help-block">*Upload Struk Bukti Transfer min 50kb</span>
				</div>
				</div>
				            	
				   <tr class="for-horizontal">

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