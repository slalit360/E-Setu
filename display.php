<?php

if(isset($_POST['submitform']))

{

	$con=new MongoClient();

	$db=$con->setu;

	$collection=$db->admin;

	$uname = $_POST['uname'];

	$pass = $_POST['pname'];

	$qry = array("uname"=>$uname, "pass"=>$pass);

	$result = $collection->findOne($qry);
?>