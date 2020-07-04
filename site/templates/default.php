<?php snippet('header') ?>

  <main id="content">
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