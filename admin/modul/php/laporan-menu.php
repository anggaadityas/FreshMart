<div class="modal fade" id="laporan" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <form class="form-horizontal" action="<?php $_SERVER['PHP_SELF']; ?>" target="_self" method="post">
          <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h2><span class="fa fa-fw fa-users"></span>Data Laporan</h2>
          </div>

          <div class="modal-body">

        <div class="form-group">
          <table class="table table-hover">
            <thead>
                <th class="success">Nomor</th>
                <th class="danger text-danger">Data-Laporan-Member</th>
                <th class="danger text-danger">Data-Laporan-Produk</th>
                <th class="danger text-danger">Data-Laporan-Penjualan</th>
            </thead>
           
            <tbody>
               <td width="50" height="37" valign="top">1</td>
               <td width="50" height="37" align="center" valign="top"><a href="php/laporan-member.php" target="_blank"><img src="../images/report.png" width="60" height="59" /></a></td>
               <td width="52" align="center" valign="top"><a href="php/laporan-produk.php" target="_blank"><img src="../images/report.png" alt="" width="60" height="59" /></a></td>
               <td width="55" align="center" valign="top"><a href="php/laporan-penjualan.php" target="_blank"><img src="../images/report.png" alt="" width="60" height="59" /></a></td>
           </tbody>    
        </table>
      </div>

        </div>

        <div class="modal-footer">
              <h5 class="pull-left">Copyright by : <a href="http://www.Fristmart.com">Fristmart.com</a></h5>
             <a class="btn btn-danger" data-dismiss="modal">Batal</a>
        </div>
        
      </form>
    </div>
  </div>
</div>
