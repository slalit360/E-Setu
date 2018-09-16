<?php

session_start();

?>
<html>

<head>
 <title>E-setu</title>
 <link href="styles.css" rel="stylesheet" type="text/css">
 <script>
  function validateForm() 
  {
      var x = document.forms["myForm"]["fname"].value;
      if (x == null || x == "") 
  	{
          alert("Please enter UserName !");
          return false;
      }
  	var y = document.forms["myForm"]["pname"].value;
      if (y == null || y == "") 
  	{
          alert("Please Enter Password !");
          return false;
      }
  	return true;
  }
 </script>
</head>

<body>
 <center>
  <?php include( 'header.php'); ?>


  <table class="menu1">
   <tr>
    <td>
     <div>
      <fieldset class="abc" style="margin-left:360px;">
       <legend>Admin Login</legend>
       <form name="myForm" action="" onsubmit="return validateForm()" method="post">
        <table class="login">
         <tr>
          <td>Username<sup>*<sup> :</td>

           <td>

            <input type="text" name="uname" size="22" placeholder="Username" required>

           </td>

          </tr>

          <tr>

           <td>Password<sup>*<sup> :</td>

           <td>

            <input type="password" name="pname" size="20" placeholder="password" required>

           </td>

          </tr>

		  <tr>

           <td colspan="2" align="right">

            <h6 style="color:black;">* is Mandatory</h6>

           </td>

          </tr>

          <tr>

           <td align="right">

            <input class="bt" name="submitform" type="submit" value="Login">

            <td>

             <a href="adminsignup.php">

              <input class="bt" type="button" value="Signup">

             </a>

            </td>

          </tr>

         </table>

        </form>

       </fieldset>

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

            if($result)
			{	
                echo"<script>window.alert('welcome : $uname '); window.location ='http://localhost/setu/adminmain.php';</script>";
				$_SESSION["uname"]=$result;
            }
            else
			{
              echo"<script>window.alert('Please Enter a valid email or password');</script>";
            }
}

?>