<html>
<head>

 <link href="styles.css" rel="stylesheet" type="text/css">
 <script>
  	var x = document.forms["myForm"]["uname"].value;
      if (x == null || x == "") 
  	{
          alert("Please enter UserName !");
          return false;
      }
  	return true;
  }
 </script>
 
</head>
<body>
<center>

      <fieldset class="abc" style="width:300px;" >
       <legend>Update Customer Details.</legend>
       <form name="myForm" onsubmit="return validateForm()" action="" method="post">
        <table class="login" width="300px">
         <tr>
          <td>username<sup>*</sup> :</td>
          <td>
           <input type="text" value="" name="uname" size="15" placeholder="username" required>
          </td>
         </tr>
         <tr>
          <td colspan="2" align="right">
           <h6 style="color:black;">* is Mandatory</h6>
          </td>
         </tr>
         <tr align="center">
          <td colspan="2" class="value">
           <input class="bt" name="update" type="submit" value="Update">
           <input class="bt" type="Reset" value="Clear">
          </td>
         </tr>
        </table>
       </form>
	   	<!--<form action="adminmain.php" >
		   <input class="bt" name="" type="submit" value="Home">
		</form-->
      </fieldset>

</center>
	  </body>
	  </html>
<?php 
if(isset($_POST['update'])) 
	{ 
		  $uname=$_POST["uname"];
		  $con=new MongoClient();
		  $db=$con->setu; 
		  $collection=$db->customer;
		   $qry1 = array("uname"=>$uname);
		   $yes=$collection->findOne($qry1);
		   if($yes)
		   { session_start();
		     $_SESSION["new"]=$yes;
		     echo "<script type='text/javascript'>window.location='update2.php';</script>";
		   }
		   else
		   {
			 echo "<script type='text/javascript'>window.alert('Username Not Found !!');</script>";
		   }
	} 
?>
