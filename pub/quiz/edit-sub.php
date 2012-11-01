<?php
	/*
	Question submit page.
	from: quiz/add.php to: add-sub.php
	By Abhishek Biswal.
	rev 0.1 25/6/12
	*/
	session_start();
	include('fn/loggedin.php');
	if($loggedin == 0)
	{
		echo "<script>window.location='/';</script>";
		exit();
	}
	$curUser = $_SESSION['qp'];
	//vars:
	$qid = $_POST['id'];
	if(!$qid)
	{
		echo "Error! Please try again later.";
		exit();
	}

	include('db.php');
	$checkid = $DBH->prepare("SELECT * FROM questions WHERE id=? AND user=?");
	$checkid->execute(array($qid,$curUser));
	if($checkid->rowCount() == 0)
	{
		echo "Error! Please try again later.";
		exit();
	}

	$qQuestion = $_POST['question'];
	if((!$qQuestion) || (strlen($qQuestion)>300))
	{
		echo "The Question entered is invalid";
		exit();
	}

	$qOption1 = $_POST['option1'];
	$qOption2 = $_POST['option2'];
	$qOption3 = $_POST['option3'];
	$qOption4 = $_POST['option4'];
	if((!$qOption1) || (!$qOption2))
	{
		echo "Option 1 and Option 2 are required.";
		exit();
	}

	$qAnswer = $_POST['answer'];
	if((!$qAnswer) || ($qAnswer == "none"))
	{
		echo "Please select an answer";
		exit();
	}

	/*$update = $DBH->prepare("INSERT INTO questions(qid,seq,question,option1,option2,option3,option4,answer,user,dt) VALUES(?,?,?,?,?,?,?,?,?,NOW())");*/
	$update = $DBH->prepare("UPDATE questions SET question=?, option1=?, option2=?, option3=?, option4=?, answer=? WHERE id=?");
	$update->execute(array($qQuestion,$qOption1,$qOption2,$qOption3,$qOption4,$qAnswer,$qid));
	echo "Question Updated Sucessfully";
	echo '<script>$("form input[type=text]").val() = "";</script>'; // todo : doesn't work :P

	// works. date: 26/6/12
	
?>