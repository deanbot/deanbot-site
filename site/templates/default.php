<?php snippet('header') ?>

  <main>
    <div class="container">
      <header class="page-header">
        <h1>
          <?php
            $title = $page->pageTitle()->html();
            if ($title == '') {
              $title = $page->title()->html();
            }
            echo $title;
          ?>
        </h1>
      </header>
      <?= $page->text()->kt() ?>
    </div>
  </main>

<?php snippet('footer'); ?>