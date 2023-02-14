<?php

class Services extends Controller
{
    public function index()
    {
        $this->view('templates/header_view');
        $this->view('services/services_view');
        $this->view('components/cta-component');
        $this->view('templates/footer_view');
    }
}
