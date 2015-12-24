<?php
//$maillist=$_FILES['maillist']['tmp_name'];

//$file=fopen($maillist, "r+") or die ("Warning!");
//for ($i=0; $info=fgetcsv($file, 1000, ";"); $i++) { 
//	list($site) = $info;
	$adminmail = file('http://2whois.ru/?t=whois&data=mk-service.ru');
	$ipadd = preg_match('/[0-9]+\.[0-9]+\.[0-9]+\.[0-9]/', $adminmail[197], $ip);
	$abuse = file('http://2whois.ru/?t=whois&data='.$ip[0]);
	$mail = preg_match('/([a-z0-9_\.\-])+\@(([a-z0-9\-])+\.)+([a-z0-9]{2,4})+/i', $abuse[244], $mailto);
	echo "$mailto[0]<br>";
?>