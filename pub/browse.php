<?php
	include('fn/loggedin.php');
	// GET vars : cat and type.
	$categ = $_GET['cat'];
	$type = $_GET['t'];

	if(!$categ)
	{
		$categ = "all";
	}
	if(!$type)
	{
		$type = "top";
	}

	function browse($DBH,$categ,$type)
	{

		if($categ == "all")
		{
			if($type == "top")
			{
				$load = $DBH->prepare("SELECT * FROM quizmeta ORDER BY plays DESC LIMIT 10");
				$load->execute();
			}
			else
			{
				
			}
		}

	}

	include('temp/header.php');
?>



<?php
	include('temp/footer.php');
?>