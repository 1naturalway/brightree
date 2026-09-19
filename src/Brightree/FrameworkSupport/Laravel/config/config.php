<?php

return array(
  /*
  |--------------------------------------------------------------------------
  | Your Brightree User Credentials
  |--------------------------------------------------------------------------
  */
  'username' => env('BRIGHTREE_USERNAME', ''),
  'password' => env('BRIGHTREE_PASSWORD', ''),

  /*
  |--------------------------------------------------------------------------
  | TLS / SSL stream context options
  |--------------------------------------------------------------------------
  |
  | Merged over Brightree\BrightreeClient::DEFAULT_SSL_OPTIONS. The defaults
  | leave peer verification off, which is how this client has always talked to
  | Brightree. Set BRIGHTREE_VERIFY_PEER=true to turn verification on.
  |
  */
  'ssl' => array(
    'verify_peer' => env('BRIGHTREE_VERIFY_PEER', false),
    'verify_peer_name' => env('BRIGHTREE_VERIFY_PEER_NAME', false),
    'allow_self_signed' => env('BRIGHTREE_ALLOW_SELF_SIGNED', true),
  ),
);
