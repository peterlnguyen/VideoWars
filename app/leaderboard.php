<?php

require_once("config.php");
require_once("db.php");

// @TODO: TOP 10

$topic_id = $_GET["topic"];

$topic = db_fetch("SELECT name FROM topics WHERE id = ?", array($topic_id), True);

//$top_videos = db_fetch("SELECT * FROM videos WHERE topic_id = ? ORDER BY votes DESC LIMIT 25", array($topic_id));
$top_videos = db_fetch("SELECT COUNT(*) AS loses, videos.* FROM votes JOIN videos ON votes.lose_video_id = videos.id WHERE videos.topic_id = ? GROUP BY votes.lose_video_id;", array($topic_id));
//$losses = db_fetch("SELECT COUNT(*) AS losses FROM votes WHERE lose_video_id = ?", array($video_id), True);

?>
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
<div id="main" class="leaderboard">
  <h1>LEADER BOARD</h1>
  <ul>
<?php foreach ($top_videos as $key => $video) { ?>
    <li>
      <a href="stat_page.php?video_id=<?php echo $video['id']?>">
        <img src="http://i4.ytimg.com/vi/<?php echo $video['youtube_id'] ?>/mqdefault.jpg" alt="">
      </a>
    </li>
<?php } ?>
  <?php ?>
  </ul>
</div>


<footer>
  +
</footer>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
</body>
</html>

