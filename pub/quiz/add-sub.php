<?php
	/* add a question - backend */
	session_start();
	$curUser = $_SESSION['qp'];
	include('fn/loggedin.php');
	if($loggedin == 0)
	{
		header('Location:/');
		exit();
	}
	// form vars:
	$qid = $_POST['q-id']; // quiz id.
	$qQuestion = $_POST['question'];
	$qAnswer = $_POST['answer'];
	$hint = $_POST['q-hint'];
	$qDesc = $_POST['q-desc'];
	$qImage = $_POST['q-image'];
	//$qsecAnswer = $_POST['sec-answer'];

	if($hint == NULL)
	{
		$hasHint = 0;
	}
	else
	{
		$hasHint = 1;
		$hint = "";
	}

	if(!$qAnswer)
	{
			echo "Error! {Ans}";
			exit();
	}

	include_once('validate/do.php');
	$validator = new Validator();
	//$validator->isValid($qImage,'url');
	if($qImage != NULL)
	{
		if($validator->isValid($qImage,'url') == false)
		{
			echo "The Image URL is invalid";
			exit();
		}
	}
	
	include('db.php');
	$checkQid = $DBH->prepare("SELECT * FROM quizmeta WHERE id=?");
	$checkQid->execute(array($qid));
	if($checkQid->rowCount() == 0)
	{
		echo "Error! Please try again later.";
		exit();
	}
	while($row = $checkQid->fetch())
	{
		$lastQ = $row['questions'];
	}
	$seq = $lastQ+1;
	//echo $seq;

	$qAnswer = strtolower($qAnswer);
	$qAnswer = str_replace(" ","",$qAnswer);

	// everything's alright
	$insert = $DBH->prepare("INSERT INTO questions(qid,question,answer,hashint,hint,user,qdesc,dt,seq,image) VALUES(?,?,?,?,?,?,?,'NOW()',?,?)");
	$insert->execute(array($qid,$qQuestion,$qAnswer,$hasHint,$hint,$curUser,$qDesc,$seq,$qImage));
	//done {insert}

	$updateMeta = $DBH->prepare("UPDATE quizmeta SET questions=questions+1 WHERE id=?");
	$updateMeta->execute(array($qid));

	echo '<script>location.reload();</script>';

	// done. working rev. 06/8/12
?>