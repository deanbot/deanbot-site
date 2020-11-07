<?php
return [
  'pedroborges.meta-tags.default' => function ($page, $site, $kirby) {
    // defaults
    $htmlTitle = $page->isHomePage()
      ? sprintf('deanbot is %s', $site->title()->html())
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
    $description = !$page->description()->isEmpty()
      ? $page->description()
      : $site->description();
    $keywords = '';
    $og = [
      'type' => 'website',
      'site_name' => $siteTitle
    ];
    $twitter = [
      'card' => 'summary',
      'site' => '@' . $site->twitterHandle(),
    ];
    $image = !$page->metaImage()->isEmpty()
      ? $page->metaImage()->toFile()
      : '';

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
      $description = !$page->description()->isEmpty()
        ? $page->description()
        : $page->text()->excerpt(200, true, '');

      if (!$image) {
        $image = !$page->bannerImage()->isEmpty()
          ? $page->bannerImage()->toFile()
          : '';
      }

      $og = [
        'type' => 'article',
        'site_name' => $siteTitle,
        'namespace:article' => [
          'published_time' => $published,
          'modified_time' => $modified,
          'section' => $section,
          'tag' => $tags
        ]
      ];
    } else if ($template == 'blog') {
      // check whether using category or tag archive
      $isCategoryArchive = $isTagArchive = false;

      // get whether we're in cat/tag archive route
      $isArchive = $kirby->route()->attributes()['pattern'] == 'blog/(:any)';
      $arguments = $kirby->route()->arguments();

      if ($isArchive && count( $arguments ) > 0) {
        // whether using the blog/(:any) route
        $term = urldecode($arguments[0]);
        $isCategoryArchive = hasChildrenWithCategory($page, $term);
        $isTagArchive = hasChildrenWithCategory($page, $term);
        if ($isCategoryArchive) {
          $pageTitle = sprintf('%s Archives', $term);
          $htmlTitle = sprintf('%s | Category Archives', $term);

          // set description to category description or fallback
          $categoryDescription = getBlogCategoryDescription($page, $term);
          $description = $categoryDescription ?? sprintf('Blog posts filed in %s.', $term);
          $url = $kirby->request()->url()->toString();
        } else if ($isTagArchive) {
          $pageTitle = sprintf('%s Archives', $term);
          $htmlTitle = sprintf('%s | Tag Archives', $term);
          $desctiption = sprintf('Blog posts tagged as %s.', $term);
          $url = $kirby->request()->url()->toString();
        }
      }
    } elseif ($template == 'note') {
      $description = 'A wiki note.';
    }

    if (!$image) {
      $image = !$site->defaultImage()->isEmpty()
        ? $site->defaultImage()->toFile()
        : '';
    }

    if ($image !== '') {
      try {
        $og['image'] = $image->url();
        $twitter['namespace:image'] = [
          'image' => $image->thumb('twitter')->url(),
          'alt' => $image->alt()
        ];
      }
      catch (exception $e) {
      }
    }
    $og['url'] = $url;
    $og['title'] = $pageTitle;
    $twitter['title'] = $pageTitle;
    $og['description'] = $description;
    $twitter['description'] = $description;
    $meta = [
      'description' => $description
    ];
    if ($keywords != '') {
      $meta['keywords'] = $keywords;
    }
    if ($page->noIndex()) {
      $meta['robots'] = 'noindex';
    }

    return [
      'title' => $htmlTitle,
      'meta' => $meta,
      'link' => [
        'canonical' => $url
      ],
      'og' => $og,
      'twitter' => $twitter
    ];
  }
];
