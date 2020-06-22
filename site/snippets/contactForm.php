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