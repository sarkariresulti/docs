

<?php 
/*================================== MAIL SMTP start================================= */
add_filter('wp_mail_smtp_custom_options','wp_mail_smtp_custom_options_func',30,1);
function wp_mail_smtp_custom_options_func( $phpmailer){
    // echo "<pre>";
    // print_r($phpmailer);

    $phpmailer->Mailer     = 'smtp';
    $phpmailer->Host       = 'smtp.gmail.com';
    $phpmailer->Port       = 587;
    $phpmailer->SMTPSecure = 'tls';
    $phpmailer->SMTPAuth   = true;
    $phpmailer->Username   = 'resultisarkari@gmail.com';
    $phpmailer->Password   = 'yourpassword';

    return $phpmailer;
}

// After sending Mail it will fired 
add_action('wp_mail_smtp_mailcatcher_smtp_send_after','wp_mail_smtp_mailcatcher_smtp_send_after_func',30,7);
function wp_mail_smtp_mailcatcher_smtp_send_after_func($is_sent, $to, $cc, $bcc, $subject, $body, $from){
    print_r($is_sent);
    print_r($to);
    print_r($cc);
    print_r($bcc);
    print_r($subject);
    print_r($body);
    print_r($from);
    return "";
}

/*================================== MAIL SMTP end  ================================= */

## Mail sanding message :
// --------------------------

ob_start();
    $to = 'chandramani163585@gmaill.com';
    $subject = 'The subject';
    $body = 'The email body content';
    $headers = array('Content-Type: text/html; charset=UTF-8');
    $result = wp_mail( $to, $subject, $body, $headers );
ob_clean();
    if($result){
        echo "mail sent";
    }else{
        echo "mail not sent";
    }

