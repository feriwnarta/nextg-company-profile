<?php
require_once('../../PHPMailer/src/PHPMailer.php');
require_once('../../PHPMailer/src/Exception.php');
require_once('../../PHPMailer/src/SMTP.php');
require_once('PhpMailerService.php');


class ContactUsServices {
    private $name;
    private $email;
    private $subject;
    private $projectDetail;
    private $attachment;

    /**
     * @param $name
     * @param $email
     * @param $subject
     * @param $projectDetail
     */
    public function __construct($name, $email, $subject, $attachment)
    {
        $this->name = $name;
        $this->email = $email;
        $this->subject = $subject;
        $this->attachment = $attachment;
    }

    public function sendOffer() {
        return PhpMailerService::send($this->email, $this->subject, $this->projectDetail, $this->attachment);
    }




}