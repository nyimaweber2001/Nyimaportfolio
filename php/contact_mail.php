<?php
//Getting values
$name = $_POST['name1'];
$email = $_POST['email1'];
$message = $_POST['message1'];
$subject = 'Paris Blog: ' . $name ; 
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    // To send HTML mail, the Content-type header must be set.
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $headers .= 'From:' . $email. "\r\n"; 
    $headers .= 'Cc:' . $email. "\r\n";
    $template = '<div style="padding:50px; color:white;">Hallo ' . $gender . ' ' . $name . ',<br/>'
    . '<br/>Ich bedanke mich für Ihre Kontaktaufnahme<br/><br/>'
    . 'Name:' . $name . '<br/>'
    . 'Email:' . $email . '<br/>'
    . 'Message:' . $message . '<br/><br/>'
    . 'Dies ist eine automatische Bestätigungs-Mail'
    . '<br/>'
    . 'Ich werde Sie sobald wie möglich kontaktieren.</div>';
    $sendmessage = "<div style=\"background-color:#7E7E7E; color:white;\">" . $template . "</div>";
    $sendmessage = wordwrap($sendmessage, 70);
    //Send E-mail
    mail("nyima.weber@bluewin.ch", $subject, $sendmessage, $headers);

    echo "Anfrage erhalten.";
}
else {
    echo "<span>* invalid email *</span>";
}
?>
