<?php
	$sql = new mysqli("mysql.eecs.ku.edu","ethangrantz","baiqu3Ae","ethangrantz");

	if ($sql->connect_errno) {
		printf("Connect failed: %s\n", $sql->connect_error);
		exit();
	}

	if ($result = $sql->query("SELECT * FROM Posts WHERE true")) {
		while ($row = $result->fetch_assoc()) {
			$postid = $row["post_id"];
			$shoulddelete = $_POST["$postid"];
			if ($shoulddelete) {
				if ($sql->query("DELETE FROM Posts WHERE post_id='$postid'")) {
					echo "<p>Post $postid successfully deleted!</p>";
				} else {
					echo "<p>Error: error deleting post $postid.</p>";
				}
			}
		}
		$result->free();
	}
	echo "<a href='DeletePost.html'>Delete more?</a>";
	$sql->close();
?>
