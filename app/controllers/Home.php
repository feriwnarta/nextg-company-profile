<?php

class Home extends Controller {
    public function index() {
        $this->view('templates/header_view');
        $this->view('home/home_view');
        $this->view('templates/button_scroll_top_view');
        $this->view('components/client_component');
        $this->view('components/our_services_component');
        $this->view('components/recent_work_title_component');
        $this->view('components/recent_work_component');
        $this->view('components/our_client_component');
        $this->view('components/cta-component');
        $this->view('templates/footer_view');
    }
}