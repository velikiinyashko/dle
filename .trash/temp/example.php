<?php 
	date_default_timezone_set('Europe/Kaliningrad');
    setlocale(LC_ALL, 'ru_RU.UTF8');
	error_reporting( E_ALL );
	require_once('smtp_class.php'); //подключение модели
	
	$smtp = new SMTP('ssl://smtp.yandex.ru', 465, 'myemail@yandex.ru','mybigpassword','Вася пупкиноффф','imap.yandex.ru',993); // задаем конфиг для подключения к почте, последние два параметра для сохранения в исходящих
	
	$mail_text = "<div style='background-color: #DFE9F0;color: #2A5594;font-size: 16px !important;font-weight: normal;margin: 10px 30px;padding: 20px;text-decoration: none;'>Текст сообщения! кириллица!</div>";
	
	$sended=$smtp->send_mail('info@unibix.ru','тема письма (письмо с вложениями)',$mail_text,array('новый файл.txt','smtp_class.php')); // c вложениями
	$sended=$smtp->send_mail('info@unibix.ru','тема письма (обычное письмо без вложений)',$mail_text); // без вложений



    if ($sended === true){
        $message = 'Письмо было успешно отправлено. ';
    }
    else{
        $message = 'Письмо не удалось отправить. Ошибка: '.$sended;
    }
?>
<html>
<?=$message;?>
</html>