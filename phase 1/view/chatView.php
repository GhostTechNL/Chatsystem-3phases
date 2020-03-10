
	<div class="chatbox">
		<ul class="chatbox__ul">
			<?php 
			require 'database/database.php';
			require 'database/databaseConfig.php';

			$connection = database::getConnectionDatabase($db['server'], $db['user'], $db['password'], $db['database']);

			$result = database::select($connection, "SELECT `messageId`, users.userName as `userName`, `message` FROM `message`
                              LEFT JOIN users ON users.userId = message.userId");
			foreach ($result as $key => $Data) { 
			if ($Data['userName'] == $_SESSION['user']) { ?>
			 	<li class="chatbox__li chatbox__Me">
					<h3><?php echo $Data['userName']; ?></h3>
				    <p><?php echo $Data['message']; ?></p>
			    </li>
			<?php } else { ?>
				<li class="chatbox__li chatbox__Them">
					<h3><?php echo $Data['userName']; ?></h3>
					<p><?php echo $Data['message']; ?></p>
				</li>
			<?php }
			} ?>
		</ul>
	</div>
	<div class="chatform">
		<form action="system/systemController.php" autocomplete="false" method="POST">
			<input type="text" name="message">
			<input type="submit" name="sendChat" value="Send">
		</form>
	</div>
