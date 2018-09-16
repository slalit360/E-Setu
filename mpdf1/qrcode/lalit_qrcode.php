<?php
	$msg = isset($_GET['msg']) ? $_GET['msg'] : '';
	require_once('qrcode.class.php');
?>

<html>
<head>
<title>CASTE CERTIFICATE</title>
<style>
table.qr
{
	border-collapse: collapse;
	border: solid 1px black;
	table-layout: fixed;
}

table.qr td
{
	width: 5px;
	height: 5px;
	font-size: 2px;
}

table.qr td.on
{
	background: Blue;
}
</style>
</head>
<body>
<center>
<form method="GET" action="">
<textarea name="msg" ><?php //echo htmlentities($msg); ?></textarea><br>
</br>
Correct the Code :
<input type="submit" value="GO!!">
</form>
Generation of HTML :<br> 

<?php
	$qrcode = new QRcode(utf8_encode($msg), "L");
	$qrcode->displayHTML();
?>

</center>
</body>
</html>