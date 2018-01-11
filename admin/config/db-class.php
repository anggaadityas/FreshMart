<?php
// Konstanta untuk type data
define('MYSQL_TYPES_NUMERIC', 'int real ');
define('MYSQL_TYPES_DATE', 'datetime timestamp year date time ');
define('MYSQL_TYPES_STRING', 'string blob ');

// Hal yang perlu di perhatikan dalam penggunaan kelas database ini.
// - Susunan tabel pada database. Jika pada tabel terdapat fieldtype auto_increment, yakinkan untuk fieldtype(0) adalah auto_increment.
// - Jika menggunakan Stupid Mode pastikan pula fieldname-nya sama dengan yang di database (Ini mah memang harus sama ^_^)

class db_class extends config {

	// Variable-variable
	protected $fieldtype;
	protected $fieldname;
	protected $error_msg = array();

	var $db_link;
	var $auto_slashes;

	function __construct() {
		$this->auto_slashes = true;
	}

	// Fungsi untuk melakukan koneksi
	private $dbHost = "localhost";
    private $dbUser = "root";
    private $dbPass = "";
    private $dbName = "db_freshmart";

    // method koneksi MySQL
    function connectMySQL() {
        mysql_connect($this->dbHost, $this->dbUser, $this->dbPass);
        mysql_select_db($this->dbName) or die("Database tidak ada!");
    } 

     // Login process 
 		 public function check_login() 
 		 {
  			 $nama       = $_POST['nama'];
         $password   = $_POST['pass'];
         $pass       = md5($password); 
  			 $result = mysql_query("SELECT * from admin WHERE nama_user = '$nama' and pass = '$pass'");
  			 $user_data = mysql_fetch_array($result);
  			 $no_rows = mysql_num_rows($result);
  			  if ($no_rows == 1)
  			   {
  			    session_start();
 			    $_SESSION[id]        = $user_data[id_user];
  			  $_SESSION[email]     = $user_data[email];
  			  $_SESSION[pass]      = $user_data[pass];
  			  $_SESSION[nama]      = $user_data[nama_user];
  			    return TRUE; 
  				}
  			 else
  			  { 
  			  	return FALSE;
  			  } 
  		}

	// mengambil data dari tabel
	// kembalian berupa array data
	function select($sql,$getnumrows=false) {
		$r = mysql_query($sql);
		if (!$r) {
			$this->set_error("An Error on : $sql <br/>mysql_error : ".mysql_error());
			return false;
		}
		if($getnumrows==true) {
			$num_rows = mysql_num_rows($r);
			mysql_free_result($r);
			return $num_rows;
		} else return $r;
	}

	// mengambil data dari hasil "function select($sql,$getnumrows=false)"
	// kembalian berupa array data
	function get_row($result) {
		if (!$result) {
			return false;
		}

		$row = mysql_fetch_object($result);

		if (!$row) {
			$this->set_error("Can't find result for your request");
			return false;
		}
		
		return $row;
	}

	// Fungsi untuk menginsert dan update data
	// Set $is_update = false kalau mau insert atau true kalau mau update
	// Nilai kembalian, true, false, mysql_insert_id kalau insert, mysql_affected_rows kalau update
	function run_sql($sql,$is_update) {
		$r = mysql_query($sql);
		if (!$r) {
			$strmsg = ($is_update) ? "update" : "insert";
			$this->set_error("Error on $strmsg : $sql <br/>mysql_error : ".mysql_error());
			return false;
		}

		if(!$is_update){
			$id = mysql_insert_id();
			if ($id == 0) return true;
			else return $id;
		} else {
			$rows = mysql_affected_rows();
			if ($rows == 0) return true;
			else return $rows;
		}
	}

	// Fungsi untuk menghapus data dari tabel
	function delete_sql($table,$condition){
		$action_del=mysql_query("DELETE FROM $table WHERE $condition");
		if(!$action_del) {
			$this->set_error("An Error on delete : $sql <br/>mysql_error : ".mysql_error());
			return false;
		}
		return true;
	}

