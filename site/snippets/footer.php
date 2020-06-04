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
    <?php echo js('assets/builds/bundle.js') ?>
    <footer class="footer container">
      <div class="meta">
        <div>
          <a class="self" href="<?= $site->url() ?>"><?= $site->author() ?></a> © <?= Date('Y') ?>
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
        <a href="<?= $social->url() ?>" target="_blank"><?= $social->platform() ?></a>
        <?php endforeach ?>
      </nav>
    </footer>
  </div>
</body>
</html>