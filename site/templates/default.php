<?php snippet('header') ?>

  <main>
    <div class="container">
      <article>
        <header class="page-header">
          <?php snippet('pageHeading'); ?>
        </header>

        <section class="content">
          <?= $page->text()->kt() ?>
        </section>
      </article>
    </div>
  </main>

<?php snippet('footer'); ?>