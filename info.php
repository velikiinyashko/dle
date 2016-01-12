<?php
include 'phplib/parse.php';
$site = 'xpmaster.ru';

open_site_curl($site);


/*	//$htmlin = file_get_html('http://89.105.144.180/whois/index.php?domain=xpmaster.ru');



	$adminmail = file('http://89.105.144.180/whois/index.php?domain=diablo3fanclub.ru'); //.$site);
	$ipadd = preg_match('/[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}/', $adminmail[0], $ip);
	$abuse = file('http://2whois.ru/?t=whois&data='.$ip[0]);
	print_r($abuse);
	for ($i=200; $i < 300; $i++) { 
		$mail = preg_match('/([a-z0-9_\.\-]{0,10}[abuse]{5}[a-z0-9_\.\-]{0,10})[@]([a-z0-9_\-\.]{1,15}[a-z0-9]{2,6})+\.([a-z]{2,6})/', $abuse[$i], $mailto);
			if (empty($mail)) {
			} else {
				$herateniya = array_unique($mailto);
		print_r($herateniya);
		//echo "$mailto[0]";	
	}
} */
?>