<?php
/*
личные функции для парсинга необходимых значений для сайтов,
основа для парсинга в данном случае библиотека cURL включенная в PHP
не забываем проверить что он собран с этой библиотекой, самый простой
способ это открыть в браузере приложенный в корне файли phpinfo.php
в ввыводе найти раздел cURL если значеное стоит Enable все замечательно
*/
$site = 'google.com';
$serverip = 'http://89.105.144.180/whois/index.php?domain='; // сайт на котором будет произходить поиск IP сайта
$serverabuse = ''; // сайт на котором будем искать контакты хостера
$out = 'test.txt'; // пока тестовая переменная ее использование может быть не понадобиться

function parseip ($site) {
	$ch = curl_init('http://89.105.144.180/whois/index.php?domain='.$site);
		$headers = array("Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8");
		$option = array(CURLOPT_COOKIESESSION => true,
						CURLOPT_HEADER => false,
						CURLOPT_RETURNTRANSFER => true,
						CURLOPT_FRESH_CONNECT => true,
						CURLOPT_ENCODING => "",
						CURLOPT_USERAGENT => "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0",
						CURLOPT_HTTPHEADER => $headers,
						);
			curl_setopt_array($ch, $option);
		$open = curl_exec($ch);
	curl_close($ch);
	$arr = explode(" ", $open);
	$ip = explode("<br>", $arr[3]);
	return $ip[0];
}

function parsesite ($ip) {
	$ripe = "http://rest.db.ripe.net/abuse-contact/%s.json";
	$str = sprintf($ripe, $ip);
	$ch = curl_init($str);
		$headers = array("Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8");
		$option = array(CURLOPT_COOKIESESSION => true,
						CURLOPT_HEADER => false,
						CURLOPT_RETURNTRANSFER => true,
						CURLOPT_FRESH_CONNECT => true,
						CURLOPT_ENCODING => "",
						CURLOPT_USERAGENT => "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0",
						CURLOPT_HTTPHEADER => $headers,
						);
			curl_setopt_array($ch, $option);
		$open = curl_exec($ch);
	curl_close($ch);
	$jsn = json_decode($open, true);
	return $jsn['abuse-contacts']['email'];
}

function parse2abuse($ip) {
	$ripe = "http://rest.db.ripe.net/search.json?query-string=%s&flags=no-filtering";
	$str = sprintf($ripe, $ip);
	$ch = curl_init($str);
		$headers = array("Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8");
		$option = array(CURLOPT_COOKIESESSION => true,
						CURLOPT_HEADER => false,
						CURLOPT_RETURNTRANSFER => true,
						CURLOPT_FRESH_CONNECT => true,
						CURLOPT_ENCODING => "",
						CURLOPT_USERAGENT => "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0",
						CURLOPT_HTTPHEADER => $headers,
						);
			curl_setopt_array($ch, $option);
		$open = curl_exec($ch);
	curl_close($ch);
	$jsn = json_decode($open, true);
	print_r($jsn);
	return; //$jsn['abuse-contacts']['email'];
}
?>