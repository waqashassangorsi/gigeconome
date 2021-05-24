<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
|  Google API Configuration
| -------------------------------------------------------------------
| 
| To get API details you have to create a Google Project
| at Google API Console (https://console.developers.google.com)
| 
|  client_id         string   Your Google API Client ID.
|  client_secret     string   Your Google API Client secret.
|  redirect_uri      string   URL to redirect back to after login.
|  application_name  string   Your Google application name.
|  api_key           string   Developer key.
|  scopes            string   Specify scopes
*/
$config['googleplus']['client_id']        = '101651788979-6m9vh21p9oss1msmpkrjlrbnfqre4sc6.apps.googleusercontent.com';
$config['googleplus']['client_secret']    = 'MpbN9lgbsVOcOWQ1JQIRzU9x';
$config['googleplus']['redirect_uri']     = SURL.'Newlogin/google_response';
$config['googleplus']['application_name'] = 'Coviknow.com';
$config['googleplus']['api_key']          = 'AIzaSyBYOhDqjGFPPEaaTgqhpIoyAQVkMm15NfA';
$config['googleplus']['scopes']           = array();