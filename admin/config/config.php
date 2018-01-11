<?php
define('DB_SERVER', 'localhost'); //define your db server here 
define('DB_USERNAME', 'root'); //define your db user here
define('DB_PASSWORD', ''); //define your db pass here
define('DB_DATABASE', 'db_freshmart'); //define your db name here 

  class config 
  { 
  	//global configuration
	var $debug_mode = true; // nilai true untuk mengaktifan mode debug/development, nilai false untuk tidak aktif
	var $exit_on_error = true; // nilai true untuk keluar dari eksekusi program jika terjadi error, upayakan selalu bernilai true

  //put your code here 
  	function __construct()
  	 { 
  	 	$connection = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die('Oops connection error -> ' . mysql_error()); 
  	 				 mysql_select_db(DB_DATABASE, $connection) or die('Database error -> ' . mysql_error());
  	 }
  } 
?>