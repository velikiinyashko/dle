<?php
define ('DB_HOST', '127.0.0.1');
define ('DB_PORT', '3306');
define ('DB_USER', 'root');
define ('DB_PASSWD', '');
define ('DB_NAME', 'newsdledb');
define ('CHARSET', 'utf8');
$tabledb = 'parse';

global $con;
$con = new mysqli(DB_HOST, DB_USER, DB_PASSWD, DB_NAME);
		if ($con->connect_errno) {
			die("Connect failed:" . $con->connect_error);
		}

	function mysqlinfo() {
}

	function mysqlcon() {
}

	function mysqloutparse() {
}

	function createdb() {
		//defined()

	$sql = "CREATE TABLE %s(id INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
							time DATETIME NOT NULL,
							site VARCHAR(256) NOT NULL,
							ipaddr VARCHAR(256),
							email VARCHAR(256),
							abuse VARCHAR(256),
							admincont VARCHAR(256)
							)";
	$sqlres = sprintf($sql, $tabledb);
		if ($con->query($sqlres)===true) {
			echo "Yes? I create is table \"$tabledb\"";
		} else {
			echo "oh no, i not create table:" . $con->error;
		}
	$con->close();
	echo $sql_res;
	}
?>