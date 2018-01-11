<br>
<div class="row">
    <div class="col-sm-8">
        <?php 
        $Admin=$_SESSION[nama];
        $id=$_GET['id'];
        $q=mysql_query("select * from info where id_info='$id'");
        while($artikel=mysql_fetch_array($q)){
            ?>
        <form class="form-horizontal" method="post" action="php/artikel-edit-data.php" enctype="multipart/form-data">
            <h4 class="page-header text-info"><b><span class="fa fa-fw fa-archive"></span> Input Artikel</b></h4>
            <br>
             <div class="form-group">
                <label class="col-sm-2 control-label" required autofocus>Judul & penulis</label>
                <div class="col-sm-4">
                    <input type="text" name="judul" class="form-control"  value="<?php echo $artikel['nama_artikel'] ?>" autofocus>
                    <input type="hidden" name="id" class="form-control" value="<?php echo $id;?>" autofocus>
                </div>
                <div class="col-sm-3">
                    <input type="text" name="penulis" class="form-control"  value="<?php echo $Admin; ?>" readonly autofocus>
                </div>
            </div>

            <div class="form-group">
                <label  class="col-sm-2 control-label" required autofocus>Isi Artikel</label>
                <div class="col-sm-10">
                    <textarea class="ckeditor" name="isi" rows="5"><?php echo $artikel['ket'] ?></textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="exampleInputFile" class="col-sm-2 control-label"></label>
                <div class="col-sm-6">
                    <input type="file" name="gambar" id="exampleInputFile" >
                    <span class="help-block">*Upload Gambar Artikel</span><?php echo $artikel['foto_artikel']?>
                </div>
                
            </div>
             <div class="form-group">
                <label  class="col-sm-2 control-label" required autofocus>Tanggal</label>
                <div class="col-sm-4">
                    <input type="text" name="hari" class="form-control"  value="<?php echo $artikel['hari'] ?>"  autofocus>
                </div>
                <div class="col-sm-3">
                    <input type="text" name="bulan" class="form-control"  value="<?php echo $artikel['bulan'] ?>" >
            </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success"><span class="fa fa-upload fa-fw"></span>Upload</button>
                </div>
            </div>
                <?php
        }
        ?>
        </form>
</div>

<div class="col-sm-4">
<br><br><br><br><br>
        <table class="table table-hover">
            <thead >
            <th class="success">Nomor</th>
            <th class="danger text-danger">Judul</th>
            <th class="danger text-danger" width="460px">Isi Artikel</th>
            <th class="danger text-danger">Gambar</th>
            <th class="danger text-danger">Aksi</th>
        </thead>
        <tbody>
                  <?php
                    $batas=10; //satu halaman menampilkan 10 baris
                    $halaman=$_GET['halaman'];
                    $posisi=null;
                    if(empty($halaman)){
                      $posisi=0;
                      $halaman=1;
                    }else{
                      $posisi=($halaman-1)* $batas;
                    }
                     
                    //3). melakukan query dan menampilkan data
                    //query data menggunakan limit $posisi dan batas
                    $sql="select * from info limit $posisi,$batas ";
                     
                    $result=mysql_query($sql) or die(mysql_error());
                    $no=1;
                    while($user=mysql_fetch_object($result)){                        
                    ?>
                    <tbody>
                    <td><?php echo $posisi+$no;?></td>
                    <td><?php echo $user->nama_artikel;?></td>
                    <td><?php echo substr($user->ket, 0,80) ?></td>
                    <td><img src='../../img/<?php echo $user->foto_artikel;?>' width='100' height='80'></td>
                    <td>
                        <a href="dashboard.php?fm=artikel-edit&id=<?php echo $user->id_info;?>"  data-toggle="modal" ><span class="fa fa-fw fa-pencil"></span></a>
                        <a href="dashboard.php?fm=artikel-hapus&id=<?php echo $user->id_info;?>" onclick="return confirm('Anda yakin ingin hapus?');"><span class="fa fa-fw fa-trash-o"></span></a>
                    </td> 
                    </tbody>
                    <?php
                    $no++;
                    }
                    ?>
            </tbody>
        </table>
                <?php
        $sql_paging = mysql_query("SELECT id_info from info");
            $jmldata = mysql_num_rows($sql_paging);
            $jumlah_halaman = ceil($jmldata / $batas);

            echo "Halaman :";
            for($i = 1; $i <= $jumlah_halaman; $i++)
                if($i != $halaman) {
                    echo "<a href=dashboard.php?fm=artikel&halaman=$i>$i</a>|";
                } else {
                    echo "<b>$i</b> |";
                }
            mysql_close();?>
        <br>
        Jumlah data : <?php echo $jmldata;?>
    </div>
</div>