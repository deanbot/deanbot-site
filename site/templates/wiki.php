<?php snippet('header') ?>

  <main class="wiki-index">
    <div class="container">

      <div class="intro">
        <?= $page->text()->kt() ?>
      </div>

      <?php if ($page->hasListedChildren()): ?>
      <h2>Notes</h2>
      <nav>
        <?php foreach($page->children()->listed()->flip() as $note): ?>
        <a href="<?= $note->url() ?>"><?= $note->title()->html() ?></a>
        <?php endforeach ?>
      </nav>
      <?php endif; ?>

    </div>
  </main>

<?php snippet('footer'); ?>