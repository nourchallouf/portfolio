<?php

$db_host ='127.0.0.1';
$db_username = 'root';
$db_password = '';
$db_name = 'contact';

mysql_connect($db_host, $db_username ,$db_password) or die(mysql_error());
mysql_select_db($db_name);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
  
    // Perform any additional validation or processing here
  
    // Example: Display the submitted data
    echo "Name: " . $name . "<br>";
    echo "Email: " . $email . "<br>";
    echo "Subject: " . $subject . "<br>";
    echo "Message: " . $message . "<br>";
  
    // Example: Send an email notification
    $to = "challoufnour34@gmail.com";
    $headers = "From: " . $email;
    $email_subject = "New inquiry: " . $subject;
    $email_body = "You have received a new inquiry from " . $name . "\n\n";
    $email_body .= "Email: " . $email . "\n";
    $email_body .= "Message: " . $message;
    mail($to, $email_subject, $email_body, $headers);
  
    // Redirect the user after form submission
    header("Location: thank-you.html");
    exit();
  }


?>