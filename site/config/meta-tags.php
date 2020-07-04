<?php
return [
  'pedroborges.meta-tags.default' => function ($page, $site, $kirby) {
    // defaults
    $htmlTitle = $page->isHomePage()
      ? $site->title()->html()
      : sprintf(
        '%s | %s',
        $page->title()->html(),
        $site->title()->html()
      );
    $pageTitle = $page->isHomePage()
      ? $site->title()
      : $page->title();
    $siteTitle = $site->title();
    $url = $page->url();
    $description = $page->description() ?? $site->description();
    $og = [
      'title' => $pageTitle,
      'type' => 'website',
      'site_name' => $siteTitle,
      'url' => $url
    ];

    // update meta by template name
    $template = $page->template()->name();
    if ($template == 'article') {
      $section = $page->category();
      $tags = '';
      if (!$page->tags()->isEmpty()) {
        foreach($page->tags()->split() as $tag) {
          if (strlen($tags) > 0) {
            $tags .= ', ';
          }
          $tags .= $tag;
        }
      }
      $format = 'c';
      $published = $page->date()->toDate($format);
      $modified = !$page->updated()->isEmpty()
        ? $page->updated()->toDate($format)
        : $page->date()->toDate($format);
      $og = [
        'title' => $pageTitle,
        'type' => 'article',
        'site_name' => $siteTitle,
        'url' => $url,
        'namespace:article' => [
          'published_time' => $published,
          'modified_time' => $modified,
          'section' => $section,
          'tag' => $tags
        ]
      ];
    } else if ($template == 'blog') {
      // get arguments in uri
      $arguments = $kirby->route()->arguments();

      // check whether using category or tag archive
      $isCategoryArchive = $isTagArchive = false;

      if (count( $arguments ) > 0) {
        $term = urldecode($arguments[0]);

        // whether using the blog/(:any) route
        $isArchive = $kirby->route()->attributes()['pattern'] == 'blog/(:any)';
        $isCategoryArchive = $isArchive && hasChildrenWithCategory($page, $term);
        $isTagArchive = $isArchive && hasChildrenWithCategory($page, $term);
        if ($isCategoryArchive) {
          $pageTitle = sprintf('%s Archives', $term);
          $htmlTitle = sprintf('%s | Category Archives', $term);

          // set description to category description or fallback
          $categoryDescription = getBlogCategoryDescription($page, $term);
          $description = $categoryDescription ?? sprintf('Blog posts filed in %s.', $term);
        } else if ($isTagArchive) {
          $pageTitle = sprintf('%s Archives', $term);
          $htmlTitle = sprintf('%s | Tag Archives', $term);
          $desctiption = sprintf('Blog posts tagged as %s.', $term);
        }
      }
    } elseif ($template == 'note') {
      $description = sprintf('A wiki note concerning %s.', $pageTitle);
    }

    return [
      'title' => $htmlTitle,
      'meta' => [
        'description' => $description
      ],
      'link' => [
        'canonical' => $url
      ],
      'og' => $og
    ];
  }
];