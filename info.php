<?php
	$adminmail = file('http://192.168.0.1/whois/index.php?domain=fotocelebs.ru'); //.$site);
	$ipadd = preg_match('/[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}/', $adminmail[0], $ip);
	$abuse = file('http://2whois.ru/?t=whois&data='.$ip[0]);
	print_r($abuse);
	/*for ($i=240; $i < 250; $i++) { 
		$mail = preg_match('/([a-z0-9_\.\-])+\@(([a-z0-9\-])+\.)+([a-z0-9]{2,4})+/i', $abuse[$i], $mailto);
			if (empty($mail)) {
			} else {
		echo "$mailto[0]";	
	}
}*/
?>