<?php
class _sqlcon {
	private $server = '127.0.0.1';
	private $port = '3306';
	private $user = 'root';
	private $passwd = '';
	private $dbase = 'dle';
	
		function __construct($server, $user, $passwd, $dbase) {
			$this->sever = $server;
			$this->user = $user;
			$this->passwd = $passwd;
			$this->dbase = $dbase;
			
		}

		function getconsql() {
		$con = mysqli($this->server, $this->user, $this->passwd, $this->dbase);
				if ($con->connect_errno) {
					die('Connect failed:'. $con->connect_error);
				}

		}
}

class _sqlcreate {
	public $tablep = 'parse';
	public $tablem = 'mail';
	public $label;
	public $
		function getdatasql(){
			$con = new _sqlcon($server, $user, $passwd, $dbase);
				$con->query()
		}
}
?>