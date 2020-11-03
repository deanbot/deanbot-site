<!doctype html>
<html lang="en" class="no-js">
<head>
  <meta charset="utf-8">
  <?= $page->metaTags() ?>
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php /*
  <!-- <link rel="manifest" href="site.webmanifest"> -->
  <!-- <link rel="apple-touch-icon" href="icon.png"> -->
  <!-- Place favicon.ico in the root directory --> */ ?>
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
