<!doctype html>
<html lang="en" class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?= $page->metaTags() ?>

  <?php /*
  <!-- Android  -->
  <meta name="theme-color" content="<?= $GLOBALS['themeColor']; ?>">
  <meta name="mobile-web-app-capable" content="yes">

  <!-- iOS -->
  <meta name="apple-mobile-web-app-title" content="deanbot">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="default">

  <!-- Windows  -->
  <meta name="msapplication-navbutton-color" content="<?= $GLOBALS['themeColor']; ?>">
  <meta name="msapplication-TileColor" content="<?= $GLOBALS['themeColor']; ?>">
  <meta name="msapplication-TileImage" content="ms-icon-144x144.png">
  <meta name="msapplication-config" content="browserconfig.xml">


  <!-- Tap highlighting  -->
  <meta name="msapplication-tap-highlight" content="no">

  <!-- UC Mobile Browser  -->
  <meta name="full-screen" content="yes">
  <meta name="browsermode" content="application">

  <!-- Fitscreen  -->
  <meta name="viewport" content="uc-fitscreen=yes"/>

  <!-- Layout mode -->
  <meta name="layoutmode" content="fitscreen/standard">
  */ ?>

  <!-- Main Link Tags  -->

  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32.png">
  <link rel="icon" type="image/png" sizes="48x48" href="/favicon-48.png">

  <!-- iOS  -->
  <link href="/touch-icon-iphone.png" rel="apple-touch-icon">
  <link href="/touch-icon-ipad.png" rel="apple-touch-icon" sizes="76x76">
  <link href="/touch-icon-iphone-retina.png" rel="apple-touch-icon" sizes="120x120">
  <link href="/touch-icon-ipad-retina.png" rel="apple-touch-icon" sizes="152x152">

  <?php // OStartup Image ?>
  <link href="/touch-icon-start-up-320x480.png" rel="apple-touch-startup-image">

  <?php // OPinned Tab ?>
  <link href="path/to/icon.svg" rel="mask-icon" size="any" color="red">

  <?php // OAndroid ?>
  <link href="/icon-192.png" rel="icon" sizes="192x192">
  <link href="/icon-128.png" rel="icon" sizes="128x128">

  <?php // Others ?>
  <link href="favicon.icon" rel="shortcut icon" type="image/x-icon">

  <?php // UC Browser ?>
  <link href="/icon-52.png" rel="apple-touch-icon-precomposed" sizes="57x57">
  <link href="/icon-72.png" rel="apple-touch-icon" sizes="72x72">
  <link href="/site.webmanifest" rel="manifest">

<!--`
   _|__    ##############
  ((O O)  ## Hello 🌎! ##
   | --| ###############
  /  ===\-->
  <?php echo prodCSS('/assets/builds/main.css'); ?>
  <?php echo css('https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css'); ?>
  <?php /* <!-- <meta name="theme-color" content="#fafafa"> --> */ ?>
  <script type="text/javascript">
    // remove no-js from body
    document.addEventListener('DOMContentLoaded', function () {
      document.querySelector('html').classList.remove('no-js');
    });
  </script>
</head>
<body>
  <nav class="main-nav nav">
    <div class="bar"></div>
    <div class="container">
      <div class="brand">
        <?php
          $homeTitle = $site->homeLinkTitle() && !$site->homeLinkTitle()->isEmpty()
            ? $site->homeLinkTitle()->html()
            : $site->title();
        ?>
        <a class="logo" href="<?= $site->url() ?>" title="<?= $homeTitle ?>">
          <?php
            // Todo get from site settings $site->logoUrl()
            $logoImageSrc = '/assets/builds/images/logo.svg'
          ?>
          <img src="<?= $logoImageSrc; ?>" alt="Deanbot logo: developer of apps and automations" class="sm"/>
        </a>
      </div>

      <button class="menu-toggle"><i class="ri-menu-line"></i></button>

      <div class="menu-wrapper">
        <div class="links">
          <?php
          foreach ($site->children()->listed() as $item): ?>
          <div><?= $item->title()->link() ?></div>
          <?php endforeach; ?>
        </div>
        <div class="shadow"></div>
      </div>
    </div>
  </nav>
