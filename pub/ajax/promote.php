<?php
	/* Ajax load */
	include('db.php');
	$text = htmlentities($_GET['term']);
	$query = $DBH->prepare("SELECT username FROM users WHERE username LIKE ? ORDER BY username ASC");
	$query->execute(array("%$text%"));
	$json = '[';
	$first = true;
	while($row = $query->fetch())
	{
		if (!$first) { $json .=  ','; } else { $first = false; }
    	$json .= '{"value":"'.$row['username'].'"}';
	}
	$json .= ']';
	echo $json;
?>