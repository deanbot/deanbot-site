<?php snippet('header') ?>

  <main class="wiki">
    <div class="container">
      <div class="header-wrapper">
        <header class="page-header">
          <?php snippet('pageHeading'); ?>
        </header>
      </div>

      <div class="intro">
        <?= $page->text()->kt() ?>
      </div>

      <?php if ($notes): ?>
      <div class="content-wrapper">
        <section class="nav">
          <h3>Notes and topics filed in <mark>Wiki</mark></h3>
          <nav>
            <?php
            foreach($notes as $note) {
              printf(
                '<a href="%s" title="%s">%s</a>',
                $note->url(),
                $note->title()->html(),
                $note->title()->html()
              );
            }
            ?>
          </nav>
        </section>
      </div>
      <?php endif; ?>

    </div>
  </main>

<?php snippet('footer'); ?>