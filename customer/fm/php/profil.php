<div class="container"> 
    <div class="row">

    <div class="col-sm-5">
        <div class="well">
            <img src="../images/fm.jpg" alt="profil" style="width: 420px; height: 350px">
        </div>
    </div>

    <div class="col-sm-7">
        <div class="well">
            <center>
            <h3><span class="fa fa-2x fa-user-md"></span> Data Profil Member FreshMart</h3>
            <hr>
            <br>

           <?php 
        $id=$_GET['id'];
        $q=mysql_query("select * from member where nama_akun='$id'");
        while($row=mysql_fetch_array($q)){
            ?>
            <form class="form-horizontal">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Nama Anggota</label>
                    <div class="col-sm-6">
                        <input type="text" name="nama" readonly class="form-control" value="<?php echo $row['nama_akun'] ?>">
                        <input type="hidden" size="50" class="form-control" name="id" value="<?php echo $row['id'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-3 control-label">Nomor Telp.</label>
                    <div class="col-sm-6">
                        <input type="text" name="telp" readonly class="form-control"  value="<?php echo $row['telp'] ?>" >
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-6">
                        <input type="email" name="email" readonly class="form-control" value="<?php echo $row['email_member'] ?>" >
                    </div>
                </div>
                 <div class="form-group">
                    <label  class="col-sm-3 control-label">Nomor KTP </label>
                    <div class="col-sm-6">
                        <input type="email" name="email" readonly class="form-control" value="<?php echo $row['no_ktp'] ?>" >
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-3 control-label">Alamat</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" readonly rows="8" ><?php echo $row['alamat'] ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-3 control-label">Bergabung di FreshMart</label>
                    <div class="col-sm-6">
                        <input type="email" name="email" readonly class="form-control" value="<?php echo $row['tgl_member'] ?>" >
                    </div>
                </div>
                <?php
                }
                ?>
            </form>           
            </div>
        </div>

<div class="col-sm-12">

<div class="page-header">
    <h1><i class="fa fa-shopping-cart fa-2x"></i> Data Pembelian</h1>
</div>
<?php
//pagging
$per_hal=10;
$id=$_GET['id'];
$jumlah_record=mysql_query("SELECT COUNT(*) from transaksi where id_member='$id'");
$jum=mysql_result($jumlah_record, 0);
$halaman=ceil($jum / $per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
echo "Jumlah record : ".$jum."<br/>";
echo "Jumlah halaman : ".$halaman."<br/>";
//
?>
<br>
<table class="table table-hover">
            <thead >
            <th class="success">Nomor</th>
            <th class="success">Nomor Transaksi</th>
            <th class="danger text-danger">Id Member</th>
            <th class="danger text-danger">Nama Member</th>
            <th class="danger text-danger">Nama Produk</th>
            <th class="danger text-danger" >Harga</th>
            <th class="danger text-danger">Jumlah Pembelian</th>
            <th class="danger text-danger">Tanggal Pembelian</th>
            <th class="danger text-danger"> Status Pembayaran </th>
            <th class="danger text-danger"> Status Pengiriman</th>
        </thead>
        <tbody>
        <?php 
        $i = 1;
        $id=$_GET['id'];
        $id_member=$_SESSION[id];
        $q=mysql_query("SELECT * FROM transaksi inner join detail_transaksi on transaksi.id_transaksi=detail_transaksi.id_transaksi where id_member='$id' limit $start, $per_hal");
        while($data=mysql_fetch_array($q)){
            ?>
                    <tbody>
                    <td class="text-info"><?php echo $i ?></td>
                    <td><?php echo $data['id_detailtrans'] ?></td>
                    <td><?php echo $id_member?></td>
                    <td><?php echo $data['id_member'] ?></td>
                    <td><?php echo $data['produk_transaksi'] ?></td>
                    <td><?php echo $data['harga_transaksi'] ?></td>
                    <td><?php echo $data['qty_transaksi'] ?></td>
                    <td><?php echo $data['tgl_transaksi']?></td>
                    <td><?php echo $data['status_bayar']?></td>
                    <td><?php echo $data['status_pengiriman']?></td>
                    </tbody>
                    <?php
                    $i++;
                    }
                    ?>
            </tbody>
        </table>
        <?php 
        echo "<ul class='pagination'>";
        for($x=1;$x<=$halaman;$x++)
        {
        ?> 
        <li class='active'><a href="profil-<?php echo $_SESSION['namauser'];?>-<?php echo $x ?>.html"><?php echo $x ?></a></li>
        <?php
        }
        echo "</ul>";
        ?>

         </div>
    </div>
</div>
<br><br>