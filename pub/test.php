<?php
	include('validate/do.php');
	$oValidator = new Validator();

	$oValidator->isValid("http://sklueh.de", 'url');
	if($oValidator->isValid("http://sklueh.de", 'url'))
	{
		echo "hello";
	}
?>