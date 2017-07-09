<link rel="stylesheet" href="css/materialize.min.css">

<!--Initialising javascript folders-->
<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
<script src="js/materialize.min.js"></script>
<script src="js/extra.js"></script>

<!--Initialising icon font-->
<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<?php
session_start();
session_destroy();
echo "<center><span class='flow-text'><br><br><br>Logged out. <br><br><i class='large material-icons'>done_all</i><br><br>Click <a href='index.php'> here </a> to login agian.</span></center>";
?>