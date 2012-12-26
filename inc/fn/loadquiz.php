<?php
	include_once('db.php');

	function quizList($fetch)
	{
		// the loop
		if($fetch->rowCount() == 0)
		{
			echo '<p class="grayinfo">Nothing Here.</p>';
		}
		else
		{
			while($row = $fetch->fetch())
			{
?>
				<li><span class="grey two columns"><?php echo $row['questions']; ?> Questions</span> <a href="/q/?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></li>
<?php
			}
		}
	}

	function loadQuizlist($userid, $DBH, $pub) // created by a user
	{
		global $fetch;
		if($pub == 1)
		{
			$fetch = $DBH->prepare("SELECT * FROM quizmeta WHERE user=? AND pub=1");
		}
		else
		{
			$fetch = $DBH->prepare("SELECT * FROM quizmeta WHERE user=? AND pub=0");
		}
		$fetch->execute(array($userid));
	}



	// loadUser:
	function loadUser($uid,$DBH)
	{
		$fetch = $DBH->prepare("SELECT * FROM users WHERE id=?");
		$fetch->execute(array($uid));
		global $userInfo;
		$userInfo = array();
		while($row = $fetch->fetch())
		{
			global $userName;
			$row['username'] = $userName;
		}

		// todo : populate it with other rows.
	}

	function checkUsername($username,$DBH)
	{
		$result = 0;
		$check = $DBH->prepare("SELECT id FROM users WHERE username=?");
		$check->execute(array($username));
		if($check->rowCount() == 1)
		{
			$result = 1;
		}
		return $result;
	}

	function checkEmail($email,$DBH)
	{
		$result = 0;
		$check = $DBH->prepare("SELECT id FROM users WHERE email=?");
		$check->execute(array($email));
		if($check->rowCount() == 1)
		{
			$result = 1;
		}
		return $result;
	}

	function loadFavs($user,$DBH)
	{
		global $fetchfav;
		$fav = $DBH->prepare("SELECT * FROM favs WHERE user=?");
		$fav->execute(array($user));
		if($fav->rowCount() == 0)
		{
			echo '<p class="grayinfo">Nothing Here.</p>';
		}
		else
		{
			while($favdata = $fav->fetch())
			{
				$favqid = $favdata['quizid'];
				$fetchfav = $DBH->prepare("SELECT * FROM quizmeta WHERE id=?");
				$fetchfav->execute(array($favqid));
			}
			quizList($fetchfav);
		}
	}

	function notify($user,$msg,$DBH)
	{
		//$createNotif = $DBH->prepare("INSERT INTO notifs ")
	}

?>