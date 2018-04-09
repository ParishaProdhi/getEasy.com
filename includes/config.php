<?php
require_once('vendor/autoload.php');

$stripe = array(
  "secret_key"      => "sk_test_BuLmHHkDwJ7qXWKDg0Cshm0o",
  "publishable_key" => "pk_test_2fhC84Ic854sl6KWrlaKHG5P"
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);
?>