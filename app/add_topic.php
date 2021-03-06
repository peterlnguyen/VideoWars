<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>VIDEO WARS</title>
<link rel="stylesheet" type="text/css" href="http://reset5.googlecode.com/hg/reset.min.css">
<link href="http://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="assets/css/screen.css">
<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">

</head>
<body>
<header>
  <h1><a href="/"><img src="assets/img/video_wars_logo.png"></a></h1>
  <h2><?php echo $topic['name']; ?></h2>
  <?php include('nav.php'); ?>
</header>

<div id="main" class="add_form">
<h1>Add topic</h1>
<?php

require_once("config.php");
require_once("db.php");


$categories = db_fetch("SELECT id, name FROM categories ORDER BY name");

?>

<form action="add_topic_action.php" method="get">
Keyword: <input type="text" name="keyword">
<br />
<br />

<a href="#" id="show_advanced">Advanced Options...</a>
<div id="advanced">
<br /><br />

Battle Name: <input type="text" name="name">
<br /><br />

Playlist or Channel URL: <input type="text" name="url">
<br /><br />

Category<br />
<select name="category">
<?php foreach ($categories as $category) {
    echo "<option value='" . $category["id"] . "'>" . $category["name"] . "</option>";
} ?>
</select>
<br /><br />

Visiblility<br />
<input type="radio" name="visibility" value="1" checked>Public<br >
<input type="radio" name="visibilty" value="2">Unlisted<br />
<input type="radio" name="visibilty" value="3">Private
<br /><br />

Allow Skips<br />
<input type="radio" name="skips" value="1" checked>Yes<br >
<input type="radio" name="skips" value="0">No
<br /><br />

Allow Additions<br />
<input type="radio" name="additions" value="1" checked>Yes<br >
<input type="radio" name="additions" value="0">No
<br /><br />

Allow Leaderboard<br />
<input type="radio" name="leaderboard" value="1" checked>Yes<br >
<input type="radio" name="leaderboard" value="0">No

</div>
<br /><br />
<input type="submit" value="Submit">
</form>
</div>
<footer>
  +
</footer>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script>
$(document).ready(function() {
  $('#show_advanced').bind('click', function() {
    $('#advanced').slideDown();
  });
});
</script>
</body>
</html>

