<br>
<div class="row">
    <div class="col-sm-8">
         <?php 
        $Admin=$_SESSION[nama];
            ?>
        <form class="form-horizontal" name="artikel" method="post" action="dashboard.php?fm=artikel-data" enctype="multipart/form-data">
            <h4 class="page-header text-info"><b><span class="fa fa-fw fa-archive"></span>Artikel</b></h4>
            <br>
         
             <div class="form-group">
                <label class="col-sm-2 control-label" required autofocus>Judul & penulis</label>
                <div class="col-sm-4">
                    <input type="text" name="judul" class="form-control"  placeholder="Judul" autofocus>
                </div>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="penulis" value="<?php echo $Admin; ?>" readonly >
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label" required autofocus>Isi Artikel</label>
                <div class="col-sm-10">
                    <textarea class="ckeditor" name="isi" rows="5" placeholder="What do you Think about Artikel Produk..."></textarea>
                </div>
            </div>
             <div class="form-group">
                <label  class="col-sm-2 control-label" required autofocus>Tanggal</label>
                <div class="col-sm-4">
                    <input type="text" name="hari" class="form-control"  placeholder="Hari" autofocus>
                </div>
                <div class="col-sm-3">
                    <input type="text" name="bulan" class="form-control"  placeholder="Bulan">
            </div>
            </div>
            <div class="form-group">
                <label for="exampleInputFile" class="col-sm-2 control-label"></label>
                <div class="col-sm-6">
                    <input type="file" name="gambar" id="exampleInputFile" >
                    <span class="help-block">*Upload Gambar Artikel</span>
                </div>
                
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success"><span class="fa fa-upload fa-fw"></span>Kirim</button>
                </div>
            </div>
        </form>
</div>

<div class="col-sm-4">
<br><br><br>
                   <div class="input-group col-md-4 pull-right">
                    <input class="form-control" size="10" type="text"  name="pencarian" placeholder="Search...">
                     <span class="input-group-addon"><span class=" fa fa-search"></span></span>
              </div>
              <br><br>
        <div id="data-artikel">
            <br><br>
        </div>
        
    </div>
</div>
