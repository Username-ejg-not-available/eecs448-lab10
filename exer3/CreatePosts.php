<?php
	$user_id = $_POST["username"];
	$content = $_POST["content"];
	$sql = new mysqli("mysql.eecs.ku.edu","ethangrantz","baiqu3Ae","ethangrantz");

	if ($sql->connect_errno) {
		printf("Connect failed: %s\n", $sql->connect_error);
		exit();
	}

	$userquery = "SELECT * FROM Users WHERE user_id='$user_id'";

	if ($sql->query($userquery)->num_rows) {
		$postquery = "INSERT INTO Posts (content,author_id) VALUES ('$content','$user_id')";
		if ($sql->query($postquery)) {
			echo "<p>Posted successfully!</p><br />";
			echo "<a href='CreatePosts.html'>Make another Post?</a>";
		} else {
			echo "<p>Error: " . $sql->error . "";
		}
	} else {
		echo "<p>Not a valid username!</p><br />";
		echo "<a href='CreatePosts.html'>Try again?</a>";
	}

?>
