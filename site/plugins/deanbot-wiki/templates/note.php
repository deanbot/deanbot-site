<?php snippet('header') ?>
  <?php $topicPage = $page->topicPage(); ?>

  <main id="content" class="note">
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
            <section class="child-nav">
              <h3>Notes filed in <mark><?= $page->title(); ?></mark></h3>
              <nav>
              <?php
              $children = $page->children();
              foreach($children as $note) {
                echo $note->getRelatedLink();
              }
              ?>
              </nav>
            </section>
            <?php endif; ?>

          </div>

          <?php if ($page->hasRelated()): ?>
          <div class="related-notes">
            <aside>
              <div>
                <h3>Related Notes</h3>
                <nav>
                <?php
                $relatedNotes = $page->related()->toPages();
                foreach($relatedNotes as $note) {
                  echo $note->getRelatedLink();
                }
                ?>
                </nav>
              </div>
            </aside>
          </div>
          <?php endif; ?>
        </div>
      </article>

      <hr/>

      <nav class="tree-nav">
        <div class="trunk">
          <a href="/wiki" title="Wiki" class="related-link"><i class="ri-node-tree"></i> <span>Wiki Index</span></a>
          <?php
          if ($topicPage) {
            echo $topicPage->getRelatedLink();
          }
          ?>
        </div>

        <?php
        // inclusive
        $maxCol = 6;
        $maxNotes = $maxCol * 3;
        if ($topicPage):
          $siblings = $page->siblings()->limit(19);
          if ($siblings->count() > 0):
        ?>
        <div class="branch<?php
          printf(" count-%s",
            (
              $siblings->count() <= $maxCol
                ? 'small'
                : (
                  $siblings->count() <= $maxCol * 2
                    ? 'medium'
                    : 'large'
                )
            )
          );
        ?>"">
          <div>
          <?php

          $numNotes = 0;
          $activeClass = 'active';
          foreach($siblings as $note) {
            $numNotes++;
            if ($numNotes >= $maxNotes) {
              if ($topicPage) { 
                echo $topicPage->getRelatedLink('', '...');
              } else {
                ?><a href="/wiki" title="Wiki" class="related-link"><i class="ri-node-tree"></i> <span>...</span></a><?php
              }
              break;
            } else {
              $isActive = $note->uri() == $page->uri();
              echo $note->getRelatedLink($isActive ? $activeClass : '');
            }
          }
          ?>
          </div>
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
