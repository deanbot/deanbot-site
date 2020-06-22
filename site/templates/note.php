<?php snippet('header') ?>
  <?php $topicPage = $page->topicPage(); ?>
  <main class="note">
    <div class="container">
      <article>

        <header class="page-header">
          <?php snippet('pageHeading'); ?>
          <div class="meta">
            <p>
              Updated <time><?= $page->modified('M j, Y') ?></time>
              <?php
              if ($topicPage) {
                $t = $topicPage->title();
                $u =$topicPage->url();
                printf( ' / Filed in '
                  . '<a href="%s" title="%s">%s</a>', $u, $t, $t );
              }
              ?>
            </p>
          </a>
        </header>

        <div class="article-content">

          <div class="content-wrapper">

            <section class="content">
              <?= $page->text()->kt() ?>
            </section>

            <?php if ($page->hasChildren()): ?>
            <section class="nav">
              <h3>Notes filed in <mark><?= $page->title(); ?></mark></h3>
              <?php
              $children = $page->children();
              foreach($children as $note) {
                printf(
                  '<a href="%s" title="%s">%s</a>',
                  $note->url(),
                  $note->title(),
                  $note->title()
                );
              }
              ?>
            </section>
            <?php endif; ?>

          </div>

          <?php if ($page->hasRelated()): ?>
          <aside class="related-notes">
            <div>
              <h3>Related Notes</h3>
              <?php
              $relatedNotes = $page->related()->toPages();
              foreach($relatedNotes as $note) {
                printf(
                  '<a href="%s" title="%s">%s</a>',
                  $note->url(),
                  $note->title(),
                  $note->title()
                );
              }
            ?>
            </div>
          </aside>
          <?php endif; ?>

        </div>

      </article>

      <hr/>

      <nav>
        <div>
          <a href="/wiki" title="Wiki">/ (Wiki Index)</a>
          <?php
          if ($topicPage) {
            printf(
            '<a href="%s" title="%s">.. (%s)</a>',
              $topicPage->url(),
              $topicPage->title(),
              $topicPage->title()
            );
          }
          ?>
        </div>

        <?php if ($topicPage):
          $siblings = $page->siblings();
          if ($siblings->count() > 0):
        ?>
        <div>
          <?php
          $activeClass = ' class="active"';
          foreach($siblings as $note) {
            $isActive = $note->uri() == $page->uri();
            printf(
              '<a href="%s" title="%s"%s>%s</a>',
              $note->url(),
              $note->title(),
              $isActive ? $activeClass : '',
              $note->title()
            );
          }
          ?>
        </div>
        <?php endif; endif; ?>
      </nav>

      <?php
        /*
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
      <?php endif; */?>
    </div>
  </main>

<?php snippet('footer'); ?>