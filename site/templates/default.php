<!doctype html>
<html lang="">
<head>
  <meta charset="utf-8">
  <title>a spirited refactor</title>
  <?php /*<meta name="description" content=""> */?>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php /*
  <!-- <link rel="manifest" href="site.webmanifest"> -->
  <!-- <link rel="apple-touch-icon" href="icon.png"> -->
  <!-- Place favicon.ico in the root directory --> */ ?>

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">


  <?php /* <!-- <meta name="theme-color" content="#fafafa"> --> */ ?>
</head>
<body><?php
  $breaths = array(
    "breathe",
    "atmen",
    "respirer",
  );
  $roll = rand( 0, count( $breaths ) - 1 );
  $breathe = $breaths[$roll];
  ?><div>
    <h1><?php echo $breathe ?></h1>
  </div><?php
  /*
  !-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('set','transport','beacon'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async></script>
  */
  ?>
</body>
</html>