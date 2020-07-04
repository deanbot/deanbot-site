<?php
// feed.xml route
$rss = require 'routes-rss.php';

// blog single, category, or tag archive
$blog = require 'routes-blog.php';

return [
  $rss,
  $blog
];