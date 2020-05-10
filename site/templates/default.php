<?php snippet('header') ?>

<?php
  $breaths = array(
    "breathe",
    "atmen",
    "respirer",
  );
  $roll = rand( 0, count( $breaths ) - 1 );
  $breathe = $breaths[$roll];
?>
  <div>
    <h1><?php echo $breathe ?></h1>
  </div>

<?php snippet('footer'); ?>