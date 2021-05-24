<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// ------------------------------------------------------------------------
// PayPalPro library configuration
// ------------------------------------------------------------------------

// PayPal environment, Sandbox or Live
$config['sandbox'] = FALSE; // FALSE for live environment

// PayPal API credentials
// $config['paypal_api_username']	= 'sb-tijz92874009_api1.business.example.com';
// $config['paypal_api_password']	= '6G54W4AJEZ4XCKRL';
// $config['paypal_api_signature'] = 'Ap.JmfZX4B5O-YAi3EUdxSvPfcUWATcR85NABO1ISPqkF05Cx2r6OopH';

$config['paypal_api_username']	= 'brewerspurs_api1.aol.com';
$config['paypal_api_password']	= 'BJSQPJARFYQ9G8D4';
$config['paypal_api_signature'] = 'AfVA.gmOgo7zxfHAVt5M8xJEKwB.ADihk.jEabuPvDmzt22fcX-dohOo';



// PayPal business email
//$config['business'] = 'sb-tijz92874009@business.example.com'; // PayPal sandbox email
$config['business'] = 'brewerspurs@aol.com'; // PayPal live email

// What is the default currency?
$config['paypal_lib_currency_code'] = 'GBP';

// Where is the button located at?
$config['paypal_lib_button_path'] = 'assets/images/';

// If (and where) to log ipn response in a file
$config['paypal_lib_ipn_log'] = TRUE;
$config['paypal_lib_ipn_log_file'] = BASEPATH . 'logs/paypal_ipn.log';