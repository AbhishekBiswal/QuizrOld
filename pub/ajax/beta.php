<?php
	$eMail = $_POST['email'];
	$eMail = htmlspecialchars($eMail);
	if(!$eMail)
	{
		exit();
	}

	include('validate/do.php');
	$validator = new Validator();
	if($validator->isValid($eMail,'email') == false)
	{
		echo "Invalid Email Address.";
		exit();
	}

	include('db.php');
	$check = $DBH->prepare("SELECT * FROM beta WHERE email=?");
	$check->execute(array($eMail));
	if($check->rowCount() == 1)
	{
		echo "You have already registered!";
		exit();
	}

	$insert = $DBH->prepare("INSERT INTO beta(email) VALUES(?)");
	$insert->execute(array($eMail));

	echo '<script>$(".beta-email").html("<h2>Thank You! We\'ll contact you soon.</h2>");</script>';
	exit();
?>