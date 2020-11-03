  <footer class="footer container">
    <!-- <div class="anchor">
      <hr class="long"/>
    </div> -->

    <div class="anchor-brand">
      <a href="#"><img src="/assets/builds/images/frog.png" alt="Robot frog"/></a>
    </div>

    <div class="meta">
      <div>
        <?php
        $copyrightTitle = $site->primaryAuthor() && !$site->primaryAuthor()->isEmpty()
          ? $site->primaryAuthor()->toUser()->name()
          : $site->title()->html();
        ?>
        <a class="self" href="<?= $site->url() ?>"><?= $copyrightTitle ?></a> © <?= Date('Y') ?>
      </div>
      <span> - </span>
      <div>
        <a href="<?= $site->licenseUrl()->html() ?>" target="_blank"><?= $site->license()->html() ?></a>
      </div>
      <span> - </span>
      <div>
        <a href="<?= $site->sourceUrl()->html() ?>">Source Code</a>
      </div>
    </div>

    <nav class="links">
      <?php foreach ($site->social()->toStructure() as $social): ?>
      <a href="<?= $social->url() ?>" target="_blank" title="<?= $social->title() ?>"><i class="ri-<?= $social->icon() ?>"></i></a>
      <?php endforeach ?>
    </nav>

  </footer>

  <?php
    /*
    !-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
    <script>
      window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
      ga('create', 'UA-XXXXX-Y', 'auto'); ga('set','transport','beacon'); ga('send', 'pageview')
    </script>
    <script src="https://www.google-analytics.com/analytics.js" async></script>
    */
  ?>
  <?php echo liveJs('/assets/builds', 'main.js') ?>
</body>
</html>
