<?php
$maillist=$_FILES['maillist']['tmp_name'];

$file=fopen($maillist, "r+") or die ("Warning!");
for ($i=0; $info=fgetcsv($file, 1000, ";"); $i++) { 
	list($site) = $info;
	$adminmail = file('http://89.105.144.180/whois/index.php?domain='.$site);
	$ipadd = preg_match('/[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}/', $adminmail[0], $ip);
	$abuse = file('http://2whois.ru/?t=whois&data='.$ip[0]);
	$mail = preg_match('/([a-z0-9_\.\-])+\@(([a-z0-9\-])+\.)+([a-z0-9]{2,4})+/i', $abuse[244], $mailto);
	echo "$mailto[0]<br>";
	sleep(3);
}
fclose($file);
?>