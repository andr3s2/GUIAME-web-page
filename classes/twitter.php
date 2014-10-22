<?php

include_once './classes/tw/twitteroauth/twitteroauth.php';

session_start();

class Twitter {

  private $connection;
  private $twitteruser = 'grupoGUIAME';

  function __construct() {
    $consumerkey = "A6txHsxayVO38NiQwcHVow";
    $consumersecret = "N2XIhyPQUvqYQodjSPrY1sZ8NCkKu8Fg0X7cWAucd4";
    $accesstoken = "2203825898-7GopMYd8fkTZdvCZXSAcouOO3SovhRESB362pL0";
    $accesstokensecret = "QgfE9Tkm5X0hToBFS4MUuUmBRn2Jkz51aOvt3kVGrQ62F";
    $this->connection = $this->getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
  }

  public function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
    $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
    return $connection;
  }

  public function get_tweets($n = 5) {
    $tweets = $this->connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name={$this->twitteruser}&count={$n}");
    //  return $tweets;

    $tws = array();

    foreach ($tweets as $tw) {
      $t = new stdClass;
      $t->created_at = $tw->created_at;
      $t->text = $this->linkify_twitter_status($tw->text);
      #$t->text = preg_replace("/@(w+)/", '<a href="http://www.twitter.com/$1" target="_blank">@$1</a>', $tw->text);
      #$t->text = preg_replace("/#(w+)/", '<a href="http://search.twitter.com/search?q=$1" target="_blank">#$1</a>', $tw->text);
      $t->profile_image_url = $tw->user->profile_image_url;

      $tws[] = $t;
    }
    return $tws;
  }

  private function linkify_twitter_status($status_text) {
    // linkify URLs
    $status_text = preg_replace(
            '/(https?:\/\/\S+)/', '<a href="\1" target="_blank">\1</a>', $status_text
    );

    // linkify twitter users
    $status_text = preg_replace(
            '/(^|\s)@(\w+)/', '\1@<a target="_blank" href="http://twitter.com/\2">\2</a>', $status_text
    );

    // linkify tags
    $status_text = preg_replace(
            '/(^|\s)#(\w+)/', '\1#<a target="_blank" href="http://search.twitter.com/search?q=%23\2">\2</a>', $status_text
    );

    return $status_text;
  }

}
