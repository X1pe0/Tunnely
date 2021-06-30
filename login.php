<?php session_start(); /* Starts the session */
/* Check Login form submitted */if(isset($_POST['Submit'])){
/* Define username and associated password array */$logins = array('' => 'XXX');

/* Check and assign submitted Username and Password to new variable */$Username = isset($_POST['Username']) ? $_POST['Username'] : '';
$Password = isset($_POST['Password']) ? $_POST['Password'] : '';

/* Check Username and Password existence in defined array */if (isset($logins[$Username]) && $logins[$Username] == $Password){
/* Success: Set session variables and redirect to Protected page  */$_SESSION['UserData']['Username']=$logins[$Username];
header("location: /");
exit;
} else {
/*Unsuccessful attempt: Set error message */$msg="<span style='color:red'>Invalid Login Details</span>";
}
}
?>
<center><br><br><br><br><br><br><br>
	<h3>Tunnely Beta - Tester Login</h3>
<form action="login" method="post" name="Login_Form">
    <?php if(isset($msg)){?>
    <tr>
      <td colspan="2" align="center" valign="top"><?php echo $msg;?></td>
    </tr>
    <?php } ?><br><br>
    <tr>
      <td align="right">Key</td>
      <td><input name="Password" type="password" class="Input"></td>
    </tr>
    <tr>

      <td><input name="Submit" type="submit" value="Login" class="Button3"></td>
    </tr>

</form>
