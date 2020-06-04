<?php snippet('header') ?>

  <?php
    $blogUrl = page('blog')->url();
    $cat = $page->category();
  ?>
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
          <div class="meta">
            Posted
            <time datetime="<?= $page->date()->toDate('c') ?>" pubdate="pubdate"><?=
              $page->date()->toDate('M j, Y')
        ?></time><?php if (!$cat->isEmpty()): ?> / in <a href="<?= $blogUrl . '/' . urlencode($cat);?>"><?= $cat; ?></a><?php endif; ?>
          </div>
        </header>
        <?= $page->text()->kt() ?>
      </article>
    </div>
  </main>

<?php snippet('footer'); ?>