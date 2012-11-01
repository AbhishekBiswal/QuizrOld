<?php
	function loadUser($id,$DBH)
	{
		global $loadfName;
		$loadfName = "Anonymous";
		$loadUser = $DBH->prepare("SELECT fullname FROM users WHERE id=?");
		$loadUser->execute(array($id));
		while($row = $loadUser->fetch())
		{
			$loadfName = $row['fullname'];
		}
	}
?>