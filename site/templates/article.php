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
          <?php /* if ($page->category() && !$page->category()->isEmpty()): ?>
          <p class="category">
            Filed in <a href="<?= $blogUrl . '/' . urlencode($page->category()) ?>"><?= html($page->category()) ?></a>
          </p>
          <?php endif; */ ?>
        </footer>
      </article>

      <?php if ($site->primaryAuthor() && !$site->primaryAuthor()->isEmpty()): ?>
      <aside class="article-contact">
        <?php if ($site->commentFormText() && !$site->commentFormText()->isEmpty()): ?>
        <p><?= $site->commentFormText() ?></p>
        <?php endif; ?>
        <?php if ($success): ?>
        <div class="alert success">
          <p><?= $success ?></p>
        </div>
        <?php else: ?>
          <?php if (isset($alert['error'])): ?>
          <div class="alert error">
            <p><?= $alert['error'] ?></p>
          </div>
          <?php endif; ?>
          <form method="post" action="<?= $page->url() ?>#footer">
            <div class="hoenig">
              <label for="email">Email <abbr title="required">*</abbr></label>
              <input type="email" id="email" name="email">
            </div>
            <div class="field">
              <textarea id="text" name="text" required placeholder="Tell me what you think..."><?= $data['text']?? '' ?></textarea>
              <?= isset($alert['text']) ? '<span class="alert error">' . html($alert['text']) . '</span>' : '' ?>
            </div>
            <input type="submit" name="submit" value="Send">
          </form>
        <?php endif; ?>
      </aside>
      <?php endif; ?>
    </div>
  </main>

<?php snippet('footer'); ?>