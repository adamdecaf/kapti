<?php
error_reporting(E_ALL);
$conn = mysql_connect("127.0.0.1","software-class","<password>");

global $user;

$sql = "SELECT * FROM `software_engineering_drupal`.`files`;";
$result = mysql_query($sql);

$images = array();
while($row = mysql_fetch_assoc($result)) {
  $images[] = $row;
}

echo "<table><tr>";
$numImages = count($images);
for ($i = 0; $i < $numImages; $i++) {
   if (substr($images[$i]['filepath'],0,5) != "sites") continue;
   echo "<td><a href='http://drupal.ashannon.us/" . $images[$i]['filepath'] . "'><img src='http://drupal.ashannon.us/" . $images[$i]['filepath'] . "' height='325' width='325' /></a></td>";
   if ($i % 2 == 1) echo "</tr></tr>";
}

echo "</table>";
mysql_close($conn);
?>
