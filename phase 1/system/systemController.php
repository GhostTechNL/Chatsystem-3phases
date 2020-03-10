<?php
require '../database/database.php';
require '../database/databaseConfig.php';

$connection = database::getConnectionDatabase($db['server'], $db['user'], $db['password'], $db['database']);
//g
if (filter_input(INPUT_POST, "Login")) {
	//g
	if (!empty($_POST['name'])) {
		session_start();
		$username = database::escape($connection, $_POST['name']);

		$result = database::select($connection, "SELECT `userId`, `userName` FROM `users` WHERE userName = '". $username ."' LIMIT 1 ");
		//g
		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_row($result);
			$_SESSION['user'] = $username;
			$_SESSION['userId'] = $row[0];
		} else {
			database::query($connection, "INSERT INTO `users`(`userName`) VALUES ('". $username ."')");
			$_SESSION['user'] = $username;
			$_SESSION['userId'] = mysqli_insert_id();
		}
	}
	//gg
	header("location: ../");
}

if (filter_input(INPUT_POST, "sendChat")) {

	if (!empty($_POST['message'])) {
		session_start();
		$message = database::escape($connection, $_POST['message']);

	    database::query($connection, "INSERT INTO `message`(`userId`, `message`) VALUES ('". $_SESSION['userId'] ."','". $message ."')");
	}
	header("location: ../");
}

//GG
if(filter_input(INPUT_POST, "")){

}

header("location: ../");
?>

