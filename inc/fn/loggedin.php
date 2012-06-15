<?php
	function loggedin()
	{
		global $loggedin;
		$loggedin = 0;
		if((isset($_SESSION['qu'])) && (isset($_SESSION['qp'])))
		{
			$loggedin = 1;
		}
	}
	loggedin();
?>