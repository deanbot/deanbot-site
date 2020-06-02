<header class="page-header">
  <h1><?php
    $title = $page->pageTitle()->html();
    if ($title == '') {
      $title = $page->title()->html();
    }
    echo $title;
  ?></h1>
</header>