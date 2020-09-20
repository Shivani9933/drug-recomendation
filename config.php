<?php
	define('DB_HOST', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASSWORD', '');
	define('DB_DATABASE', 'dbdoctor');
	// define('FIREBASE_API_KEY', 'AAAAdVWr_is:APA91bG3EI1y_HWVmEm9iaJKpAKAIt0rJz5z7hN2_7VIY9GlO_FFUXADhTrzVOqiHknBk4sugYSc2Nrvqn62vLtUVptP6mq9QdO-0wDZVrBd7XX60SUX5nhVFHWVuCaRWaXdWNE0sql6');

	$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
	if(!$link) {
		die('Failed to connect to server: ' .  mysqli_connect_error());
	}


?>
