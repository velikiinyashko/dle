<?php
$maillist=$_FILES['maillist']['tmp_name'];


$file=fopen($maillist, "r") or die ("Warning!");
for ($i=0; $i=fgetcsv($file, 1000, ";"); $i++) { 
	list($site) = $i;
	//$adminmail = file_get_contents('http://24whois.ru/?data='.$site.'&t=whois');
	$adminmail = file_get_contents('http://1whois.ru/?url='.$site);
	//$adminmail = file_get_contents('https://www.reg.ru/whois/?dname='.$site.'&_csrf=b56d505b61035182861d357f9c44336e');
		$mailadmin = preg_match('/([a-z0-9_\.\-])+\@(([a-z0-9\-])+\.)+([a-z0-9]{2,4})+/i', $adminmail, $findmail);
		$ipadd = preg_match('/[0-9]+\.[0-9]+\.[0-9]+\.[0-9]/', $adminmail, $ip);
	//$mailabuse = file_get_contents('http://24whois.ru/?t=whois&data=$ip[0]');
		//$mail = preg_match('/([a-z0-9_\.\-])+\@(([a-z0-9\-])+\.)+([a-z0-9]{2,4})+/i', $mailabuse, $abuse);
		//$contact = preg_match('~(http|https|ftp|ftps)://(.*?)(\s|\n|[,.?!](\s|\n)|$)~', $adminmail, $conaddr);
			print_r($findmail[0]);
			print_r($ip[0]);
			//print_r($conaddr[0]);
			//print_r($abuse[0]);
}


?>