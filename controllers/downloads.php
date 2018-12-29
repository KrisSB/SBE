<?php

class Downloads extends Controller {

    function __construct() {
        parent::__construct();
    }
    public function index() {
        $this->view->render('downloads','index');
    }

}