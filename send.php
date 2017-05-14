<?php
//set your email here:
$yourEmail = 'likhelifi@laposte.net';
/*
 * CONTACT FORM
 */
//If the form is submitted
if(isset($_POST['submitted'])) {
    //Check to make sure that the name field is not empty
    if($_POST['contact_name'] === '') {
            $hasError = true;
            echo "ERREUR!";
    } else {
            $name = $_POST['contact_name'];
    }

    //Check to make sure sure that a valid email address is submitted
    if($_POST['contact_email'] === '')  {
            $hasError = true;
    } else if (!preg_match("/^[a-z0-9]+([_\\.-][a-z0-9]+)*@([a-z0-9]+([\.-][a-z0-9]+)*)+\\.[a-z]{2,}$/i", $_POST['contact_email'])) {
            $hasError = true;
    } else {
            $email = $_POST['contact_email'];
    }

    //Check to make sure comments were entered
    if($_POST['contact_textarea'] === '') {
            $hasError = true;
    } else {
            if(function_exists('stripslashes')) {
                    $comments = stripslashes($_POST['contact_textarea']);
            } else {
                    $comments = $_POST['contact_textarea'];
            }
    }

    //If there is no error, send the email
    if(!isset($hasError)) {

            $emailTo = $yourEmail;
            $subject = "Message From Your Website";
            $body = "Name: $name \n\nEmail: $email \n\nComments: $comments";
            $headers = 'From : my site <'.$emailTo.'>' . "\r\n" . 'answer to : ' . $email;

            mail($emailTo, $subject, $body, $headers);

            $emailSent = true;
    }

}
?>
