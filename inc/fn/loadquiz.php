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
				<li><span class="grey two columns"><?php echo $row['questions']; ?> Questions</span> <a href="<?php echo "/q/".$row['id']; ?>"><?php echo $row['title']; ?></a></li>
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
		if(strlen($username) < 3)
		{
			echo '<span class="tred">Username not Valid.</span>';
			exit();
		}
		$check = $DBH->prepare("SELECT id FROM users WHERE username=?");
		$check->execute(array($username));
		if($check->rowCount() == 1)
		{
			echo '<span class="tred">Username not available.</span>';
			exit();
		}
		else
		{
			$result = 1;
		}
		return $result;
	}

?>