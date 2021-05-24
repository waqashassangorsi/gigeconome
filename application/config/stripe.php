<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
|  Stripe API Configuration
| -------------------------------------------------------------------
|
| You will get the API keys from Developers panel of the Stripe account
| Login to Stripe account (https://dashboard.stripe.com/)
| and navigate to the Developers � API keys page
| Remember to switch to your live publishable and secret key in production!
|
|  stripe_api_key        	string   Your Stripe API Secret key.
|  stripe_publishable_key	string   Your Stripe API Publishable key.
|  stripe_currency   		string   Currency code.
*/

//Live
$config['stripe_api_key']         = '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'; 
 $config['stripe_publishable_key'] = 'pk_live_51H4sInCvFHJfj2hEfbqgxoiR3Jsj3HTmdPGoUCtOqzgEJ6GfsgYiFKP6b311GLQeQkD8ewrIdoV1BuKpQjoG4rfj00Du9hv6R1'; 
$config['stripe_currency']        = 'GBP';

//Sandbox
// $config['stripe_api_key']         = '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'; 
// $config['stripe_publishable_key'] = 'pk_live_51HjPRfINbI4TlZSXRymnAoZekYAKL0zFOv9F2ZFKPDv92KFa28zkjg3sBPKlnf3MF8LUZYdXhdJYKR26jFA2ZVtR00Z2yjBjMU'; 