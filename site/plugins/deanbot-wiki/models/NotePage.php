<?php

// faux parenting with 'topic' field

class NotePage extends Page {
  public function children(): Pages {
    return page('wiki')->children()->filterBy('topic', $this->uri());
  }

  public function siblings($self = true) {
    $topicPage = $this->topicPage();
    if ($topicPage) {
      $siblings = $self
        ? $topicPage->children()->listed()
        : $topicPage->children()->listed()->not($this->uri());
    } else {
      $siblings = new Collection();
    }
    return $siblings;
  }

  public function hasChildren():bool {
    $isTopic = false;
    foreach(page('wiki')->children()->listed() as $note) {
      if ($note->topic() == $this->uri()) {
        $isTopic = true;
        break;
      }
    }
    return $isTopic;
  }

  public function topicPage() {
    $topic = $this->topic();
    return !$topic->isEmpty()
      ? page($topic)
      : null;
  }

  public function hasRelated():bool {
    return $this->related()->toPages()->count() > 0;
  }
}