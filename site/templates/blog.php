<?php snippet('header') ?>

  <?php
    $blogUrl = page('blog')->url();
    $isCategoryArchive = $isTagArchive = false;
    if (isset($category)) {
      $isCategoryArchive = true;
    } else if (isset($tag)) {
      $isTagArchive = true;
    }
    $isEntryArchive = $isCategoryArchive || $isTagArchive;
  ?>
  <main class="blog">
    <div class="container">
      <div class="header-wrapper">
        <header class="page-header">
          <h1><?php
            if (!$isEntryArchive) {
              $title = $page->pageTitle()->html();
              if ($title == '') {
                $title = $page->title()->html();
              }
            } elseif ($isCategoryArchive) {
              $title = 'Posts filed in <em>' . $category . '</em>';
            } elseif ($isTagArchive) {
              $title = 'Posts tagged as <em>' . $tag . '</em>';
            }
            echo $title;
          ?></h1>
        </header>
        <?php if ($isEntryArchive): ?>
        <p><a href="<?= $blogUrl ?>">Return to the blog</a></p>
        <?php else: ?>
        <p>Subscribe via <a href="/feed.xml">RSS</a></p>
        <?php endif; ?>
      </div>

      <?php if (!$isEntryArchive && $page->text()->isNotEmpty()): ?>
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
            ?></time><?php if (!$cat->isEmpty()): ?> / <a href="<?= $blogUrl . '/' . urlencode($cat);?>"><?= $cat; ?></a><?php endif; ?>
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

        <?php if ($articles->isNotEmpty() && !$isEntryArchive) : ?>
        <div class="sub">

          <?/* <aside>
            <h4>Subscribe via <a href="/feed.xml">RSS</a></h4>
          </aside> */?>

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

          <?php /* <aside>
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
          </aside> */ ?>
        </div>
        <?php endif; ?>
      </div>

    </div>
  </main>

<?php snippet('footer'); ?>