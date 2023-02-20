<?php

class ContactUs extends Controller
{
    public function index()
    {
        $this->view('templates/header_view');
        $this->view('contact_us/contact_us_view');
        $this->view('components/cta-component');
        $this->view('templates/footer_view');
    }
}
