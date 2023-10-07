<?php
$address = "info@liberationprayerministries.com";

$error = false;
$fields = array('name', 'email', 'message');

foreach ($fields as $field) {
    if (empty($_POST[$field]) || trim($_POST[$field]) == '') {
        $error = true;
    }
}

if (!$error) {
    $name = stripslashes($_POST['name']);
    $email = trim($_POST['email']);
    $message = stripslashes($_POST['message']);

    $e_subject = 'You\'ve been contacted by ' . $name . '.';

    // Configuration option.
    // You can change this if you feel that you need to.
    // Developers, you may wish to add more fields to the form, in which case you must be sure to add them here.

    $e_body = "You have been contacted by: $name\n";
    $e_reply = "E-mail: $email\n";
    $e_content = "Message:\r\n$message";

    $msg = wordwrap($e_body . $e_reply . $e_content, 70);

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-type: text/plain; charset=utf-8\r\n";
    $headers .= "Content-Transfer-Encoding: quoted-printable\r\n";

    if (mail($address, $e_subject, $msg, $headers)) {
        // Email has sent successfully, echo a success page.
        echo 'Success';
    } else {
        echo 'ERROR!';
    }
}
?>
