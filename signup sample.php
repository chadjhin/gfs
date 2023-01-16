<?php
    $to = 'chandelcj@gmail.com';
    $subject = 'Test email';
    $message = 'This is a test email sent using the PHP mail function.';
    $headers = 'From: chandeljynecarabio@gmail.com' . "\r\n" .
        'Reply-To: chandeljynecarabio@gmail.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    mail($to, $subject, $message, $headers);
    echo 'Email sent successfully.';
?>