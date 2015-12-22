<?php
/*	скрипт разбора и отправки писем из csv файла
	настройки smtp сервера для отправки настраиваються в файле smtp.php,
	так же в нем описываеться работы функции MailSmtp, без этого файла эта функция не будет работать,
	так-как данная функция не являеться стандар
*/
$buy='<a href="http://dle-news.ru/index.php?do=buy">website</a>'; //страница цен DLE
$mailto='<a href="mailto:legacy@dle-news.ru">legacy@dle-news.ru</a>'; // майлто ссылка да почту легаси
$fips='<a href="http://www1.fips.ru/Archive/EVM/2015/2015.11.20/DOC/RUNW/000/002/010/612/523/document.pdf">№ 2010612523</a>'; // ссылка на патент
$dle='<a href="http://dle-news.ru/index.php">site</a>';
$time=date('H:i:s');
$dataout=date('d.m.y');
$out='<a href=file_send_mail.csv">результат отправки</a>';
$maillist=$_FILES['maillist']['tmp_name'];
print_r($_FILES);

$file=fopen($maillist, "r") or die ("Warning!"); // открываем файл csv для чтения и работы с ним если не смогли пишем ошибку
$outfile=fopen("file_send_mail.csv", "w");
	for ($i=0; $info = fgetcsv($file, 1000 , ";"); $i++) // разбираем файл по строкам в данном случае разделитель ";" 
		{ 
			// разбираем строки по переменным $site-адрес сайта, $to-почта
			list($site, $to) = $info;
			// загаловок с определение кодировки текста			
			$headers = "MIME-Version: 1.0\r\n";
			$headers .= "Content-type: text/html; charset=utf-8\r\n";
			$headers .= "To: $to\r\n";
			$headers .= "From: DataLife Engine <legacy@dle-news.ru>";
			// заголовок письма
			$subject="Claim $site";
			// текст письма
			$message="<b>Dear hosting (telecommunications) company.</b><br>
<br>
On your servers or in your subnet hosted website <b>\"$site\"</b> , violate our copyrights.<br>
<br>
Please take appropriate measures to address the site owner of copyright infringement, namely the site blocking to eliminate violations. You have the right to ask the client documents for the right placement of the content management system on the site.
It should be noted also that, in accordance with the legislation of the Russian Federation bears the burden of proving the circumstances of the party that they are referenced. That is, the site owner should provide you with supporting documents about the presence of a licensed version of the program; otherwise, without providing supporting evidence, it is believed that the owner of the website uses unlicensed content.<br>
<br>
This site illegally used and / or distributed the original computer program «DataLife Engine» registered as an object of intellectual property Federal Service for Intellectual Property, Patents and Trademarks under $fips in the registry of the computer programs April 12, 2010 Exclusive rights to the Software belong to LLC \"SoftNyus Media Group\", according to the notice on state registration of the alienation of the exclusive right (№ RD0183156 from 04.10.2015). The official patent (contract on alienation), You can see in the open access to the link: http://www1.fips.ru/Archive/EVM/2015/2015.11.20/Index.htm, choose: Notice - PrEVM contract for the alienation - number $fips. This program is a content management system (CMS), is running on the specified sites.<br>
<br>
Please be informed that Art. 1253.1 of the Civil Code establishes liability information broker (Hosting Service Provider) for failure to take the necessary and sufficient measures to stop the violation of intellectual property rights, after receiving the application owner for violation of intellectual property rights with an indication of the site and (or) network address in the network \"Internet\".
Based on the above, please take proactive measures to eliminate violations of the law, up to block the site.<br>
<br>
Below is the text of a letter sent by the administrator of the site on which the elimination of violations of copyright law was not followed. Text of the letter:<br>
<i>“Dear Sirs,
Your site is based on a computer program «DataLife Engine». Maybe you do not know, but this program is copyrighted and protected by Russian and international legislation, registered as an object of intellectual property Federal Service for Intellectual Property, Patents and Trademarks under $fips in the registry of the computer programs April 12, 2010 Exclusive rights to the Software belong to LLC \"SoftNyus Media Group,\" according to the notice on state registration of the alienation of the exclusive right (№ RD0183156 from 04.10.2015).
In connection with the amendments of 01/05/2015 which entered the Federal Law № 149-FZ \"On information, information technologies and information protection\" we have the right to go to court to block your site because of illegal use of computer programs (the use of unlicensed software version) .
Based on this, we invite you to resolve this situation in the pre-trial order with minimal cost on your part.
Based on this, we ask you to stop infringement of intellectual property rights, namely, use licensed version of the computer software program «DataLife Engine». To do this you need to pay a license on our $buy , which costs 3990 rub.
After payment, please, inform us on e-mail: legacy@dle-news.ru that you have purchased a license for the Program, specifying the domain and account on $dle for which you purchased the Program. It is necessary to remove your address from the database of illegal copies.
We hope for your understanding and stop of copyright infringement.
Also, the use of illegal copies of our programs can pose a substantial threat to the security of your site and lead to unauthorized access to your site and its malicious user since very often in the distribution downloaded is not officially intruders entered various backdoor, allowing to carry out unauthorized access to the site.
Otherwise, discharging is distributed by fourteen (14) days, we're going to stop the illegal use of your computer programs «DataLife Engine» and for this we will:
1. we will ask the hosting provider to shut down your site
2. we will be forced to use judicial measures of protection
If you have any questions, you can contact our email $mailto.
It should be noted that the use of illegal copies of our program is not only a violation of our rights and laws of the Russian Federation, but also can be a significant threat to the security of your site and lead to unauthorized access to your website by hackers and hacking, as very often in the distribution downloaded is not officially introduced various backdoor by attackers, allowing to carry out unauthorized access to the site.”</i><br>
<br>
We hope for your understanding.<br>
<br>
Sincerely,<br>
The administration of \"SoftNews Media Group\"
";
			// подключаем ранее упомянутый файл с функцией MailSmtp
			require_once "smtp.php"; 
			MailSmtp($to, $subject, $message, $headers);
				//echo "$message";
				echo "Ваше сообщение для $site отправленно в $time <br><br>";
				fputcsv($outfile, array($site,$to,$dataout,$time), ";");
				// делаем паузу в цикле для уменьшения запросов на smtp сервер
				sleep(2);
		}
fclose($file);
fclose($outfile);
//echo $out;
?>