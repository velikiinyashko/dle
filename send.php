<?php
	require '/phplib/phpmailer/PHPMailerAutoload.php'; // подключаем библиотеку phpmailer для отправки почты через внешний smtp
	$buy='<a href="http://dle-news.ru/index.php?do=buy">сайте</a>'; //страница цен DLE
	$dle='<a href="http://dle-news.ru/index.php">сайте</a>'; //ссылка на сайт DLE
	$buyen='<a href="http://dle-news.ru/index.php?do=buy">site</a>'; //страница цен DLE для английского текста
	$dleen='<a href="http://dle-news.ru/index.php">site</a>'; //ссылка на сайт DLE для английского текста
	$mailto='<a href="mailto:legacy@dle-news.ru">legacy@dle-news.ru</a>'; // майлто ссылка на почту легаси
	$fips='<a href="http://www1.fips.ru/Archive/EVM/2015/2015.11.20/DOC/RUNW/000/002/010/612/523/document.pdf">№ 2010612523</a>'; // ссылка на патент
	$time=date('H:i:s'); // устанавливаем формат времени для отчета
	$dataout=date('d.m.y'); // устанавливаем формат даты для отчета
	$out='<a href=file_send_mail.csv">результат отправки</a>'; // ссылка на собранный csv файл еще в доработке
	$maillist=$_FILES['maillist']['tmp_name']; // передаем в переменную загруженный файл по темп имени
	
$file=fopen($maillist, "r") or die ("Warning!"); // открываем переданный в переменную файл, в случае не возможности возвращает ошибку
/* начинаем цыкал по очередной отправки на емаил в переданом файле*/
for ($i=0; $info=fgetcsv($file, 1000, ";"); $i++) {
	list($site, $to) = $info;

	$subject="Претензия $site"; //тема письма
	$message="
	===================================RUSSIAN=====================================================================<br><br>
	<b>Уважаемая хостинг (телекоммуникационная) компания.</b><br>
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
	
	===================================ENGLISH=========================================================================<br><br>
	<b>Dear hosting (telecommunications) company.</b><br>
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
	Based on this, we ask you to stop infringement of intellectual property rights, namely, use licensed version of the computer software program «DataLife Engine». To do this you need to pay a license on our $buyen , which costs 3990 rub.
	After payment, please, inform us on e-mail: $mailto that you have purchased a license for the Program, specifying the domain and account on $dleen for which you purchased the Program. It is necessary to remove your address from the database of illegal copies.
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
	The administration of \"SoftNews Media Group\""; // текст притензии 

	$mail = new PHPMailer; // обьявляем функцию
	
	$mail -> setLanguage('ru'); // устанавливаем язык
	$mail -> isSMTP(); // включаем smtp
	$mail -> Host = 'mail.dle-news.ru'; // указываем сервер smtp
	$mail -> SMTPAuth = true; // включаем необходимость авторизации
	$mail -> Username = 'legacy@dle-news.ru'; // указываем логин для авторизации
	$mail -> Password = 'xjyOUEjz'; // пароль для авторизации
	$mail -> Port = 25; // порт smtp сервера

	$mail -> CharSet = 'UTF-8'; // указываем кодировку
	$mail -> setFrom('legacy@dle-news.ru', 'DataLife Engine'); // заполняем поле "ОТ"
	$mail -> addAddress($to); // указываем получателя (в данном случае береться переменной из файла с ящиками)
	$mail -> addBCC('legacy@dle-news.ru'); // указываем кому отправляем скрытую копию (вариант отсутствия возможности положить в папку отправленные)
	$mail -> addReplyTo('legacy@dle-news.ru'); // указываем адрес для ответа на письмо
	$mail -> isHTML(true); // включить HTML в тексте письма
	$mail -> Subject = $subject; // заголовок письма
	$mail -> Body = $message; // текст письма
	/* отправляем почту, выводим сообщение об отправки в ином случае показываем ошибку*/
		if (!$mail -> send()) {
			echo "Message is not send <br>";
			echo "Mailer error:" . $mail -> ErrorInfo . "<br>";
			sleep(2);
		} else {
			echo "Message is send $to <br>";
			sleep(2);
		}
}
fclose($maillist);
?>