	// Fungsi ini digunakan untuk menggenerate/membuat kode insert maupun update data secara otomatis
	// Set $is_update = false kalau mau insert atau true kalau mau update
	// Hasil fungsi berupa query mysql dan akan di kembalikan ke Fungsi "function run_sql($sql) {...}" di atas.
	function change_table($table, $data, $condition = "", $is_update = false) {
		if($table == "") {
			$this->set_error("No Data selected!.");
			return false;
		}

		if(!is_array($data)) {
			$this->set_error("Data must an array!.");
			return false;
		}

		if(!$this->get_colomn_info($table)) return false;

		$count = count($data);
		$i = $x = 0;
		// Stupid Mode : saya anggap Stupid Mode itu adalah cara menyebutkan nama field pada variable $data ^_^
		$stupid_mode = false;
		foreach($data as $key => $val){
			// Cek data, jangan sampai kosong semua
			if(empty($val)) $i++;
			// Cek mode sql
			if(!is_numeric($key)) $x++;
		}
		if($i == $count) {
			$this->set_error("No Data to insert or update!.");
			return false;
		}
		if($x == $count) $stupid_mode = true;

		$sql = (!$is_update) ? "INSERT INTO $table SET " : "UPDATE $table SET ";

		if(!$stupid_mode){
			for ($i = 0; $i < $count; $i++) {
				if(!empty($data[$i])) {
					$sql .= $this->fieldname[$i]."=";
					$sql .= $this->get_value_info($data[$i],$i);
				}
			}
		}

		if($stupid_mode){
			foreach ($data as $key => $value) {
				if(!empty($value)) {
					$sql .= "$key=";
					// Pastikan tepat sasaran ^_^
					for ($i = 0; $i < $count; $i++) {
						if($this->fieldname[$i] == $key){
							$sql .= $this->get_value_info($value,$i);
							break; // Keluar aja dari putaran, karena pasti fieldname dalam satu tabel tidak mungkin sama
						}
					}
				}
			}
			// Hadew!!... Kayak ginilah struktur untuk Stupid Mode, Puyeng juga.
			// Tapi sebagai developer :p harus tetap menjaga ke kompitibilitas/kenyamanan pengguna ^_^
		}

		$sql = rtrim($sql, ',');
		if (!empty($condition)) $sql .= " WHERE $condition";

		unset($data);
		unset($this->fieldname);
		unset($this->fieldtype);
		return $this->run_sql($sql,$is_update);
	}

	// Fungsi untuk mendapatkan informasi fieldtype dari fieldname pada tabel untuk field yang sudah ditentukan
	private function get_value_info($value,$i){
		if(substr_count(MYSQL_TYPES_DATE,$this->fieldtype[$i])) $sql = "'".$this->sql_date_format($value)."',";
		elseif(substr_count(MYSQL_TYPES_NUMERIC,$this->fieldtype[$i])) $sql = $value.",";
		elseif(substr_count(MYSQL_TYPES_STRING,$this->fieldtype[$i])) $sql = ($this->auto_slashes) ? "'".addslashes($value)."'," : "'".$value."',";
		return $sql;
	}

	// Fungsi untuk mendapatkan informasi fieldtype dan fieldname pada tabel
	private function get_colomn_info($table){
		$r = mysql_query("SELECT * FROM $table");
		if (!$r) {
			$this->set_error("Unable to get information on table : $table <br/>mysql_error : ".mysql_error());
			return false;
		}
		$fields = mysql_num_fields($r);
		$this->fieldname = array();
		$this->fieldtype = array();

		for ($i=0; $i < $fields; $i++) {
			$flags = mysql_field_flags($r, $i);
			if(!substr_count($flags,"auto_increment")) {
				array_push($this->fieldname,mysql_field_name($r, $i));
				array_push($this->fieldtype,mysql_field_type($r, $i));
			}
		}
		mysql_free_result($r);
		return true;
	}

	// Apabila field yang akan di insert atau di update berupa tanggal maka inputan akan disesuaikan dengan format tanggal pada mysql
	private function sql_date_format($value) {
		if(!empty($value)) {
			if (gettype($value) == 'string') $value = strtotime($value);
			return date('Y-m-d H:i:s', $value);
		}
	}

	// Fungsi untuk menampung error selama pengoperasian
	protected function set_error($msg){
	  if (is_array($msg)) {
		 foreach ($msg as $val){
			$this->error_msg[] = $msg;
		 }
	  } else $this->error_msg[] = $msg;
	}

	// Fungsi untuk memunculkan pesan error selama pengoperasian
	function display_errors($open = '-', $close = '<br/><br/>') {
		if(count($this->error_msg) == 0) return false;
		$str = '';
		foreach ($this->error_msg as $val) {
			$str .= $val.$close;
		}

		if($this->debug_mode){
		$html_msg = '
					<div style="border: 1px solid red; font-size: 9pt; font-family: monospace; color: red; padding: .5em; margin: 8px; -moz-border-radius:4px;border-radius:4px;-webkit-border-radius:4px;background-color: #FFE2E2;">
						<span style="font-weight: bold">Error Message:</span><br>'.$str.'
					</div>';
		echo $html_msg;
		if($this->exit_on_error) exit();
		}
	}
	
	function __destruct(){

	}
}
?>