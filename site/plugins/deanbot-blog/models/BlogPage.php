<?php

class BlogPage extends Page { 
    public function hasChildrenWithCategory($term) : bool
    {
        $pages = parent::children()->listed();
        return count( $pages->filterBy('category', $term) ) > 0;
    }

    public function hasChildrenWithTags($term) : bool
    {
        $pages = parent::children()->listed();
        return count( $pages->filterBy('tags', $term, ',') ) > 0;
    }

    public function getBlogCategoryDescription($categoryTitle) : string
    {
        $categoryObjects = parent::categories()->yaml();
        $categoryIndex = array_search($categoryTitle, array_column($categoryObjects, 'title'));
        $categoryDescription = $categoryObjects[$categoryIndex]['description'];
        return $categoryDescription ?? '';
    }

    public function getRelatedLink() 
    {
        $url = parent::url();
        $title = parent::title();
        return sprintf(
          '<a href="%s" title="%s" class="related-link%s">'
            . '<i class="ri-article-line"></i>'
            . '<span>%s</span>'
          . '</a>',
          $url,
          $title,
          $title
        );
    }
}