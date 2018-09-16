<?php 
if(isset($_POST['delete'])) 
	{ 
		  $uname=$_POST["uname"];
		  $con=new MongoClient();
		  $db=$con->setu; 
		  $collection=$db->customer;
		   $qry1 = array("uname"=>$uname);
		   $yes=$collection->findOne($qry1);
		   if($yes)
		   {
			    $result = $collection->remove($qry);
				if($result)
				{
					echo "<script>window.alert('Data removed Successfully');</script>";
				}
				else
				{
					echo "<script>window.alert('Data is not removed.');</script>";
				}
			}
			else
				{   echo "<script>window.alert('Data Doesn't Exist.');</script>"; }
	} 
?>
