<?php
	$sql = new mysqli("mysql.eecs.ku.edu","ethangrantz","baiqu3Ae","ethangrantz");

	if ($sql->connect_errno) {
		printf("Connect failed: %s\n", $sql->connect_error);
		exit();
	}

	$userquery = "SELECT * FROM Users WHERE true";
	echo "<link rel='stylesheet' type='text/css' href='../../lab9/exercise3/style.css' />";
	echo "<title>View Users</title>";
	echo "<table><thead><tr><th>User ID</th></tr></thead><tbody style='text-align:center;'>";
	if ($result = $sql->query($userquery)) {
		while ($row = $result->fetch_assoc()) {
			echo "<tr><td>" . $row["user_id"] . "</td></tr>";
		}
		$result->free();
	}
	echo "</tbody></table>";
	echo "<a href='AdminHome.html'>Return to AdminHome</a>";
	$sql->close();
?>
