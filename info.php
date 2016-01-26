<?php
//include 'conf/class.sql.php';
include 'phplib/parse.php';
$input = $_FILES['maillist']['tmp_name'];
$file = fopen($input, "r+") or die ("not open file!");
$a = 0;
//$numtab = $num++;
for ($i=0; $i=fgetcsv($file, 1000, ";"); $i++) {
	list($domain) = $i;
	$ip = parseip($domain);
	//$pars = parsesite(parseip());
	$b = $a++;
	echo "<table>
			<tr><td>$a</td><td>$domain</td><td>$ip</td></tr></table>";
	}
//echo $_2pars;
//$_2pars = parse2abuse(parseip('KINODON.NET'));

/*
define ('DB_HOST', '127.0.0.1');
define ('DB_PORT', '3306');
define ('DB_USER', 'root');
define ('DB_PASSWD', '');
define ('DB_NAME', 'newsdledb');
define ('CHARSET', 'utf8');
$tabledb = 'parse';

$mybase = new _sqlcon(DB_HOST, DB_USER, DB_PASSWD, DB_NAME);
*/	
//http://rest.db.ripe.net/search.json?query-string=91.203.147.232&flags=no-filtering

?>