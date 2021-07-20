<?php

include('../../../config.php');
$call_config = new config(); 
$call_config->admin_sess_checker();
$sess_data_var=$call_config->adm_sess_data_bind();
                                               

require '../../../PHPMailer/src/Exception.php';
require '../../../PHPMailer/src/SMTP.php';
require '../../../PHPMailer/src/PHPMailer.php';


//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
//require 'vendor/autoload.php';

//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->SMTPSecure = 'tls';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = '587';                    //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'sashikali32@gmail.com';                     //SMTP username
    $mail->Password   = 'FXq2rGd7XeH2vdt';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    //$mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    $mail->setFrom('sashikali32@gmail.com', 'kali');
    //Recipients
    $sql="SELECT * FROM `tbl_students_master`";
    $i=0;
    $result = mysqli_query($call_config->con, $sql);
    foreach ($result as $row) {
    $mail->addAddress($row["username"]); 
    }    //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'New Election';
    $mail->Body    = 'There is a new election on the secret ballot! Please Check and do vote.';
    $mail->AltBody = 'There is a new election on the secret ballot! Please Check and do vote.';

    $mail->send();
    $call_config->msg("Success!!","Mail Sent!!","success","admin/elections/","");
} catch (Exception $e) {
    
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}