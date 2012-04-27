<?php
/**
 * Kapti
 */

$conn = mysql_connect("127.0.0.1","software-class","5SaDznS56j3CaIUu");
$fid = mysql_real_escape_string($_GET['fid']);
$species = mysql_real_escape_String($_GET['species']);

// Delete any existing filterings
$sql = "DELETE FROM `software_engineering_drupal`.`image_filtering` WHERE `fid` = '{$fid}';";
mysql_query($sql);

$sql = "INSERT INTO `software_engineering_drupal`.`image_filtering` (`fid`,`species`) VALUES ";
$sql .= "('{$fid}','{$species}');";

mysql_query($sql);

header("Location: http://kapti.ashannon.us/?q=gallery");
exit();

