<div class="container"> 
    <div class="row">

        <div class="col-sm-2">
        </div>

		<div class="col-sm-8">
<br><br>
<div class="page-header">
    <h2><i class="fa fa-shopping-cart fa-2x"></i> Data Pembelian</h2>
</div>
<?php
//pagging
$per_hal=5;
$trx=$_POST['trx'];
$jumlah_record=mysql_query("SELECT COUNT(*) from transaksi where id_transaksi='$trx'");
$jum=mysql_result($jumlah_record, 0);
$halaman=ceil($jum / $per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
echo "Jumlah record : ".$jum."<br/>";
echo "Jumlah halaman : ".$halaman."<br/>";
//
?>
<br>
<?php
$trx=$_POST['trx'];
$q=mysql_query("SELECT * FROM transaksi where id_transaksi='$trx' limit $start, $per_hal");
if(mysql_num_rows($q) > 0)
{
?>
<table class="table table-hover">
            <thead >
            <th class="success">Nomor</th>
            <th class="success">Nomor Transaksi</th>
            <th class="danger text-danger">Total Pembelian</th>
            <th class="danger text-danger"> Status Pembayaran </th>
            <th class="danger text-danger"> Status Pengiriman</th>
            <th class="danger text-danger">Tanggal Pembelian</th>
            <th class="danger text-danger">Konfirmasi Pembayaran</th>
        </thead>
        <tbody>
        <?php 
        $i = 1;
        $trx=$_POST['trx'];
        $q=mysql_query("SELECT * FROM transaksi where id_transaksi='$trx' limit $start, $per_hal");
        while($data=mysql_fetch_array($q)){
            ?>
                    <tbody>
                    <td class="text-info"><?php echo $i ?></td>
                    <td><?php echo $data['id_transaksi'] ?></td>
                    <td><?php echo $data['total_transaksi'] ?></td>
                    <td><?php echo $data['status_bayar']?></td>
                    <td><?php echo $data['status_pengiriman']?></td>
                    <td><?php echo $data['tanggal_transaksi']?></td>
                    <?php
                    if ($data['status_bayar']=="Lunas")
                        echo"
                    <td><p><b> Konfirmasi Pembayaran <span class='fa fa-check'></b></p></td>";
                    else
                        echo"<td><a href='#konfirmasi' data-toggle='modal'>Konfirmasi Pembayaran</a></td>";
                    ?>
                    </tbody>
                    <?php
                    $i++;
                    }
                    }
                    else
                    {
                     echo '
                     <br><br>
                     <h2><center>Maaf Nomor Transaksi Tidak Ada!</center></h2>
                     <br><br>';
                    }
                    ?>
            </tbody>
        </table>
        <br><br><br><br>    
         	</div>

            <div class="col-sm-1">
        </div>

    </div>
</div>