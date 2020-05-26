<?php snippet('header') ?>

  <main>
    <div class="container">
      <article>
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
      </article>
    </div>
  </main>

<?php snippet('footer'); ?>