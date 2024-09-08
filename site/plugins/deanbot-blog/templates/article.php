<?php snippet('header') ?>

  <?php
    $blogUrl = page('blog')->url();
    $cat = $page->category();
  ?>
  <main id="content" class="article">
    <div class="container">
      <article>
        <header class="page-header">
          <h1><?= $page->title()->html(); ?></h1>
          <div class="meta">
            <?php snippet('authorImage'); ?>
            <p>
              Posted
              <time datetime="<?= $page->date()->toDate('c') ?>"><?=
              $page->date()->toDate('M j, Y')
        ?></time><?php if (!$cat->isEmpty()): ?> / in <a href="<?= $blogUrl . '/' . urlencode($cat);?>"><?= $cat; ?></a><?php endif; ?>
            </p>
          </div>
          <?php
          if ($page->tags() && !$page->tags()->isEmpty()):
          ?>
          <ul class="tags">
            <?php foreach($page->tags()->split() as $tag): ?>
            <li>
              <a href="<?= $blogUrl . '/' . urlencode($tag) ?>"><?= html($tag) ?></a>
            </li>
            <?php endforeach; ?>
          </ul>
          <?php endif; ?>
        </header>

        <hr/>

        <?php if (!$page->headline()->isEmpty()): ?>
        <?= $page->headline()->kt() ?>
        <?php endif; ?>

        <?php if (!$page->bannerImage()->isEmpty()): ?>
        <figure class="featured-image">
          <img src="<?= $page->bannerImage()->toFile()->url() ?>" />
          <?php if (!$page->imageAttribution()->isEmpty()): ?>
          <figcaption><?= $page->imageAttribution()->kirbytextinline(); ?></figcaption>
          <?php endif; ?>
        </figure>
        <?php endif; ?>

        <?= $page->text()->kt() ?>

        <hr/>

        <a name="footer"></a>
        <footer class="footer-meta">
          <?php
          $updatedDate = $page->updated() && !$page->updated()->isEmpty()
            ? $page->updated()
            : $page->date();
          ?>
          <p class="updated">Last updated <time datetime="<?= $updatedDate->toDate('c') ?>"><?= $updatedDate->toDate('M j, Y') ?></time></p>
        </footer>

      </article>

      <?php
      $related = $page->related()->toPages();
      if ($related->isNotEmpty()): ?>
        <div class="related-notes">
          <aside>
            <div>
              <h3>Related Posts</h3>
              <nav>
              <?php
                foreach($related as $article) {
                  echo $article->getRelatedLink();
                }
              ?>
              </nav>
            </div>
          </aside>
        </div>
      <?php endif; ?>

      <?php snippet('contactForm'); ?>
    </div>
  </main>

<?php snippet('footer'); ?>
