<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

function send_smtp_mailer($subject = '', $mailto = '', $mailcontent = '', $cc = '', $attachmentdata = array(), $reply_to = '')
{
    $CI = get_instance();


    try {
        $name = 'ADMIN';
        $host = 'smtp.gmail.com'; // Use Gmail's SMTP server
        $smtp_username = "asusmitha012@gmail.com"; // Use environment variable
        $password = "gcaqenkhhljxbtpr"; // Use environment variable
        $smtp_from_email = 'asusmitha012@gmail.com'; // Your email address

        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = $host;
        $mail->Port = 587;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Use TLS encryption
        $mail->SMTPAuth = true;
        $mail->Username = $smtp_username;
        $mail->Password = $password;
        $mail->setFrom($smtp_from_email, $name);

        // $mail->SMTPDebug = 2;
        // $mail->Debugoutput = 'html';

        if ($reply_to != '') {
            $mail->clearReplyTos();
            $mail->addReplyTo($reply_to);
        }

        $addresses = explode(',', $mailto);
        foreach ($addresses as $address) {
            $mail->addAddress(trim($address));
        }

        $cc_emails = explode(',', $cc);
        foreach ($cc_emails as $cc_email) {
            $mail->addCC(trim($cc_email));
        }

        $mail->Subject = $subject;
        $mail->msgHTML($mailcontent);
        $mail->AltBody = strip_tags($mailcontent); // Add plain text version

        if (!empty($attachmentdata)) {
            $filePath = FCPATH . $attachmentdata['filepath'] . $attachmentdata['filename'];
            $mail->addAttachment($filePath);
        }

        if ($mail->send()) {
            $connection = new AMQPStreamConnection('mq.bmark.in', 5672, 'admin', 'rabbitMQ');
            $channel = $connection->channel();
            $email_log_data = [
                'email' => $smtp_from_email,
                'action' => 'Email_notification',
                'module_name' => 'ADMIN -' . $name . ' : ' . $subject,
                'timestamp_server' => time(),
                'timestamp_date' => date('Y-m-d h:i:s'),
            ];

            foreach ($addresses as $address) {
                $email_log_array = [];
                $email_log_data['email_to'] = $address;
                $email_log_array[] = $email_log_data;
                $email_log = json_encode($email_log_array);
                $msg = new AMQPMessage($email_log);
                $channel->basic_publish($msg, '', 'saveLog');
            }

            foreach ($cc_emails as $cc_email) {
                $email_log_array = [];
                $email_log_data['email_to'] = $cc_email;
                $email_log_array[] = $email_log_data;
                $email_log = json_encode($email_log_array);
                $msg = new AMQPMessage($email_log);
                $channel->basic_publish($msg, '', 'saveLog');
            }
            return true;
        } else {
            return false;
        }
    } catch (Exception $e) {
        error_log('Mailer Error: ' . $e->getMessage());
        return false;
    }
}
