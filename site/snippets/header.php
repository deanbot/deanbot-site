<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php
    if ($page->isHomePage()) {
      printf(
        '%s | %s',
        $site->title()->html(),
        $site->description()->html()
      );
    } else {
      printf(
        '%s | %s',
        $page->title()->html(),
        $site->nickname()->html()
      );
    }
  ?></title>
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
  <div>
    <div class="bar"></div>
    <nav class="nav">
      <div class="container">
        <div class="brand">
          <a class="logo" href="<?= $site->url() ?>"><?= $site->title() ?></a>
        </div>

        <div class="links">
          <?php
          foreach ($site->children()->listed() as $item): ?>
          <?= $item->title()->link() ?>
          <?php endforeach ?>
        </div>
      </div>
    </nav>