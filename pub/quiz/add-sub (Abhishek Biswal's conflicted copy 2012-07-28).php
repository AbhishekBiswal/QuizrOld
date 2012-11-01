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

	if($hinttext == NULL)
	{
		$hasHint = 1;
	}
	else
	{
		$hasHint = 0;
		$hint = "";
	}

	if(!$qAnswer)
	{
			echo "Error! {Ans}";
			exit();
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

	// everything's alright
	$insert = $DBH->prepare("INSERT INTO questions(question,hashint,hint,user,qdesc,dt,seq) VALUE(?,?,?,?,?,NOW(),?)");
	$insert->execute(array($qQuestion,$qAnswer,$hasHint,$hint,$curUser,$qDesc));
	//done {insert}

	$updateMeta = $DBH->prepare("UPDATE quizmeta SET questions=questions+1 WHERE id=?");
	$updateMeta->execute(array($qid));
?>