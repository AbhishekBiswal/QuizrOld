<?php

	function browseLoad($fetch)
	{
		while($data = $fetch->fetch())
		{
	?>

		<li>
			<div class="columns six">
			<h3><a href="/q/<?php echo $data['id']; ?>/"><?php echo $data['title']; ?></a></h3>
			<p class="description"><?php echo $data['qdesc']; ?></p>
			<div class="quiz-info">
				<span><a href="/q/<?php echo $data['id']; ?>">Permalink</a></span>
			</div>
			</div>
			<div class="columns three">
				<div class="br-info">
					<span class="number"><?php echo $data['plays']; ?></span>
					<span class="number-text">Plays</span>
				</div>
			</div>
		</li>

	<?php
		}
	}

	
	function browseCat($cat, $DBH)
	{
		if($cat == "") $cat="all";
		if($cat != "all")
		{
			$fetch = $DBH->prepare("SELECT * FROM quizmeta WHERE cat=?");
			$fetch->execute(array($cat));
		}
		else
		{
			$fetch = $DBH->prepare("SELECT * FROM quizmeta WHERE pub=1 ORDER BY plays DESC LIMIT 10");
			$fetch->execute();
		}
		browseLoad($fetch);

	}

?>