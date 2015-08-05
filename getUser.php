<?php 

	require_once 'fcnsdb.php';

	if(isset($_POST['userid'])){
		$userid = $_POST['userid'];
		$query = "SELECT username FROM udescti.user WHERE user_id='$userid'";
		$row = mysqli_fetch_row(query($query));
		echo $row[0];
	}

?>