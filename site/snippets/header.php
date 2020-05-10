<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php echo $site->title()->html() ?> | <?php echo $page->title()->html() ?></title>
  <?php /*<meta name="description" content=""> */?>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php /*
  <!-- <link rel="manifest" href="site.webmanifest"> -->
  <!-- <link rel="apple-touch-icon" href="icon.png"> -->
  <!-- Place favicon.ico in the root directory --> */ ?>

  <?php echo liveCSS('assets/builds/bundle.css'); ?>
  <?php /* <!-- <meta name="theme-color" content="#fafafa"> --> */ ?>
</head>
<body>