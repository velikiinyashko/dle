<?php
$maillist=$_FILES['maillist']['tmp_name'];
$outfile=fopen("upload/file_send_mail.csv", "w+") or die ("Warning!");
$file=fopen($maillist, "r+") or die ("Warning!!");

for ($i=0; $info=fgetcsv($file, 1000, ";"); $i++) { 
	list($site) = $info;
	$adminmail = file('http://89.105.144.180/whois/index.php?domain='.$site);
	$ipadd = preg_match('/[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}/', $adminmail[0], $ip);
	$abuse = file('http://2whois.ru/?t=whois&data='.$ip[0]);
		for ($i=200; $i < 300; $i++) { 
			$mail = preg_match('/([a-z0-9_\.\-]{0,10}[abuse]{5}[a-z0-9_\.\-]{0,10})[@]([a-z0-9_\-\.]{1,15}[a-z0-9]{2,6})+\.([a-z]{2,6})/', $abuse[$i], $mailto); //([a-z0-9_\.\-])+\@(([a-z0-9\-])+\.)+([a-z0-9]{2,4})+/i
				if (empty($mail)) {
				} else {
					fputcsv($outfile, array($site,$mailto[0]), ";");
				}
		}
	
	sleep(5);
}
fclose($file);
fclose($outfile);
?>