<?php
	session_start();
	include('fn/loggedin.php');

	$pageName = "Search";
	include('temp/header.php');
?>

<div class="det-head">
	<h2>Search</h2>
</div>

<div class="content">
	<form class="search">
		<input type="text" placeholder="Search Term">
		<input type="submit" class="btn btn-blue" value="SEARCH">
	</form>
</div>

<?php
	include('temp/footer.php');
?>