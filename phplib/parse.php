<?php 
$serverip = '';
$serverabuse = '';

function open_site_curl ($site) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $site);
	curl_setopt($ch, CURLOPT_COOKIESESSION, 1);
	curl_setopt($ch, CURLOPT_HEADER, 1);
	//curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-type: text/xml;charset=\"cp-12\""));
	$open = curl_exec($ch);
	curl_close($ch);
	//return $open;
    $open = iconv("UTF-8","windows-1251//IGNORE", $open);
}

function parseip ($site) {
	$adminmail = file('http://89.105.144.180/whois/index.php?domain='.$site);
	$ipadd = preg_match('/[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}/', $adminmail[0], $ip);
	
}

function parsesite ($ip) {

}
?>