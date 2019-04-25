<?php
	// starting session to retreive all the values stored in sessioin 
	session_start();
	// un setting all the values stored in session
	session_unset();
	// destroying session variable
	session_destroy();
	// redirects back to login page
	header("Location: index.php?logout=logged-out");
