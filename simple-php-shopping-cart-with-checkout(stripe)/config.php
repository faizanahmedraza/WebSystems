<?php
    require_once 'stripe-php-master/init.php';

    $stripe = [
        "SecretKey" => "sk_test_51HlxSnJRYDBy10erbTUFcsnPR5t6RP93gY8ZymQ3HPv6oPoEJ5ooplH9eCiTQqHP0LsIU8GzR6m09QLnjO5Vo5FF00G0ai6DAZ",
        "Publishablekey" => "pk_test_51HlxSnJRYDBy10erkLXcvSPe28MS4wvWz7Zaac8h84JqNJxmCYIc3noFvWpQhsO99xtgrUzlwkixU89Qn4WDZBQA00PWsOGre8",
    ];
    //We use namespace here to set Apikey/secret key
    \Stripe\Stripe::setApiKey($stripe['SecretKey']);
