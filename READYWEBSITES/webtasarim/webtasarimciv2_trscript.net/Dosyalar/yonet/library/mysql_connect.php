<?php
class Connection_Siparis {

protected $link;
private $server, $username, $password, $db;

public function __construct($server,$username,$passworld,$db)
	{
		$this -> server = $server;
		$this -> username = $username;
		$this -> passworld = $passworld;
		$this -> db = $db;
		$this -> connect();	
	}

private function connect()
	{
		$this -> link = @mysql_connect($this->server, $this->username, $this->passworld);
		@mysql_query("SET NAMES 'utf8'");
		@mysql_query("SET CHARACTER SET utf8");
		@mysql_query("SET COLLATION_CONNECTION = 'utf8_unicode_ci'");
		@mysql_select_db($this->db, $this->link) or die("Bağlantı Başarısız.");
	}

public function __sleep()
	{
		return array('server','username','passworld','db');
	}
	
public function __wakeup()
	{
		$this -> connect();
	}
	
public function kapat()
	{
		mysql_close($this->link);
	}
	
}
$baglan = new Connection('localhost','kullanici-adi-buraya','sifre-buraya','database-ismi-buraya');
?>