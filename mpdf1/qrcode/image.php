<?php
	$msg = isset($_GET['msg']) ? $_GET['msg'] : '';
	if (!$msg) $msg = "Hiiii I am Lalit Suthar ";


	$err = isset($_GET['err']) ? $_GET['err'] : '';
	if (!in_array($err, array('L', 'M', 'Q', 'H'))) $err = 'L';
	
	require_once('qrcode.class.php');
	
	$qrcode = new QRcode(utf8_encode($msg), $err);
	//$qrcode->disableBorder();
	$qrcode->displayPNG(200);
