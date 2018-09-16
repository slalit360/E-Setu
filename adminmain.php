<?php 
	session_start(); 
	if($_SESSION["uname"]) 
       {
		$user=$_SESSION["uname"]["uname"]; 
		} 
	else
		{ header( "Location:adminmain.php"); } 
?>
<html>

<head>
 <title>E-setu</title>
 <link href="styles.css" rel="stylesheet" type="text/css">
</head>

<body>
 <center>
  <?php include( 'header.php'); ?>
  <table class="menu1">
   <tr>
    <td>
      <div style="width:300px;">

       <fieldset class="abc" style="margin-left:30px;">
        <legend>Welcome ,<?php echo $user; ?>!</legend>

        <table class="login">

         <tr>
          <td>
           <form action="update.php">
            <input class="bt1" name="update" type="submit" Value="UPDATE">
           </form>
          </td>
         </tr>

         <tr>
          <td>
           <form action="delete.php">
            <input class="bt1" name="delete" type="submit" Value="DELETE">
           </form>
          </td>
         </tr>
         <tr>
          <td>
           <form action="">
            <input class="bt1" name="display" type="submit" Value="DISPLAY">
           </form>
          </td>
         </tr>
         <tr>
          <td>
           <form action="login.php">
            <input class="bt1" type="submit" Value="LOGOUT">
           </form>
          </td>
         </tr>
        </table>

       </fieldset>

      </div>
	  </td>
	  <td >
   <div style="margin-left:190px;" >
	   <?php 
	   // if(isset($_POST["update"]))
			 include('update.php');    
		//if(isset($_POST["delete"]))
		   { include('delete.php');  }
		?>
	</div>
    </td>

   </tr>

  </table>

  </ul>
  <?php include( 'footer.php'); ?>
  </div>

 </center>

</body>