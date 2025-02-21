<?php

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
  // Get the form data
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  
  // Validate the form data
  $errors = [];
  if (empty($name)) {
    $errors[] = 'Name is required';
  }
  if (empty($email)) {
    $errors[] = 'Email is required';
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Invalid email address';
  }
  if (empty($message)) {
    $errors[] = 'Message is required';
  }
  
  // If there are errors, display them
  if (!empty($errors)) {
    header('HTTP/1.1 400 Bad Request');
    header('Content-Type: application/json; charset=UTF-8');
    echo json_encode($errors);
    exit;
  }
  
  // If there are no errors, send the email
  $to = 'support@rattlesnake7501.com';
  $subject = 'Saras cause petition for dirty dishes';
  $body = "Name: $name\n\nEmail: $email\n\nMessage:\n$message";
  $headers = "From: $name <$email>\r\n" .
             "Reply-To: $email\r\n" .
             "X-Mailer: PHP/" . phpversion();
  mail($to, $subject, $body, $headers);
  
  // Send a success response
  header('HTTP/1.1 200 OK');
  header('Content-Type: application/json; charset=UTF-8');
  echo json_encode(['Thank you, Petition successfully signed' => true]);
  exit;
}

?>
