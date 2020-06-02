<?php snippet('header') ?>

  <main>
    <div class="container">
      <article>
        <?php snippet('pageHeader'); ?>

        <section class="content">
          <?= $page->text()->kt() ?>
        </section>
      </article>
    </div>
  </main>

<?php snippet('footer'); ?>