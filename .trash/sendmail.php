﻿<?php
/*	скрипт разбора и отправки писем из csv файла
	настройки smtp сервера для отправки настраиваються в файле smtp.php,
	так же в нем описываеться работы функции MailSmtp, без этого файла эта функция не будет работать,
	так-как данная функция не являеться стандар
*/
$buy='<a href="http://dle-news.ru/index.php?do=buy">сайте</a>'; //страница цен DLE
$mailto='<a href="mailto:legacy@dle-news.ru">legacy@dle-news.ru</a>'; // майлто ссылка да почту легаси
$fips='<a href="http://www1.fips.ru/Archive/EVM/2015/2015.11.20/DOC/RUNW/000/002/010/612/523/document.pdf">№ 2010612523</a>'; // ссылка на патент
$dle='<a href="http://dle-news.ru/index.php">сайте</a>';
$time=date('H:i:s'); // устанавливаем формат времени для отчета
$dataout=date('d.m.y'); // устанавливаем формат даты для отчета
$out='<a href=file_send_mail.csv">результат отправки</a>'; 
$maillist=$_FILES['maillist']['tmp_name']; // передаем в переменную загруженный файл
// print_r($_FILES);
//$fileout=

$file=fopen($maillist, "r") or die ("Warning!"); // открываем файл csv для чтения, если не смогли пишем ошибку
$outfile=fopen("/upload/export_$dataout.csv", "w");
//$outfile=fopen($_SERVER['DOCUMENT_ROOT'].'/upload/export_'.time().'.csv', 'w');
//$outfile=fopen('http://temp', 'r+');
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
			$subject="Претензия $site";
			// текст письма
			$message="<b>Уважаемая хостинг (телекоммуникационная) компания.</b><br>
<br>
На Ваших серверах, либо в Вашей подсети размещен сайт <b>\"$site\"</b>, нарушающий наши авторские права.<br><br>
Просим принять соответствующие меры по устранению владельцем сайта нарушения авторских прав, а именно блокировку сайта до устранения нарушений.
Также Вы вправе запросить у клиента документы на право размещения спорного контента. Необходимо отметить также, что в соответствии с Законодательством РФ бремя доказывания обстоятельств несет сторона, которая на них ссылается. То есть владелец сайта должен предоставить Вам подтверждающие документы о наличии у него лицензионной версии программы, в противном случае, без предоставления подтверждающих документов, считается, что владелец сайта использует нелицензионный контент.<br><br>
На данном сайте незаконно используется и/или распространяется оригинальная программа для ЭВМ «DataLife Engine» зарегистрирована как объект интеллектуальной собственности Федеральной службой по интеллектуальной собственности, патентам и товарным знакам под $fips в реестре программ для ЭВМ 12 апреля 2010 г. Исключительные права на Программу принадлежат ООО «СофтНьюс Медиа Групп», согласно уведомления о государственной регистрации отчуждения исключительного права (№ РД0183156 от 14.10.2015). Официальный патент (договор об отчуждении) Вы можете посмотреть в отрытом доступе по ссылке: http://www1.fips.ru/Archive/EVM/2015/2015.11.20/Index.htm, выбрать: Извещения - ПрЭВМ Договор об отчуждении - $fips. Данная программа является системой управления контентом (CMS), под управлением которой работают указанные сайты.<br><br>
Сообщаем о том, что в соответствии со ст. 1253.1 и ст. 1252 ГК РФ установлена ответственность информационного посредника (хостинг-провайдера) за несвоевременное принятие необходимых и достаточных мер для прекращения нарушения интеллектуальных прав, после получения заявления правообладателя о нарушении интеллектуальных прав с указанием страницы сайта и (или) сетевого адреса в сети «Интернет».<br>
Согласно Постановлению Президиума, ВАС РФ от 01.11.2011 № 6672/11 при отсутствии со стороны провайдера в течение разумного срока действий по пресечению либо в случае его пассивного поведения, демонстративного и публичного отстранения от содержания контента суд может признать наличие вины провайдера в допущенном правонарушении и привлечь его к ответственности.<br>
Ставим Вас в известность, что в практике Московского городского суда, куда обращаются правообладатели за защитой своих прав, есть множество примеров о привлечении в качестве ответчиков именно хостинг-провайдеров (на основании п. 4 ст. 1253.1 ГК РФ о возможности предъявления к ним требований, не связанных с применением, мер гражданско-правовой ответственности), а не владельцев сайтов, т.к. хостинг-провайдеры, обеспечивают возможность размещения и передачи в Интернете контента.
На основании вышеизложенного, просим принять активные меры по устранению нарушения законодательства, вплоть до блокировки сайта.<br><br>

