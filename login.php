<link rel="stylesheet" href="css/materialize.min.css">

<!--Initialising javascript folders-->
<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
<script src="js/materialize.min.js"></script>
<script src="js/extra.js"></script>

<!--Initialising icon font-->
<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<?php
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'openchat');

$result = mysqli_query($con,"SELECT * FROM users WHERE username='$username' AND password='$password' ");

if(mysqli_num_rows($result)) {
	$res = mysqli_fetch_array($result);
	$_SESSION['username'] = $res['username'];
	echo "<br><br><br><br><center><span class='flow-text'>You are now logged in.<br><br> <i class='large material-icons' style='color:#3498db'>thumb_up</i><br><br>Click <a href='index.php'>here </a> to go back to main chat window.</span></center>";
}

else
{
	echo "<br><br><br><br><center><span class='flow-text'>No user found. <br><br> <i class='large material-icons' style='color:#e74c3c'>thumb_down</i><br><br>Go <a href='index.php'> Back </a>";
	echo "Or register <a href='register.php'>Here </a></center></span>";
}


?>