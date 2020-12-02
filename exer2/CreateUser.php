<?php
	$user_id = $_POST["username"];

	$users = new mysqli("mysql.eecs.ku.edu","ethangrantz","baiqu3Ae","ethangrantz");

	if ($users->connect_errno) {
		printf("Connect failed: %s\n", $users->connect_error);
		exit();
	}

	$query = "INSERT INTO Users VALUES ('$user_id')";

	if ($users->query($query)) {
		echo "<p>Account has been successfully created!</p><br /";
	} else {
		echo "<p>Username already taken!</p><br />";
		echo "<a href='CreateUser.html'>Try again?</a>";
	}

	$users->close();
?>
