 <?php
  include"../config/config.php";
  
    $email      = $_POST['email'];
    $password   = $_POST['pass'];
    $pass       = md5($password);
   // pastikan username dan password adalah berupa huruf atau angka.

    $login=mysql_query("SELECT * FROM member WHERE email_member='$email' AND password='$pass' AND aktivasi IS NULL");
    $r=mysql_fetch_array($login);

    // Apabila username dan password ditemukan
    if(mysql_num_rows($login)==1){
      session_start();
      $_SESSION[id]            = $r[id_member];
      $_SESSION[namauser]      = $r[nama_akun];
      $_SESSION[alamat]        = $r[alamat]; 
      $_SESSION[tlp]           = $r[telp];      
      
           header('location:../customer/fm/home.html');
      
    }
    else{
       echo"<script>window.alert('Erorr! Cek Kembali Email dan Password Anda atau anda belum konfirmasi akun,Terima Kasih.');
            window.location='../index.html'</script>";
    //  echo "<script>alert('Username dan Password tidak valid.'); window.location = 'index.php'</script>";
    //  
    }
    ?>