<?php snippet('header') ?>

  <?php
    $blogUrl = page('blog')->url();
    $isFilteredArchive = $isCategoryArchive || $isTagArchive;
  ?>
  <main id="content" class="blog">
    <div class="container">
      <div class="header-wrapper">
        <header class="page-header">
          <h1><?php
            if (!$isFilteredArchive) {
              $title = $page->pageTitle()->html();
              if ($title == '') {
                $title = $page->title()->html();
              }
            } elseif ($isCategoryArchive) {
              $title = 'Posts filed in <mark>' . $category . '</mark>';
            } elseif ($isTagArchive) {
              $title = 'Posts tagged as <mark>' . $tag . '</mark>';
            }
            echo $title;
          ?></h1>
        </header>
        <?php if ($isFilteredArchive): ?>
        <p><a href="<?= $blogUrl ?>">Return to the blog</a></p>
        <?php else: ?>
        <p>Subscribe via <a href="/feed.xml">RSS</a></p>
        <?php endif; ?>
      </div>

      <?php if (isset($intro)): ?>
      <div class="intro">
        <?= $intro ?>
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
                  $article->date()->toDate('M. j, Y')
            ?></time><?php if (!$cat->isEmpty()): ?> / <a href="<?= $blogUrl . '/' . urlencode($cat);?>"><?= $cat; ?></a><?php endif; ?>
              </div>
            </article>

            <?php endforeach; ?>

          <?php else: ?>
            <?php // don't show any message as we can use the kirbytext to explain why no results are shown and no results would be redundant ?>
          <?php endif; ?>
          </section>

          <?php
            $hasPrevPage = $pagination->hasPrevPage();
            $hasNextPage = $pagination->hasNextPage();
            if($hasPrevPage || $hasNextPage):
            ?>
            <nav class="pagination">
              <?php if($hasPrevPage): ?>
              <a href="<?= $pagination->prevPageUrl() ?>">Previous</a>
              <?php endif; ?>
              <?php if($hasNextPage): ?>
              <a href="<?= $pagination->nextPageUrl() ?>">Next</a>
              <?php endif; ?>
            </nav>
            <?php endif; ?>
        </div>

        <?php if ($articles->isNotEmpty() && !$isFilteredArchive) : ?>
        <div class="sub">
          <?/*
          <aside>
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
          </aside>
        */ ?>
          <aside>
            <h4>Tags</h4>
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
