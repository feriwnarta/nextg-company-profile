<?php

class About extends Controller {
    public function index() {
        $this->view('templates/header_view');
        $this->view('about/about_view');
        $this->view('components/client_component');
        $this->view('components/our_services_component');
        $this->view('components/our_client_component');
        $this->view('components/cta-component');
        $this->view('templates/footer_view');
    }
}