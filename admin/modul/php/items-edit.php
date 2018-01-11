
<?php
// panggil file koneksi.php
include '../../config/config.php';


// tangkap variabel id_produk
$id_produk = $_POST['id'];
$sql =(mysql_query("SELECT * FROM produk WHERE id_produk=".$id_produk));
        while($data=mysql_fetch_array($sql)){
?>
                 
              <div class="modal-header">
                <button type="button" id="close" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h2 id="ModalLabel"><span class="fa fa-fw fa-pencil"></span>Items</h2>
              </div>
              <br>
                <form class="form-horizontal" method="post" action="php/items-edit-data.php" enctype="multipart/form-data" >

                <div class="form-group">
                <label for="contact-name" class="col-lg-3 control-label">Id Produk :</label>
                <div class="col-lg-7">
                <input class="form-control" type="text" name="id" value="<?php echo $data['id_produk'] ?>"  readonly/>
                <span class="help-block">*Id Produk Sudah Terisi Dengan Otomatis.</span>
                </div>
                </div>

                <div class="form-group">
                    <label for="contact-name" class="col-lg-3 control-label"> Nama Produk :</label>
                <div class="col-lg-6">
                    <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="<?php echo $data['nama_produk'] ?>"  required="">
                </div>
                </div>

                 <div class="form-group">
                     <label for="contact-name" class="col-lg-3 control-label">Kategori:</label>
                 <div class="col-lg-5">
                     <select class="form-control" name="id_kategori" required="">
                        <?php 
                // tampilkan untuk form ubah mahasiswa
                if($id_produk > 0) { ?>
                    <option value="<?php echo $data['id_kategori'] ?>"><?php echo $data['id_kategori'] ?></option>
                <?php } ?>
                        <option>Buah</option>
                        <option>Sayur</option>
                    </select>
                </div>
                </div>

                <div class="form-group">
                    <label for="contact-name" class="col-lg-3 control-label"> Harga :</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control"  name="harga" id="contact-name"  value="<?php echo $data['harga_produk'] ?>"required="">
                </div>
                </div>

                <div class="form-group">
                    <label for="contact-name" class="col-lg-3 control-label"> Stok :</label>
                <div class="col-lg-3">
                    <input type="text" class="form-control" name="stok" value="<?php echo $data['stok_produk'] ?>" required="">
                </div>
                </div>

                <div class="form-group">
                    <label for="contact-name" class="col-lg-3 control-label">Foto Produk :</label>
                    <div class="col-sm-8">
                         <input type="file" name="foto">
                         <span class="help-block">*Upload Gambar Produk</span> <?php echo $data['foto'] ?>
                    </div>
                </div>
                  <div class="modal-footer">
                      <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><span class="fa fa-times"> Batal</button>
                      <button type="submit" class="btn btn-success"><span class="fa fa-check"> Simpan</span></button>
                    </div>
            </form>
            <?php
        }
        ?>
