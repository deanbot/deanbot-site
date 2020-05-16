<?php snippet('header') ?>

  <main>
    <?php
      $breaths = array(
        "breathe",
        "atmen",
        "respirer",
      );
      $roll = rand( 0, count( $breaths ) - 1 );
      $breathe = $breaths[$roll];
    ?>
    <div class="container">
      <h1><?php echo $breathe ?></h1>
    </div>
  </main>

<?php snippet('footer'); ?>