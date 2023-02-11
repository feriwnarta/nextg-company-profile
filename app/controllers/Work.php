<?php

class Work extends Controller {
    public function index() {
        $this->view('templates/header_view');
        $this->view('work/work_view');
        $this->view('components/recent_work_component');
        $this->view('components/our_client_component');
        $this->view('components/cta-component');
        $this->view('templates/footer_view');
    }
}