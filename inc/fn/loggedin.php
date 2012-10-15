<?php
	function loggedin()
	{
		global $loggedin;
		global $curUser;
		$loggedin = 0;
		if((isset($_SESSION['qu'])) && (isset($_SESSION['qp'])))
		{
			$loggedin = 1;
			$curUser = $_SESSION['qp'];
		}
	}
	loggedin();
?>