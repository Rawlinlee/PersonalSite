<?php
function IsNullOrEmptyString($my_string){
    return (!isset($my_string) || trim($my_string)==='');
}

$reply_email = $_POST['email-id'];
$subject = $_POST['subject-id'];
$name = $_POST['name-id'];
$message = $_POST['message-id'];

if (IsNullOrEmptyString($reply_email) ||
    IsNullOrEmptyString($subject) ||
    IsNullOrEmptyString($name) ||
    IsNullOrEmptyString($message))  
{
    echo "<h3>Please fill in the required info. Emails are strictly for me to reply to your message.<h3>";
}
elseif (!filter_var($reply_email, FILTER_VALIDATE_EMAIL) ||  //Basic email validator
        !preg_match("/^[a-zA-z ]+$/", $name) || //Name is only alpha
        !preg_match("/[a-zA-Z]/i", $subject)) //Subject doesn't contain letters  
{
    echo "<h3>Some of the included information appears to be invalid. Please check and try again.<h3>";
}
else
{
    //Email information
    $admin_email = 'rolaqspu'; //Due to certain host restrictions, send to site admin email
    $feedback_email = 'noreply@rolandli.xyz'; //Work around for host's email-spam filter
    
    $message = 'Actual Email Address: ' . $reply_email . "\n" . 'Name: ' . "\n" . $name . $message;

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
?>