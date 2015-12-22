<?php
$homepage = file_get_contents('http://24whois.ru/?data=3dmodeli.net&t=whois');
$find = 'Admin Email:';
$stroka = strpos($homepage, $find);

print_r($stroka);
?>