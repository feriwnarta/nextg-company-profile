<?php

class ContactUs extends Controller
{
    public function index()
    {
        $this->view('templates/header_view');
        $this->view('contact_us/contact_us_view');
        $this->view('templates/button_scroll_top_view');
        $this->view('components/cta-component');
        $this->view('templates/footer_view');
    }

    public function offering() {


        if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['project_detail']) && isset($_FILES['attachment'])) {

            $attachment = $_FILES['attachment'];



        }

    }
}
