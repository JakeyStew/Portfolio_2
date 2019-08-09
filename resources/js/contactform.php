<?php 
    /* Namespace alias. */
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    /* Include the Composer generated autoload.php file. */
    require ($_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php');

    if(isset($_POST['submit'])) {
        require  ($_SERVER['DOCUMENT_ROOT'].'/vendor/phpmailer/phpmailer/src/Exception.php');
        require  ($_SERVER['DOCUMENT_ROOT'].'/vendor/phpmailer/phpmailer/src/PHPMailer.php');
        require  ($_SERVER['DOCUMENT_ROOT'].'/vendor/phpmailer/phpmailer/src/SMTP.php');

        $mail = new PHPMailer(true);
        $mail->CharSet = 'UTF-8';
        
        try{
            //Recipients
            $mail->setFrom($_POST['email'], $_POST['name']);
            $mail->addAddress('jakestewart95@outlook.com', 'JS - Web Development');     // Add email of company here
            $mail->addReplyTo($_POST['email'], $_POST['name']);

            $mail->isHTML(true);
            $mail->Subject ='Visitor Subject: '.$_POST['subject'];
            $mail->Body = '<h3>Visitor: </h3>'.$_POST['name'].'<br><h3>Email: </h3>'.$_POST['email'].'<br><h3>Message: </h3>'.$_POST['message'];

            $mail->send();
            header("Location: https://jakestewart.uk/"); //Change to redirect
        }
        catch (Exception $e)
        {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
?>