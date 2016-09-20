<?php
  if (isset($_POST['email-id']) && isset($_POST['name-id']) && isset($_POST['message-id']))  
  {
      //Email information
      $admin_email = 'rolaqspu'; //Due to certain host restrictions, send to site admin email
      $feedback_email = 'noreply@rolandli.xyz'; //Work around for host's email-spam filter

      $reply_email = $_POST['email-id'];
      $subject = $_POST['subject-id'];
      $message = 'Actual Email Address: ' . $reply_email . "\n" . 'Name: ' . "\n" . $name . $_POST['message-id'];
      $name = $_POST['name-id'];
      $headers = 'From: ' . $feedback_email;

      //Send email
      $success = mail($admin_email, $subject, $message, $headers);

      if ($success)
      {
          echo "<h3>Email sent! Thanks for reaching out!<h3>";
      }
      else
      {
          echo "<h3>Submission failed. Please refresh and try again, or email directly to contact@rolandli.xyz.<h3>";
      }
  }

  else  
  { 
      echo "<h3>Please fill in the required info. Emails are strictly for me to reply to your message.<h3>";
  }
?>