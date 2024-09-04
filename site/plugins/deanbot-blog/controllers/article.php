<?php
return function($kirby, $page, $site) {
    $alert = null;

    if($kirby->request()->is('POST') && get('submit')) {

      // check the honeypot
      if(empty(get('email')) === false) {
        go($page->url());
        exit;
      }

      $data = [
        'text'  => get('text')
      ];

      $rules = [
        'text'  => ['required', 'min' => 3, 'max' => 3000],
      ];

      $messages = [
        'text'  => 'Please enter a text between 3 and 3000 characters'
      ];

      if($invalid = invalid($data, $rules, $messages)) {
        // some of the data is invalid
        $alert = $invalid;
      } else {
        try {
          $kirby->email([
            'template' => 'email',

            // todo get domain from kirby
            'from'     => 'form@deanbot.dev',
            'to'       => $site->primaryAuthor()->toUser()->email(),
            'subject'  => 'Someone sent you a blog comment',
            'data'     => [
              'pageTitle' => $page->title()->html(),
              'pageUrl' => $page->url(),
              'text'   => esc($data['text'])
            ]
          ]);
        } catch (Exception $error) {
          $alert['error'] = 'Sorry, the form could not be sent.' . $error;
        }

        // no exception occured, let's send a success message
        if (empty($alert) === true) {
          $success = 'Your message has been sent, thank you.';
          $data = [];
        }
      }
    }

    return [
      'alert'   => $alert,
      'data'    => $data ?? false,
      'success' => $success ?? false
    ];
};