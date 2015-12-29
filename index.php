<head>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
</head>
<body>
	<!--<script type="text/javascript">
		$.ajax(
			type: 'POST',
			url: 'sendmail.php',
			settings,
			settings)
	</script>-->
	<form enctype="multipart/form-data" action="parse.php" method="POST">
		<input type="hidden" name="MAX_FILE_SIZE" value="600000"/>
		Загрузите *.csv для отправки на русском языке: <input name="maillist" type="file"/>
		<input type="submit" value="Отправить"/>
	</form>
	<a href="file_send_mail.csv">результат отправки</a>
		<form enctype="multipart/form-data" action="send.php" method="POST">
		<input type="hidden" name="MAX_FILE_SIZE" value="600000"/>
		Загрузите *.csv для отправки на английском языке: <input name="maillist" type="file"/>
		<input type="submit" value="Отправить"/>
	</form>
	<a href="file_send_mail.csv">результат отправки</a>

</body>

</html>