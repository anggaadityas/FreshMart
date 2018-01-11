<br>
<div class="row">
    <div class="col-md-4">
<form class="form-horizontal" name="artikel" method="post" action="dashboard.php?fm=items-data" enctype="multipart/form-data">
            <h4 class="page-header text-info"><b><span class="fa fa-fw fa-archive"></span> Produk</b></h4>
            <br>
                    <div class="form-group">
                        
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="nama_produk" id="inputPassword3" placeholder="Nama Produk" required autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="stok" id="harga" placeholder="Stok Produk" required>
                        </div>
                        
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="harga" id="harga" placeholder="Rp. " required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <div class="btn-group" data-toggle="buttons">
                                <label class="btn btn-info active">
                                    <input type="radio" name="kategori" id="option1" autocomplete="off" checked value="Buah"> Buah
                                </label>
                                <label class="btn btn-info">
                                    <input type="radio" name="kategori" id="option2" autocomplete="off" value="Sayur"> Sayur
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                             <input type="file" name="gambar">
                             <span class="help-block">*Upload Gambar Produk</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class=" col-sm-12">
                            <button type="submit" class="btn btn-success "><span class="fa fa-upload fa-fw"></span>Kirim</button>
                        </div>
                    </div>
                </form>
            </div>

<br><br><br><br><br>
    <div class="col-md-8">
                   <div class="input-group col-md-4 pull-right">
                    <input class="form-control" size="10" type="text"  name="pencarian" placeholder="Search...">
                     <span class="input-group-addon"><span class=" fa fa-search"></span></span>
              </div>
              <br><br>
        <div id="data-items">
            <br><br>
        </div>
    </div>
</div>