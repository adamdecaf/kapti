Click an image to filter and tag it.

<?php
$conn = mysql_connect("127.0.0.1","software-class","<password>");

global $user;

$sql = "SELECT * FROM `software_engineering_drupal`.`files` WHERE `uid` = '{$user->uid}';";
$result = mysql_query($sql);

$images = array();
while($row = mysql_fetch_assoc($result)) {
  $images[] = $row;
}

echo "<table><tr>";
$numImages = count($images);
for ($i = 0; $i < $numImages; $i++) {
   if (substr($images[$i]['filepath'],0,5) != "sites") continue;
   echo "<td><a href='http://kapti.ashannon.us/?q=node/15&image=" . $images[$i]['fid'] . "'><img src='http://kapti.ashannon.us/" . $images[$i]['filepath'] . "' height='325' width='325' /></a></td>";
   if ($i % 2 == 1) echo "</tr></tr>";
}

echo "</table>";
mysql_close($conn);
?>
