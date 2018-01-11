<?php
include "../config/config.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Aktifasi Pendaftaran</title>
</head>
<body>
<?php
if(isset($_GET['email']) && isset($_GET['key'])){  
        $email = $_GET['email'];
        $key   = $_GET['key'];
		$has = mysql_query("update member set aktivasi=NULL where email_member='$email' and aktivasi='$key' limit 1");
	if($has)
	{
	echo "<link href='../css/bootstrap.css' rel='stylesheet' type='text/css'>
        <link href='../font-awesome/css/font-awesome.min.css' rel='stylesheet' type='text/css'>
        <link href='../css/open-sans.css' rel='stylesheet'>
        <link href='../css/oswald.css' rel='stylesheet'>
    <div class='container'>
       <div class='row'>
          <br><br>
               <div class='col-md-5 col-sm-offset-4'>
                   <div class='login-panel panel panel-primary'>
                      <div class='panel-body' align='center'>
                          <h3> $email dan $key <br/>Berhasil dan telah terkonfirmasi,silahkan login!</h3>
                             <a href=../index.html><button class='btn btn-warning' name='login'>Halaman utama</button></a>
                       </div>
                    </div>
              </div>
        </div>
     </div>";
	} 
	else
	{
		echo "<link href='../css/bootstrap.css' rel='stylesheet' type='text/css'>
        <link href='../font-awesome/css/font-awesome.min.css' rel='stylesheet' type='text/css'>
        <link href='../css/open-sans.css' rel='stylesheet'>
        <link href='../css/oswald.css' rel='stylesheet'>
    <div class='container'>
       <div class='row'>
          <br><br>
               <div class='col-md-4 col-md-offset-4'>
                   <div class='login-panel panel panel-primary'>
                      <div class='panel-body' align='center'>
                          <h3> $email dan $key <br/>Gagal konfirmasi email!</h3>
                             <a href=../index.html><button class='btn btn-warning'>Halaman utama</button></a>
                       </div>
                    </div>
              </div>
        </div>
     </div>";
    }
}
?>
</body>
</html>
