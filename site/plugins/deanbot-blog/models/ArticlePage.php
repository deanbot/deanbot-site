<?php

class ArticlePage extends Page { 
    public function getRelatedLink() : string
    {
        $url = parent::url();
        $title = parent::title();
        return sprintf(
          '<a href="%s" title="%s" class="related-link">'
            . '<i class="ri-article-line"></i>'
            . '<span>%s</span>'
          . '</a>',
          $url,
          $title,
          $title
        );
    }
}