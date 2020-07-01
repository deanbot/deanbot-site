<!doctype html>
<html lang="en" class="no-js">
<head>
  <meta charset="utf-8">
  <title><?php
    if ($page->isHomePage()) {
      echo $site->title()->html();
    } else {
      printf(
        '%s | %s',
        $page->title()->html(),
        $site->title()->html()
      );
    }
  ?></title>
  <?= $page->metaTags() ?>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php /*
  <!-- <link rel="manifest" href="site.webmanifest"> -->
  <!-- <link rel="apple-touch-icon" href="icon.png"> -->
  <!-- Place favicon.ico in the root directory --> */ ?>
<!--`
   _|__
  ((O O)
   | --|
  /  ===\-->
  <?php echo liveCSS('assets/builds/bundle.css'); ?>
  <?php echo css('https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css'); ?>
  <?php /* <!-- <meta name="theme-color" content="#fafafa"> --> */ ?>
</head>
<body>
  <div>
    <nav class="main-nav nav">
      <div class="bar"></div>
      <div class="container">
        <div class="brand">
          <?php
            $homeTitle = $site->homeLinkTitle() && !$site->homeLinkTitle()->isEmpty()
              ? $site->homeLinkTitle()->html()
              : $site->title();
          ?>
          <a class="logo" href="<?= $site->url() ?>"><span><?= $homeTitle ?></span></a>
        </div>

        <div class="links">
          <?php
          foreach ($site->children()->listed() as $item): ?>
          <?= $item->title()->link() ?>
          <?php endforeach ?>
        </div>
      </div>
    </nav>