<?php
	$stopped = "2012-12-29 22:13:15";
	$started = "2012-12-27 22:00:12";
	//echo $stopped-$started;
	$diff = strtotime('2009-10-05 18:11:10') - strtotime('2009-10-05 18:07:13');
	//echo $diff;
	// TIMESTAMPDIFF(MINUTE,'2003-02-01','2003-05-01 12:05:55')
?>

<div id='list'>
 
  <div id='response'></div>
  <ul>
    <?php
              include('connect.php');
              $query  = 'SELECT id, text FROM dragdrop ORDER BY listorder ASC';
              $result = mysql_query($query);
              while($row = mysql_fetch_array($result, MYSQL_ASSOC))
              {
 
              $id = stripslashes($row['id']);
              $text = stripslashes($row['text']);
 
              ?>
    <li id='arrayorder_<?php echo $id;?>'><?php echo $id;?> <?php echo $text;?>
      <div class='clear'></div>
    </li>
    <?php } ?>
  </ul>
</div>
