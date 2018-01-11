<?php 
include 'config/config.php';
include_once 'config/db-class.php';
 
$user = new db_class();  
$user->connectMySQL();

        $login = $user->check_login(); 
        if ($login) 
            { // Login Success
             header("location:modul/dashboard"); 
            } 
        else 
            { // Login Failed
             echo"<script>window.alert('Erorr! Cek Kembali Username dan Password Anda, Terima Kasih.');
        window.location='index.php'</script>"; 
            } 
    
?>