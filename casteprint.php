<?php session_start(); $name=$_SESSION[ "print"][ "cert_no"]; ?>
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
     <div>
      <fieldset class="abc" style="margin-left:400px;">
       <legend>Print Your Document</legend>
       <table class="login">
        <tr>
         <td>
          <?php echo "CFT NO. : ".$name;?>
         </td>
        </tr>
        <tr>
         <td>
          <form action="mpdf/castepdf.php">
           <input class="bt1" type="submit" Value="GET PDF">
          </form>
         </td>
        </tr>
        <tr>
         <td>
          <form action="usermain.php">
           <input class="bt1" type="submit" Value="Back menu">
          </form>
         </td>
        </tr>
        <tr>
         <td>
          <form action="login.php">
           <input class="bt1" type="submit" Value="logout">
          </form>
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
  <?php include( 'footer.php'); ?>
  </div>
 </center>
</body>