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
          <div class="meta">
            <p>Updated </span> <time><?= $page->modified('M j, Y') ?></time></p>
          </a>
        </header>

        <section class="content">
          <?= $page->text()->kt() ?>
        </section>
      </article>

      <?php
        $parent = $page->parent();
        $showParent = $showSiblings = false;
        if ($parent->template() == 'note') {
          if ($parent->isListed()) {
            $showParent = true;
          }

          // show siblings only if this isn't a top level note
          $siblings = $page->templateSiblings()->listed();
          if (count($siblings) > 0) {
            $showSiblings = true;
          }
        }
        $showChildren = $page->hasListedChildren();
      ?>
      <?php if ($showParent || $showSiblings || $showChildren): ?>
      <aside class="related-notes">
        <h3>Related Notes</h3>
        <nav>
          <?php if ($showParent): ?>
          <div>
            <a href="<?= $parent->url() ?>" title="<?= $parent->title()->html() ?>"><?= $parent->title()->html() ?></a>
          </div>
          <?php endif; ?>

          <?php if ($showSiblings): ?>
          <div>
            <?php foreach ($siblings as $sibling): ?>
            <a href="<?= $sibling->url() ?>" title="<?= $sibling->title()->html() ?>"><?= $sibling->title()->html() ?></a>
            <?php endforeach; ?>
          </div>
          <?php endif; ?>

          <?php if ($showChildren): ?>
          <div>
            <?php foreach ($page->children()->listed()->flip() as $child): ?>
            <a href="<?= $child->url() ?>" title="<?= $child->title()->html() ?>"><?= $child->title()->html() ?></a>
            <?php endforeach; ?>
          </div>
          <?php endif; ?>
        </nav>
      </aside>
      <?php else: ?>
      <nav><a href="/wiki">Index</a></nav>
      <?php endif; ?>
    </div>
  </main>

<?php snippet('footer'); ?>