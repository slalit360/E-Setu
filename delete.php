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
      <fieldset class="abc" style="width:300px;">
       <legend>Delete Customer Details.</legend>
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
           <input class="bt" name="delete" type="submit" value="Delete">
           <input class="bt" type="Reset" value="Clear">
          </td>
         </tr>
        </table>
       </form>
      </fieldset>
	  </center>
	  </body>
	  </html>
<?php
$result2=null; 
$y=null;
if(isset($_POST["delete"])) 
	{ 
		  $uname=$_POST["uname"];
		  $con=new MongoClient();
		  $db=$con->setu; 
		  $collection=$db->customer;
		   $qry2 = array("uname"=>$uname);
		   $y=$collection->findOne($qry2);
		   if($y)
		   {
			    $result2=$collection->remove($qry2);
				if($result2)
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
