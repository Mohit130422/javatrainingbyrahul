<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/autoload.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data from AJAX request
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }

    // Create instance of PHPMailer
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER; 
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host       = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'varshneymohit35@gmail.com';                  // Your Gmail address
        $mail->Password   = 'nqcg eabm gtlm bsdp';              // Your Gmail app password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption
        $mail->Port       = 587;                                    // TCP port to connect to
        
        //Recipients
        $mail->setFrom($email, $name);                              // Sender's email and name
        $mail->addAddress('varshneymohit35@gmail.com');                   // Your Gmail as the recipient

        // Content
        $mail->isHTML(true);                                        // Set email format to HTML
        $mail->Subject = 'Website Lead';
        $mail->Body    = "Hi Rahul, You have received new request from you Website. Please take a look on that.<br><br>".
                         "<b>Name:</b> $name<br>".
                         "<b>Mobile:</b> $mobile<br>".
                         "<b>Email:</b> $email<br>".
                         "<b>Message:</b> $message";

        $mail->send();
        echo 'Message has been sent successfully';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
