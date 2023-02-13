<?php

class Work extends Controller {
    public function index() {
        $this->view('templates/header_view');
        $this->view('work/work_view');
    }
}