<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Chat systeem</title>
	<link rel="stylesheet" type="text/css" href="css/chatstyle.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <header>
		<h2>Chatsystem 3 phases </h2>
		<nav>
			<?php if (isset($_SESSION['user'])) { ?>	
			<li><a href="logout.php">logout</a></li>
			<?php } ?>
		</nav>
	</header>
	<div class="block">
		<content>
			<?php 
			if (!isset($_SESSION['user'])) {
			 	require "view/loginView.php";
			}else {
				require "view/chatView.php";
			} 
			?>
		</content>
		<footer>
			<script type="text/javascript" src="js/scriptmap.js"></script>
		</footer>
	</div>
</body>
</html>