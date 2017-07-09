<?php
session_start();
if(!isset($_SESSION['username'])) {

?>

<!--Initialising css folders-->
<link rel="stylesheet" href="css/materialize.min.css">

<!--Initialising javascript folders-->
<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
<script src="js/materialize.min.js"></script>
<script src="js/extra.js"></script>

<!--Initialising icon font-->
<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<br><br>
<center><h1 class="flow-text" style="font-size:50px;color:#9b59b6">Free Open Chat Room</h1></center>
<form name="form2" action="login.php" method="post">
<table><br><br>
<div class="row">
<div class="input-field col s6 offset-s3">
    <input name="username" type="text" class="validate" style="text-align:center;font-size:40px">
    <label for="username">Username</label>
</div>
</div>
 <div class="row">
        <div class="input-field col s6 offset-s3">
          <input name="password" type="password" class="validate" style="text-align:center;font-size:40px">
          <label for="password">Password</label>
        </div>
      </div>
<tr>
<td><center><input type="submit" name="submit" value="Login"></center></td>
</tr>
<tr><br>
<td class="flow-text"><br><center>Not Signed Up? <a href="register.php">Register here.</a></center></td>
</tr>

</table>
</form>

<?php

exit;
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Open Chat</title>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
		<script type="text/javascript">
		$(document).ready(function() {
			document.getElementById('one').onkeypress = function(e){
    if (!e) e = window.event;
    var keyCode = e.keyCode || e.which;
    if (keyCode == '13'){
      // Enter pressed
        submitChat();
    }
  }
  
			   var refreshId = setInterval(function() {
			      $("#chatlogs").load('logs.php');
			      //OR THIS WAY : $("#responsecontainer").load('response.php?randval='+ Math.random());

			   }, 1500);
			   $.ajaxSetup({ cache: false });
		});


		function submitChat() {
			if(form1.msg.value == '' ) {
				alert("Dont leave anything blank");
				return;
			}
		var msg = form1.msg.value;
		var xmlhttp = new XMLHttpRequest();

		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById('chatlogs').innerHTML = xmlhttp.responseText;
			}
		}

		xmlhttp.open('GET','insert.php?&msg='+msg,true);
		xmlhttp.send();

		 
		}

	</script>
	<!--Initialising css folders-->
<link rel="stylesheet" href="css/materialize.min.css">

<!--Initialising javascript folders-->
<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
<script src="js/materialize.min.js"></script>
<script src="js/extra.js"></script>

<!--Initialising icon font-->
<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>

<body>

	<form name="form1"><br><br>
		<span class="flow-text"><center>Your Chat Name : <?php echo $_SESSION['username']; ?></center></span><br>
		 <div class="row"><div class="col s6 offset-s3"><input type="text" name="msg" style="text-align:center" id='one'></div></div><br>
		<center><span class="flow-text"><a href="#" onclick="submitChat()">Send | </a>
		<a href="logout.php"><span style="color:#e74c3c"><b>Logout</b></span></a><br><br></center>
		<center><div id="chatlogs">
		Loading ChatLogs Please Wait...</span>
		</div></center>
	</form>
	


</body>
</html>