<?php

class Blog extends Controller {

    function __construct() {
        parent::__construct();
        $this->load_model('blog');
        if(isset($_POST['post']) && $this->view->log == TRUE && $this->view->rank == 1) {
            $this->model->add_blog();
        }
        if(isset($_POST['post_comment']) && $this->view->log == TRUE) {
            $this->model->add_comment();
        }
    }
    public function index($b_id = FALSE) {
        $this->view->blog_data = $this->model->get_blogs($b_id);
        $this->view->render('blog','index');
    }
    public function delete_blog($b_id = FALSE) {
        if($b_id == FALSE) {
            header('location:' . URL);
        }
        if($this->view->log == TRUE) {
            $this->model->delete_blog($b_id);
            $this->view->blog_data = $this->model->get_blogs();
            $this->view->require_Page('blog/blog_posts');
        }
    }
    public function post($p_id = FALSE) {
        if($p_id == FALSE) {
            header('location:' . URL);
        }
        if($this->model->check_post($p_id) == TRUE) {
            $this->view->blog_data = $this->model->get_blogs($p_id);
            $this->view->comments = $this->model->get_comments($p_id);
            $this->view->p_id = $p_id;
            $this->view->render('blog','post');
        } else {
            header('location:' . URL);
        }
    }
}