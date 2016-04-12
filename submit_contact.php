<?php

require __DIR__.'/vendor/autoload.php';

// Lets send emails to ourselves.
if(isset($_POST['email']) || isset($_POST['name']) and isset($_POST['phone']) and isset($_POST['message'])){
	$name = isset($_POST['name']) ? $_POST['name'] : "Name Empty";
	$phone = isset($_POST['phone']) ? isset($_POST['phone']) : "Phone Empty";
	$message = isset($_POST['message']) ? isset($_POST['message']) : "message empty";
	$email = isset($_POST['email']) ? isset($_POST['email']) : "email empty";


        $email_message = $name."\n".$phone."\n".$message."\n".$email;
	// using SendGrid's PHP Library
	// https://github.com/sendgrid/sendgrid-php
	$sendgrid = new SendGrid("API_KEY");
	$email    = new SendGrid\Email();

        $email->addTo('contact@twiinsen.com')
              ->setFrom('contact@twiinsen.com')
              ->setSubject('twiinsen contact')
              ->setText($email_message)
              ->setHtml("<strong>$email_message!</strong>");
	$sendgrid->send($email);
}
