<?php
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'openchat');
$result1 = mysqli_query($con,"SELECT * FROM logs ORDER BY id DESC");
echo "<div style='overflow-y:scroll; overflow-x:hidden; height:200px; width:800px; background-color:#ecf0f1'>";
while($extract = mysqli_fetch_array($result1)) {
	echo $extract['username']." : ".$extract['msg']."<br>";
}
echo "</div>";



?>