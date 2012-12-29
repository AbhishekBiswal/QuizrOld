<?php
	session_start();
	include('fn/loggedin.php');
	$qid = $_GET['id'];
	if(!$qid)
	{
		include('404.php');
		exit();
	}

	include('db.php');
	$check = $DBH->prepare("SELECT * FROM quizmeta WHERE id=?");
	$check->execute(array($qid));

	if($check->rowCount() == 0)
	{
		include('404.php');
		exit();
	}

	//load vars:
	while($row = $check->fetch())
	{
		$qid = $row['id'];
		$qTitle = $row['title'];
		$qDesc = $row['qdesc'];
		$qUser = $row['user'];
		$qQuestions = $row['questions'];
		$qPlays = $row['plays'];
		$qPub = $row['pub'];
	}

	$thegod = 0;
	if($curUser == $qUser)
	{
		$thegod = 1;
	}

	include_once('fn/loaduser.php');
	$pageName = $qTitle . " - Quizr";
	include('temp/header.php');
?>

<div class="det-head">
	<h2><?php echo $qTitle; ?><span class="quizby">By <a href="/<?php echo loadUName($qUser,$DBH); ?>/"><?php echo loadUser($qUser,$DBH); ?></a></span></h2>
	<div class="info-boxes">
		<div class="info-box">
			<span class="one"><?php echo $qQuestions; ?></span>
			<span class="two">questions</span>
		</div>
		<div class="info-box">
			<span class="one"><?php echo $qPlays; ?></span>
			<span class="two">plays</span>
		</div>
	</div>
</div>


<div class="content u-page-box ten columns">

	<div>
		<p class="grayinfo"><?php echo $qDesc; ?></p>
	</div>
	<a href="/play/?id=<?php echo $qid; ?>" class="btn btn-blue">PLAY</a>
	<!-- <a id="fav-btn" data-id="" class="btn btn-grey">Favourite</a>
	<div class="hidden-quiz-area fav-btn-area"></div> -->


	<div class="quiz-lb">
		<!--quiz-leaderboard-->

		<?php
			$quizLB = $DBH->prepare("SELECT * FROM users WHERE id IN(SELECT user FROM played WHERE qid=? AND playedtill=? ORDER BY TIMESTAMPDIFF(SECOND,stopped,started) ASC) LIMIT 10");
			$quizLB->execute(array($qid,$qQuestions));
			if($quizLB->rowCount() == 0)
			{
				echo '<p class="grayinfo">Nothing Here.</p>';
			}
			else
			{
				echo '<table><tbody>';
				echo '<tr class="lb-header"><td width="100%" colspan="2">Leaderboard</td></tr>';
				while($lbrow = $quizLB->fetch())
				{
		?>
				<tr>
					<td width="30%"><center>
					<?php if($lbrow['oauthp'] == "facebook") { ?>
					<img src="http://graph.facebook.com/<?php echo $lbrow['fbusername']; ?>/picture">
					<?php } elseif($row['oauthp'] == "twitter") { ?>
					<img src="https://api.twitter.com/1/users/profile_image/<?php echo $lbrow['twusername']; ?>">
					<?php } ?>
					</center></td>
					<td width="70%"><a href="/<?php echo $lbrow['username']; ?>/"><?php echo $lbrow['fullname']; ?></a></td>
				</tr>
		<?php			
				}
				echo '</tbody></table>';
			}
		?>

	</div>


</div>

<div class="admin-tools columns five"><center>

		<?php

		if($thegod == 1)
		{
		?>
		<div class="u-page-header">Admin Tools:</div>
		<a class="btn btn-small" href="/quiz/add.php?id=<?php echo $qid; ?>">Add Questions</a><br>
		<a class="btn btn-small" href="/quiz/questions.php?id=<?php echo $qid; ?>">Edit Questions</a><br>
		<a class="btn btn-small btn-red" href="/quiz/delete.php?id=<?php echo $qid; ?>">DELETE</a><br> 

		<?php if($qPub == 0) { ?> <a class="btn btn-small btn-blue" href="/quiz/pub.php?id=<?php echo $qid; ?>">Publish</a> <?php } ?>

		<?php
		}

		?>

</center></div>

<?php
	include('temp/footer.php');
?>