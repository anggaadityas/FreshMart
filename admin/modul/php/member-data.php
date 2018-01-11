<?php
include '../../config/config.php';
include '../../config/db-class.php';
include '../../config/paging-class.php';
?>
        <?php  
        $tampil = new db_class();  
        // koneksi ke MySQL via method
        $tampil->connectMySQL();

        $paging = new pagination();
        // Inisialisasi query
        $number_page = (isset($_GET['page'])) ? $_GET['page'] : "";
        $sql = "SELECT * FROM member";

        // Jika data tidak ada proses tidak dilanjutkan
        if(($num = $tampil->select($sql,true)) < 1){
        $tampil->display_errors();
        echo '<p class="bad">Tidak Ada Data pada tabel</p>';
        return FALSE;
        }
        // sql yang baru

        /*  Pilihan I
        //Jika pagingnya menggunakan config gunakan yang di komen di bawah ini
        $sql = $sql." LIMIT ".$paging->position($num,$number_page).",". $config['paging_size'];
        //$paging->paging_size adalah default dari kelas paging
        */

        /* Pilihan II & Pilihan III */
        $sql = $sql." LIMIT ".$paging->position($num,$number_page).",". $paging->paging_size;
        ?>
<table class="table table-hover table-condensed">
            <thead>
            <th class="success text-info">Id.Member</th>
                <th class="success text-danger">Nama Pelanggan</th>
                <th class="success text-danger">Email</th>
                <th class="success text-danger">Password</th>
                <th class="success text-danger">Alamat</th>
                <th class="success text-danger">L/P</th>
                <th class="success text-danger">No.Telp</th>
                <th class="success text-danger">No.Ktp</th>
                <th class="success text-danger">Member Sejak</th>
                <th class="success text-danger">#</th>
            </thead>
            <tbody>
        <!-- tampil data member -->
        <?php   
        $r=$tampil->select($sql);
        $i=$paging->position($num,$number_page);
        while($row=$tampil->get_row($r)){
        $i++;

        ?>
                    <tbody>
                    <td class="text-info"><?= $i?></td>
                    <td><?= @$row->nama_akun; ?></td>
                    <td><?= @$row->email_member; ?></td>
                    <td><?= @$row->password; ?></td>
                    <td><?= @$row->alamat; ?></td>
                    <td><?= @$row->jenis_kelamin; ?></td>
                    <td><?= @$row->telp; ?></td>
                    <td><?= @$row->no_ktp; ?></td>
                    <td><?= @$row->tgl_member; ?></td>
                    <td>
                    <a href="dashboard.php?fm=member-hapus&id=<?= @$row->id_member;?>" onclick="return confirm('Anda yakin ingin hapus?');"><span class="fa fa-fw fa-trash-o"></span></a>
                    </td>
                    </tbody>
        <?php
        }
        ?>   
            </tbody>
        </table>
            
<!-- untuk menampilkan menu halaman -->
<?php
    $paging->paging($_SERVER['PHP_SELF']);
?>