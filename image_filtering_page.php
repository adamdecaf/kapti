<?php
$conn = mysql_connect("127.0.0.1","software-class","5SaDznS56j3CaIUu");
$imgId = mysql_real_escape_string($_GET['image']);

if ($imgId == "") $imgId = "-1";

// Pull any classification already
$sql = "SELECT `species` FROM `software_engineering_drupal`.`image_filtering` WHERE `fid` = '{$imgId}' LIMIT 1;";
$species = mysql_fetch_assoc(mysql_query($sql));
$species = $species['species'];

global $user;

$sql = "SELECT * FROM `software_engineering_drupal`.`files` WHERE `fid` = '{$imgId}' and `uid` = '{$user->uid}';";
$result = mysql_query($sql);

$images = array();
while($row = mysql_fetch_assoc($result)) {
  $images[] = $row;
}

if (count($images) == 0) {
 echo "No Image Selected. Please visit your <a href='http://kapti.ashannon.us/?q=gallery'>gallery</a> to select an image.";
}

foreach ($images as $image) {
  echo "<img src='http://kapti.ashannon.us/" . $image['filepath'] . "'  height='300' width='300' />";
}
?>

<form action="/filter_image.php" method="GET">
  <input type="hidden" name="fid" value="<?php echo $imgId; ?>" />
  <select name="species">
    <option selected value="">Pick a species</option>
<?php
 $list = array("zea", "nea", "parocea", "paraene", "seriphia");
  foreach ($list as $item) {
    if ($species == $item) $selected = " selected";
    else $selected = "";
    echo "<option value='{$item}'{$selected}>{$item}</option>";
  }
?>
  </select>

  <input type="submit" value="Submit" />
</form>
