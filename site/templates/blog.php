<?php snippet('header') ?>

  <?php $blogUrl = page('blog')->url(); ?>
  <main class="blog">
    <div class="container">

      <header class="page-header">
        <h1><?php
          $isCategoryArchive = $isTagArchive = false;
          if (!isset($category) && !isset($tag)) {
            $title = $page->pageTitle()->html();
            if ($title == '') {
              $title = $page->title()->html();
            }
          } elseif (isset($category)) {
            $isCategoryArchive = true;
            $title = 'Posts filed in <em>' . $category . '</em>';
          } elseif (isset($tag)) {
            $isTagArchive = true;
            $title = 'Posts tagged as <em>' . $tag . '</em>';
          }
          echo $title;
        ?></h1>
      </header>

      <?php if (!$isCategoryArchive && !$isTagArchive && $page->text()->isNotEmpty()): ?>
      <div class="intro">
        <?= $page->text()->kt() ?>
      </div>
      <?php endif; ?>

      <div class="content-container">
        <div class="main">
          <section class="articles">
          <?php if ($articles->isNotEmpty()) : ?>

            <?php foreach($articles as $article): ?>

            <article>
              <?php
                $title = $article->title()->html();
                $url = $article->url();
                $cat = $article->category();
              ?>
              <h2>
                <a href="<?= $url ?>" title="<?= $title ?>"><?= $title ?></a>
              </h2>
              <div class="meta">
                <time datetime="<?= $article->date()->toDate('c') ?>" pubdate="pubdate"><?=
                  $article->date()->toDate('M j, Y')
                ?></time> / <a href="<?= $blogUrl . '/' . urlencode($cat);?>"><?= $cat; ?></a>
              </div>
            </article>

            <?php endforeach ?>

            <!-- pagination -->
            <nav class="pagination">
              <?php if($pagination->hasPrevPage()): ?>
              <a href="<?= $pagination->prevPageUrl() ?>">Previous</a>
              <?php endif ?>

              <?php if($pagination->hasNextPage()): ?>
              <a href="<?= $pagination->nextPageUrl() ?>">Next</a>
              <?php endif ?>
            </nav>

          <?php else: ?>
            <?php // don't show any message as we can use the kirbytext to explain why no results are shown and no results would be redundant ?>
          <?php endif; ?>
          </section>
        </div>

        <?php if ($articles->isNotEmpty()) : ?>
        <div class="sub">

          <aside>
            <h3>Subscribe via <a href="/feed.xml">RSS</a></h3>
          </aside>

          <?php /* <aside>
            <h3>Categories</h3>
            <ul class="categories">
              <?php foreach($categories as $category): ?>
              <li>
                <a href="<?= $blogUrl . '/' . urlencode($category) ?>">
                  <?= html($category) ?>
                </a>
              </li>
              <?php endforeach ?>
            </ul>
          </aside> */ ?>

          <aside>
            <h3>Tags</h3>
            <ul class="tags">
              <?php foreach($tags as $tag): ?>
              <li>
                <a href="<?= $blogUrl . '/' . urlencode($tag) ?>">
                  <?= html($tag) ?>
                </a>
              </li>
              <?php endforeach ?>
            </ul>
          </aside>
        </div>
        <?php endif; ?>
      </div>

    </div>
  </main>

<?php snippet('footer'); ?>