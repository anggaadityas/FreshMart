<?php
require "../../config/config.php";
?>
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
        $i = 1;
        $jml_per_halaman = 3; // jumlah data yg ditampilkan perhalaman
        $jml_data = mysql_num_rows(mysql_query("SELECT * FROM info"));
        $jml_halaman = ceil($jml_data / $jml_per_halaman);
        // query pada saat mode pencarian
        if(isset($_POST['cari'])) {
            $kunci = $_POST['cari'];
            echo "<strong>Hasil pencarian untuk kata kunci $kunci</strong>";
            $query = mysql_query("
                SELECT * FROM info 
                WHERE id_info LIKE '%$kunci%'
                OR nama_produk LIKE '%$kunci%'
            ");
        // query jika nomor halaman sudah ditentukan
        } elseif(isset($_POST['halaman'])) {
            $halaman = $_POST['halaman'];
            $i = ($halaman - 1) * $jml_per_halaman  + 1;
            $query = mysql_query("SELECT * FROM info LIMIT ".(($halaman - 1) * $jml_per_halaman).", $jml_per_halaman");
        // query ketika tidak ada parameter halaman maupun pencarian
        } else {
            $query = mysql_query("SELECT * FROM info LIMIT 0, $jml_per_halaman");
            $halaman = 1; //tambahan
        }
         
        // tampilkan data mahasiswa selama masih ada
        while($data = mysql_fetch_array($query)) {
        ?>
                    <tbody>
                    <td class="text-info"><?php echo $i ?></td>
                    <td><?php echo $data['nama_artikel'] ?></td>
                    <td><?php echo substr($data['ket'], 0,80) ?></td>
                    <td><img src='../../img/<?php echo $data['foto_artikel'] ?>' width='100' height='80'></td>
                    <td>
                        <a href="dashboard.php?fm=artikel-edit&id=<?php echo $data['id_info'];?>"  data-toggle="modal" ><span class="fa fa-fw fa-pencil"></span></a>
                        <a href="dashboard.php?fm=artikel-hapus&id=<?php echo $data['id_info'];?>" onclick="return confirm('Anda yakin ingin hapus?');"><span class="fa fa-fw fa-trash-o"></span></a>
                    </td> 
                    </tbody>
                    <?php
                    $i++;
                    }
                    ?>
            </tbody>
        </table>
      <?php if(!isset($_POST['cari'])) { ?>
<!-- untuk menampilkan menu halaman -->
<div class="pagination pagination-right">
  <ul class="pagination">
    <?php

    // tambahan
    // panjang pagig yang akan ditampilkan
    $no_hal_tampil = 5; // lebih besar dari 3

    if ($jml_halaman <= $no_hal_tampil) {
        $no_hal_awal = 1;
        $no_hal_akhir = $jml_halaman;
    } else {
        $val = $no_hal_tampil - 2; //3
        $mod = $halaman % $val; //
        $kelipatan = ceil($halaman/$val);
        $kelipatan2 = floor($halaman/$val);

        if($halaman < $no_hal_tampil) {
            $no_hal_awal = 1;
            $no_hal_akhir = $no_hal_tampil;
        } elseif ($mod == 2) {
            $no_hal_awal = $halaman - 1;
            $no_hal_akhir = $kelipatan * $val + 2;
        } else {
            $no_hal_awal = ($kelipatan2 - 1) * $val + 1;
            $no_hal_akhir = $kelipatan2 * $val + 2;
        }

        if($jml_halaman <= $no_hal_akhir) {
            $no_hal_akhir = $jml_halaman;
        }
    }

    for($i = $no_hal_awal; $i <= $no_hal_akhir; $i++) {
        // tambahan
        // menambahkan class active pada tag li
        $aktif = $i == $halaman ? ' active' : '';
    ?>
    <li class="halaman<?php echo $aktif ?>" id="<?php echo $i ?>"><a href="#"><?php echo $i ?></a></li>
    <?php } ?>
  </ul>
</div>
<?php } ?>
<?php
        $sql_paging = mysql_query("SELECT id_info from info");
            $jmldata = mysql_num_rows($sql_paging);?>
        <br>
        Jumlah data : <?php echo $jmldata;?>