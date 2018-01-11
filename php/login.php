	   <div class="modal fade" id="login" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form class="form-horizontal" action="php/login-aksi.php" method="post">
                        <div class="modal-header">
                        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h2><span class="fa fa-fw fa-users"></span>Masuk</h2>
                        </div>
 
                 	<div class="modal-body">

			<div class="form-group">
				<label for="contact-name" class="col-lg-3 control-label"> Email :</label>
				<div class="col-lg-8">
					<input type="email" class="form-control"   name="email" id="contact-name" placeholder="Email" autofocus required="">
				</div>
			</div>

			<div class="form-group">
				<label for="contact-name" class="col-lg-3 control-label"> Kata Kunci :</label>
				<div class="col-lg-8"> 
					<input type="password" class="form-control" name="pass" id="contact-name" placeholder="Kata Kunci" required="">
				</div>
			</div>
			<center>
				<p>belum punya akun? Klik <a href="#registrasi" data-toggle="modal">disini</a> untuk register </p>
			</center>

			</div>

			<div class="modal-footer">
				<h5 class="pull-left">Copyright by: <a href="http://firstmart.com">Fristmart.com</a></h5>
			<button type="submit" name="submit" class="btn btn-primary">Kirim</button>
			<a class="btn btn-danger" data-dismiss="modal">Batal</a>
			</div>
 
                    
                    </form>
                </div>
            </div>
        </div>


