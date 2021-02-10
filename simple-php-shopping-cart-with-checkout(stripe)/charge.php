<?php
    require_once 'config.php';
    if (isset($_POST['stripeToken'])) {
        \Stripe\Stripe::setVerifySslCerts(false);

        $token = $_POST["stripeToken"];
        $email = $_POST["stripeEmail"];

        //if we use this for testing in mutliple this shows error because token can never same for all customers
    
        // $customer = \Stripe\Customer::create([
        //     'email' => $email,
        //     'source' => $token,
        // ]);

        $charge = \Stripe\Charge::create([
        'amount' => 100,
        'currency' => 'usd',
        'description' => 'Programming with Faizan',
        'source' => $token,
    ]);
        echo '<h1>Successfully charged '.$charge["amount"]. 'pkr!</h1>';
    }
