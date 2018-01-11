 <br><br>

    <?php

/* pertama kita panggil colom yang akan kita gunakan untuk ID kita dengan menyaring nilai maksimum */
$sql = " SELECT max(id_transaksi) as terakhir from transaksi";
//mengecek hasil atau value yang dihasilkan dari query yang disimpan pada variable sql
$hasil = mysql_query($sql);
//memecah table hasil query
$data = mysql_fetch_array($hasil);
//mengambil cell atau 1 kotak bagian dari table yaitu cell no_pendaftaran yang dialiaskan terakhir
$lastID = $data['terakhir'];
// baca nomor urut  no pendaftaran terakhir
$lastNoUrut = substr($lastID, 3, 9);
// nomor urut ditambah 1
$nextNoUrut = $lastNoUrut + 1;
// membuat format nomor berikutnya
$nextID = "TRX00" . sprintf("%03s", $nextNoUrut);
// selesai,,, untuk memanggil ID otomatis ini  bisa memasangkan cara

    ?>

    <?php
    include'php/transaksi_data.php';
    include'php/transaksi-dua.php';
    ?>

    <div class="container">
      <div class="row">
      <div class="col-sm-6 col-md-6">
        <br><br><br>
       <div class="thumbnail">
            <div class="caption">
                <h3>Lokasi Pengiriman <span class="fa fa-fw fa-credit-card"></span></h3>
            </div>
            <div role="tabpanel">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#cod" aria-controls="home" role="tab" data-toggle="tab">Anda</a></li>
                    <li role="presentation"><a href="#transfer" aria-controls="profile" role="tab" data-toggle="tab">Alamat Lain</a></li>
                    <!--    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>
                        <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>-->
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="cod">
                    <?php
                        # JIKA ADA PESAN ERROR DARI VALIDASI
                    if (count($pesanError)>=1 )
                    {
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
                         
                        <form id="defaultForm" class="form-horizontal" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
                            <br><br>
                          <input type="hidden" name="total" value="<?php echo abs((int)$_GET['total']); ?>">

                          <div class="form-group">
                              <label class="col-sm-4 control-label">Id Lokasi :</label>
                              <div class="col-sm-4">
                                <select name="id_lokasi" class="form-control">
                                  <option value="kosong" selected="selected">--Pilih--</option>
                                  <?php
                                    $comboSql = "SELECT * FROM lokasi_pesan ORDER BY nama_lokasi ASC";
                                    $comboQry = mysql_query($comboSql,$Koneksi) or die ("Gagal query".mysql_error());
                                    while ($comboData =mysql_fetch_array($comboQry)) {
                                        if ($comboData['id_lokasi']==$dataProvinsi) {
                                            $cek="selected";
                                        }
                                        else {
                                            $cek="";
                                        }
                                        echo "<option value='$comboData[id_lokasi]' $cek>$comboData[nama_lokasi]</option>";
                                    }
                                    ?>
                                </select> 
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="col-sm-4 control-label">Kode Pos :</label>
                              <div class="col-sm-6">
                                <input class="form-control" type="text"  maxlength="5" name="kd_pos"  placeholder="Kode Pos" required="" value="<?php echo "$dataPos"; ?>">
                              </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="nomor">Jenis Rekening :</label>
                                <div class="col-sm-4">
                                    <select id="nomor" name="rek" class="form-control">
                                        <option id="0" selected="selected">--Pilih--</option>
                                        <option id="BCA">BCA</option>
                                        <option id="Mandiri">Mandiri</option>
                                        <option id="BNI">BNI</option>
                                        <option id="BRI">BRI</option>
                                        <option id="Bank DKI">Bank DKI</option>
                                        <option id="BTN">BTN</option>
                                        <option id="Bank Mega">Bank Mega</option>
                                        <?php echo $dataNoRek; ?>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="nomor">Nomor ATM :</label>
                                <div class="col-sm-6">
                                    <input type="text" name="atm" id="nomor" class="form-control" placeholder="Masukan No.Rek ATM Anda"  required="" value="<?php echo "$dataNoRek"; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="nomor">Atas Nama :</label>
                                <div class="col-sm-6">
                                    <input type="text" name="nama_rek" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ',this)" id="nomor" class="form-control" placeholder="Nama di Kartu ATM" required="" value="<?php echo "$dataNmRek"; ?>">
                                    <input type="hidden" name="trx" id="nomor" class="form-control" value="<?php echo "$nextID"; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label"></label>
                                <div class="col-sm-6">
                                <input type="checkbox" name="agree" value="agree" /> Ceklist jika proses data selesai
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-4 col-sm-10">
                                    <button type="submit" name="btnSimpan" class="btn btn-success"><span class="fa fa-fw fa-angle-up"></span>Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                    
                    <div role="tabpanel" class="tab-pane" id="transfer">
                        <br>
                       
                        <form id="defaultForm" class="form-horizontal" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
                            <input type="hidden" name="total" value="<?php echo abs((int)$_GET['total']); ?>">
                          
                          <div class="form-group">
                            <br>
                            <label class="col-sm-4 control-label">Nama Lengkap :</label>
                            <div class="col-sm-6">
                              <input type="text" name="nama" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ',this)" class="form-control" placeholder="Nama Lengkap" required="">
                              </div>
                              </div>

                             <div class="form-group">
                              <label class="col-sm-4 control-label">Id Lokasi :</label>
                              <div class="col-sm-4">
                                <select name="id_lokasi" class="form-control">
                                  <option value="kosong" selected="selected">--Pilih--</option>
                                  <?php
                                    $comboSql = "SELECT * FROM lokasi_pesan ORDER BY nama_lokasi ASC";
                                    $comboQry = mysql_query($comboSql,$Koneksi) or die ("Gagal query".mysql_error());
                                    while ($comboData =mysql_fetch_array($comboQry)) {
                                        if ($comboData['id_lokasi']==$dataProvinsi) {
                                            $cek="selected";
                                        }
                                        else {
                                            $cek="";
                                        }
                                        echo "<option value='$comboData[id_lokasi]' $cek>$comboData[nama_lokasi]</option>";
                                    }
                                    ?>
                                </select> 
                              </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Alamat Lengkap :</label>
                              <div class="col-sm-6">
                                <textarea class="form-control" name="alamat_lengkap" placeholder="Alamat Lengkap" required=""value="<?php echo "dataAlamat"; ?>"></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="col-sm-4 control-label">Kode Pos :</label>
                              <div class="col-sm-6">
                                <input class="form-control" type="text" name="kd_pos" placeholder="Kode Pos" onKeyPress="return goodchars(event,'1234567890',this)"  required="" value="<?php echo "$dataPos"; ?>">
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="col-sm-4 control-label">Nomor Telp :</label>
                              <div class="col-sm-6">
                                <input class="form-control" type="text" name="telp" placeholder="Nomor Telpon" onKeyPress="return goodchars(event,'01234567890',this)"  required="" value="<?php echo "$dataNoTelp"; ?>">
                              </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="nomor">Jenis Rekening :</label>
                                <div class="col-sm-4">
                                    <select id="nomor" name="rek" class="form-control">
                                        <option id="0" selected="selected">--Pilih--</option>
                                        <option id="BCA">BCA</option>
                                        <option id="Mandiri">Mandiri</option>
                                        <option id="BNI">BNI</option>
                                        <option id="BRI">BRI</option>
                                        <option id="Bank DKI">Bank DKI</option>
                                        <option id="BTN">BTN</option>
                                        <option id="Bank Mega">Bank Mega</option>
                                        <?php echo $dataNoRek; ?>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="nomor">Nomor ATM :</label>
                                <div class="col-sm-6">
                                    <input type="text" name="atm" id="nomor" class="form-control" onKeyPress="return goodchars(event,'1234567890',this)"  placeholder="Masukan No.Rek ATM Anda" required="" value="<?php echo "$dataNoRek"; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="nomor">Atas Nama :</label>
                                <div class="col-sm-6">
                                    <input type="text" name="nama_rek" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ',this)" id="nomor" class="form-control" placeholder="Nama di Kartu ATM" required="" value="<?php echo "$dataNmRek"; ?>">
                                    <input type="hidden" name="trx" id="nomor" class="form-control" value="<?php echo "$nextID"; ?>">
                                </div>
                            </div>

                        <div class="form-group">
                        <label class="col-sm-4 control-label"></label>
                            <div class="col-sm-6">
                                <input type="checkbox" name="agree" value="agree" required/> Ceklist jika proses data selesai
                            </div>
                        </div>
                    
                            <div class="form-group">
                                <div class="col-sm-offset-4 col-sm-10">
                                    <button type="submit" name="btnproses" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> Proses</button>
                                </div>
                            </div>
                        </form>
                    </div>
               </div>

                <br>

            </div>
        </div>
        <br><br><br>
    </div>

    <br><br><br>
    <div class="col-sm-6 col-md-6">
        <div class="thumbnail">
            <div class="caption">
                <h3>Data Pembelian, <?php echo "$nextID"; ?><span class="fa fa-fw fa-shopping-cart"></span></h3>
            </div>
        <form method="POST" action="">
            <table class="table table-responsive table-hover">
                <thead>
                    <?php
                    //        query
                    $sql = "SELECT * FROM keranjang ORDER BY id_keranjang ASC ";
                    $result = mysql_query($sql);
                    //pagination config start
                    $rpp = 10; // jumlah record per halaman
                    $reload = "index.php?fm=transaksi&pagination=true";
                    $halaman = intval($_GET["halaman"]);
                    if ($halaman <= 0)
                        $halaman = 1;
                    $tcount = mysql_num_rows($result);
                    $thalamans = ($tcount) ? ceil($tcount / $rpp) : 1; // total halamans, last halaman number
                    $count = 0;
                    $i = ($halaman - 1) * $rpp;
                    $no_urut = ($halaman - 1) * $rpp;

                    //pagination config end
                    ?>
            <th class="success text-warning">Id.Produk</th>
            <th class="success text-warning">Nama Produk</th>
            <th class="success text-warning">Harga</th>
            <th class="success text-warning">Jumlah</th>
            <th class="success text-warning">Total</th> 
            <th class="success text-warning">#</th>
            </thead>
            <?php

               // buat variabel data
                $subTotal   = 0;
                $totalHarga = 0;
                $totalBarang = 0;
            while (($count < $rpp) && ($i < $tcount)) {
                mysql_data_seek($result, $i);
                $user = mysql_fetch_array($result);
                $nomor  = 0;
                  $nomor++;
                  $disc        = ($user[diskon_keranjang]/100)*$user[harga_keranjang];
                  $hargadisc   = number_format(($user[harga_keranjang]-$disc),0,",",".");
                     // Menghitung sub total harga
                    $total        = ($user[harga_keranjang]-$disc) * $user[qty_keranjang];
                    $grandTotal   = $grandTotal + $total; 

                  # MENGHAPUS DATA BARANG YANG ADA DI TRANSAKSI
                // Membaca Kode dari URL
                if(isset($_GET['aksi']) and trim($_GET['aksi'])=="Hapus")
                { 
                    // Membaca Id data yang dihapus
                    $idHapus    = $_GET['idHapus'];

                    $bacaSql    = "SELECT * FROM keranjang WHERE id_keranjang";
                    $bacaQry    = mysql_query($bacaSql,$Koneksi) or die ("Gagal query 2".mysql_error());
                            while ($bacaData = mysql_fetch_array($bacaQry)) 
                            {
                                // Simpan data dari Keranjang belanja ke Pemesanan_Item
                                $Kode_produk    = $bacaData['id_produk'];
                                $Jumlah         = $bacaData['qty_keranjang'];

                                $mySql = "UPDATE produk SET stok_produk=stok_produk+$Jumlah WHERE id_produk='$Kode_produk'";
                                mysql_query($mySql,$Koneksi) or die ("Gagal query simpan".mysql_error());
                            }

                    // Menghapus data keranjang sesuai Kode yang dibaca di URL
                    $mySql = "DELETE FROM keranjang  WHERE id_keranjang='$idHapus'";
                    $myQry = mysql_query($mySql,$Koneksi) or die ("Eror hapus data".mysql_error());

                    
                    if($myQry)
                    {
                        echo "<meta http-equiv='refresh' content='0; url=index.php?fm=cart'>";
                    }
                }
            ?>
                <tbody>

                
                <?php
                echo"
                    <td>$user[id_produk]</td>
                    <td>$user[produk_keranjang]</td>
                    <td>$user[harga_keranjang]</td>
                    <td align=center>$user[qty_keranjang]</td>
                    <td>Rp.$hargadisc</td>
                    ";
                echo '<td><a href="home.php?fm=transaksi_data&aksi=Hapus&idHapus=' . $user['id_keranjang'] . '" onclick="return confirm(\'Yakin ingin menghapus list belanja anda??\')"><span class="fa fa-fw fa-trash-o"></span></a></td>';
                ?>
                
                </tbody>
                <?php
                $i++;
                $count++;
            };
            ?>
                    <tr>
                      <td align="center" class="cart_total" align="top">&nbsp;</td>
                      <td colspan="2" class="cart_total" align="right"><h4><strong>GRAND TOTAL   : </strong></h4></td>
                      <td  class="cart_total" align="center"><h4><strong><?php echo "".$tota; ?></strong></h4></td>
                      <td  class="cart_total"><h4><strong><?php echo "Rp. ".$grandTotal; ?></strong></h4></td>
                      <td>&nbsp;</td>
                    </tr>
            </table>
        </form>
            <br>
        </div>
    </div>
  </div>
</div>
 