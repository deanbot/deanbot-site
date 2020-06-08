<?php /* get gravatar with author avatar fallback */
if ($site->primaryAuthor() && !$site->primaryAuthor()->isEmpty()) {
  $author = $site->primaryAuthor()->toUser();
  $name = $author->name();
  $email = $author->email();
  $default = $author->avatar()
    ? $author->avatar()->url()
    : '';
  $size = 60;
  $grav_url = sprintf(
    'https://www.gravatar.com/avatar/%s?d=%s&s=%s',
    md5( strtolower( trim( $email ) ) ),
    urlencode( $default ),
    $size
  );
  printf(
    sprintf(
      '<a href="%s" title="%s" class="author-link">',
      page('About')->url(),
      $name
    )
    .'<img src="%s" alt="%s" class="avatar"/>'
    .'</a>',
    $grav_url,
    $name
  );
}