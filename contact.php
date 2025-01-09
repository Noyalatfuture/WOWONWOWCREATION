<?php
  // Define the recipient email address
  $to = "wowonwowcreation@gmail.com";

  // Check if the form has been submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect the form data
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

    // Validate the form data
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
      echo "Please fill in all fields.";
      return;
    }

    // Create the email content
    $content = "Name: $name\nEmail: $email\nSubject: $subject\nMessage: $message";

    // Set the email headers
    $headers = "From: " . $email . "\r\n" .
               "Reply-To: " . $email . "\r\n" .
               "Content-Type: text/plain; charset=UTF-8\r\n";

    // Send the email
    if (mail($to, $subject, $content, $headers)) {
      echo "Your message has been sent. Thank you!";
    } else {
      echo "Error sending email. Please try again later.";
    }
  }
?>