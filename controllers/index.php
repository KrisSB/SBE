<?php

class Index extends Controller {

    function __construct() {
        parent::__construct();
        $this->load_model('index');
    }
    public function index() {
        $page = filter_input(INPUT_GET,'p');
        if(empty($page) || !is_numeric($page)) {
            $page = 1;
        }
        $start = ($page - 1) * ANNOUNCE_AMOUNT;
        
        $this->view->pages = $this->model->paginate_amount();
        if($page > $this->view->pages  && $page > 1) {
            header('location:' . URL);
        }
        $this->view->announcements = $this->model->get_announcements($start);
        $this->view->render('index','index');
    }
}