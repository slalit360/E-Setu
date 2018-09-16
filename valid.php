<?php

	if(isset($_POST['valid']))
	{
		$con=new MongoClient();
		$db=$con->setu;
		$type=$_POST["type"];
		$cert=$_POST["val"];
		$qry = array("cert_no"=>$cert);
		switch($type)
		{
			case 'caste':  $collection=$db->caste;$result = $collection->findOne($qry);break;
			case 'dom'  :  $collection=$db->dom;$result = $collection->findOne($qry);break;
			case 'income': $collection=$db->income;$result = $collection->findOne($qry);break;
			case 'idcard': $collection=$db->senior;$result = $collection->findOne($qry);break;
		}
		if($result)
		{
			$abc=$result["cert_no"];
			$name=$result["name"];
			$dd=$result["date"]["mday"];
			$mm=$result["date"]["month"];
			$yyi=$result["date"]["year"];
			if($type=='income')
			{	$yye=$result["date"]["year"]; $yye=$yye+1;	}
			else
			{	$yye=$result["date"]["year"]; $yye=$yye+5;	}
				$doi="$dd-$mm-$yyi";
				$doe="$dd-$mm-$yye";
		}
		else
		{
			echo "<script type='text/javascript'>window.alert('InCorrect CFT NO. Or Type.')</script>";
		}
	}
?>

<html>
<head>
 <title>E-setu</title>
 <link href="styles.css" rel="stylesheet" type="text/css">
 <script>
  function validateForm() 
  {
      var x = document.forms["myForm"]["val"].value;
      if (x == null || x == "") 
  	{
          alert("Enter Certificate No.!");
          return false;
    }
  }
 </script>
</head>

<body>
 <center>
  <?php include( 'header.php'); ?>
  <table class="menu1" >
   <tr>
    <td>
     <div>
	 <center>
      <fieldset class="abc" style="margin-left:350px;">
       <legend align="center">Certificate Verification</legend>
       <form name="myForm" onsubmit="return validateForm()" action="" method="post" >
        <table class="login" >
         <tr>
          <td align="center">Enter Certificate No.<sup>*<sup></td>
           <td>
            <input type="text" name="val" size=15 placeholder="Certificate No. " >
           </td>
          </tr>
			<tr>
           <td align="center">Type<sup>*<sup></td>
           <td>
				<select name="type" required>
					<option name="caste" value="caste">CASTE</option>
					<option name="dom" value="dom">DOMICILE</option>
					<option name="income" value="income">INCOME</option>
					<option name="idcard" value="idcard">ID CARD</option>
				</select>
           </td>
          </tr>
          <tr align="center">
           <td colspan="2">
            <input type=submit class='bt' name="valid" value="Verify">
            <td>
          </tr>
		  <tr align="center">
           <td colspan="2">
				<?php if(isset($_POST['valid'])) echo "Certificate No. : $abc "; ?> <br>
				<?php if(isset($_POST['valid'])) echo "Name : $name ";?> <br>
				<?php if(isset($_POST['valid'])) echo "Date Of Issue :$doi";?> <br>
				<?php if(isset($_POST['valid'])) echo "Certificate Valid till :$doe"; ?>
            <td>
          </tr>
         </table>
        </form>
       </fieldset>
	   </center>
      </div>
      </td>
    </tr>
   </table>
  </ul>
  <?php
	include('footer.php');	
	?>
  </div>

  </center>

</body>