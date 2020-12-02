<?php
	echo "<link rel='stylesheet' type='text/css' href='../../lab9/exercise3/style.css' />";
	$user_id = $_POST["users"];

	$sql = new mysqli("mysql.eecs.ku.edu","ethangrantz","baiqu3Ae","ethangrantz");

	if ($sql->connect_errno) {
		printf("Connect failed: %s\n", $sql->connect_error);
		exit();
	}

	$postquery = "SELECT * FROM Posts WHERE author_id='$user_id'";
	echo "<table><thead><tr><th colspan='2'>$user_id's Posts</th></tr><tr><th>ID</th><th>Content</th></tr></thead>";
	echo "<tbody style='text-align: center;'>";
	if ($result = $sql->query($postquery)) {
		while ($row = $result->fetch_assoc()) {
			echo "<tr><td>" . $row["post_id"] . "</td><td>" . $row["content"] . "</td></tr>";
		}

		$result->free();
	}
	echo "</tbody></table>";
	$sql->close();
?>
