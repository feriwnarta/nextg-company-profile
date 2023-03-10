<?php

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
    public function __construct($name, $email, $subject, $attachment, $projectDetail)
    {
        $this->name = $name;
        $this->email = $email;
        $this->subject = $subject;
        $this->attachment = $attachment;
        $this->projectDetail = $projectDetail;
    }

    public function sendOffer() {
        PhpMailerService::send($this->email, $this->name, $this->subject, $this->projectDetail, $this->attachment);
    }




}