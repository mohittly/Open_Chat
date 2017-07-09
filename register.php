<link rel="stylesheet" href="css/materialize.min.css">

<!--Initialising javascript folders-->
<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
<script src="js/materialize.min.js"></script>
<script src="js/extra.js"></script>

<!--Initialising icon font-->
<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


<?php

if(isset($_POST['submit'])) {

	$con = mysqli_connect('localhost','root','');
	mysqli_select_db($con,'openchat');
	$uname = $_POST['username'];
	$pword = $_POST['password'];
	$pword2 = $_POST['password2'];
	if($pword != $pword2) {
		echo "passwords do not match";
	}
	else
	{

		$checkexist = mysqli_query($con,"SELECT * FROM users WHERE username='$uname'");
		if(mysqli_num_rows($checkexist))
		{
			echo "<center><br><b><span class='flow-text' style='color:#e74c3c'>User already exists, chose another name.</span></b></center>";
		}
		else
		{
			mysqli_query($con,"INSERT INTO users (username,password) VALUES('$uname','$pword')");
			echo "<center><br><b><span class='flow-text' style='color:#34495e'>You are registered. Click <a href='index.php'> here </a> to start chatting.</span></b></center>";
		}
	}

}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<center><br><br><h1 class="flow-text" style="font-size:50px;color:#9b59b6">Free Open Chat Room</h1></center>

<form name="form1" action="register.php" method="post">
<table>


<div class="row"><br><br>
<div class="input-field col s6 offset-s3">
    <input name="username" type="text" class="validate" style="text-align:center;font-size:40px">
    <label for="username">Enter Username</label>
</div>
</div>

 <div class="row">
        <div class="input-field col s6 offset-s3">
          <input name="password" type="password" class="validate" style="text-align:center;font-size:40px">
          <label for="password">Enter Password</label>
        </div>
      </div>
	  
 <div class="row">
        <div class="input-field col s6 offset-s3">
          <input name="password2" type="password" class="validate" style="text-align:center;font-size:40px">
          <label for="password2">Repeat Password</label>
        </div>
      </div>
	 
<tr><br>
<td><center><input type="submit" name="submit" value="Register"></center></td>
</tr>

</table>
</form>
</body>
</html>