Ниже приводим текст письма, отправленного администратору сайта, на которое устранения нарушений Законодательства РФ не последовало. Текст письма:<br>
<i>\"Уважаемые владельцы сайта. Вы используете систему управления сайтом, программу, ЭВМ «DataLife Engine» (далее Программа), зарегистрированную, как объект интеллектуальной собственности Федеральной службой по интеллектуальной собственности, патентам и товарным знакам под $fips в реестре программ для ЭВМ 12 апреля 2010 г. Исключительные права на Программу принадлежат ООО «СофтНьюс Медиа Групп», согласно уведомления о государственной регистрации отчуждения исключительного права (№ РД0183156 от 14.10.2015).<br>
Вы используете нелегальную копию нашей Программы, чем нарушаете закон об авторском праве (ст. 1261 Гражданского кодекса Российской Федерации). Обращаем Ваше внимание на то, что в соответствии с п. 3 ст. 1250 ГК РФ, отсутствие вины нарушителя не освобождает его от обязанности прекратить нарушение интеллектуальных прав, а также не исключает применение в отношении нарушителя мер, направленных на защиту таких прав.<br>
Кроме того, правообладатель имеет право взыскать компенсацию, размер которой определяется судом в зависимости от характера нарушения (п. 3 ст. 1252 ГК РФ), а возможные границы установлены ст. 1301 Гражданского кодекса. По выбору правообладатель может требовать компенсацию в размере от 10 тыс. до 5 млн. руб. либо компенсацию в двукратном размере стоимости контрафактных экземпляров произведений (или права использования), определяемой исходя из цены, которая при сравнимых обстоятельствах обычно взимается за правомерное использование произведения.<br>
В связи с вступившими 01.05.2015 г. изменениями в ФЗ № 149-ФЗ «Об информации, информационных технологиях и о защите информации» мы имеем право обратиться в суд для блокировки Вашего сайта по причине незаконного использования программы для ЭВМ (использования нелицензионной версии программы).<br>
На основании этого, предлагаем Вам урегулировать данную ситуацию в досудебном порядке с минимальными издержками с Вашей стороны.<br>
Для этого Вам необходимо в течение 10 (десяти) рабочих дней оплатить лицензию на нашем $buy, стоимость которой, включая право на удаление копирайтов и услуги техподдержки, составляет 3990 рублей. Кроме урегулирования данной претензии, это даст Вам возможность получать последние версии программы, а так же получать всестороннюю поддержку.<br>
Также Вы можете оплатить лицензию сделав перечисление на наш р/с, для этого Вам необходимо, после авторизации на нашем сайте, запросить счет на оплату, используя форму обратной связи.<br>
После оплаты сообщите, пожалуйста, нам на e-mail: $mailto о том, что Вы приобрели лицензию на Программу, с указанием домена и логина на $dle, на которые Вы приобретали Программу. Это необходимо для удаления Вашего адреса из базы нелегальных копий.<br>
По любым возникшим вопросам Вы можете обращаться на нашу электронную почту $mailto.<br>
В противном случае, по истечению 14 (четырнадцати) дней, мы собираемся прекратить незаконное использование Вами программы ЭВМ «DataLifeEngine» и для этого мы:<br>
1. Обратимся в компанию, которая предоставляет Вам услуги хостинга, для того, чтобы они приостановили работу сайта, до момента устранения Вами нарушения авторских прав.<br>
2. Обратимся в суд для возмещения ущерба, причиненного нашей компании. По выбору правообладатель может требовать компенсацию в размере от 10 тыс. до 5 млн. руб. Необходимо отметить, что сумма предъявленного к Вам требования увеличится за счет расходов на госпошлину и услуг юристов (в зависимости от длительности судебного процесса стоимость услуг юриста может достигнуть 50 000 рублей).<br>
Необходимо отметить, что использование нелегальной копии нашей Программы является не только нарушением наших прав и законодательства РФ, но и может представлять существенную угрозу безопасности Вашего сайта, и привести к несанкционированному доступу к вашему сайту и его взлому злоумышленниками, т.к. очень часто в дистрибутивы скачанные не официально, злоумышленниками вносятся различные бекдоры, позволяющие осуществить несанкционированный доступ к сайту.\"</i><br>
<br>
Надеемся на понимание.<br>
<br>
С уважением,<br>
Администрация ООО “СофтНьюс Медиа Групп”<br><br>
";
			// подключаем ранее упомянутый файл с функцией MailSmtp
			require_once "smtp.php"; 
			//MailSmtp($to, $subject, $message, $headers);
				echo "Ваше сообщение для $site отправленно в $time <br><br>";
				fputcsv($outfile, array($site,$to,$dataout,$time), ";");
				// делаем паузу в цикле для уменьшения запросов на smtp сервер
				sleep(2);
		}
fclose($file);
fclose($outfile);
//echo $out;
?>