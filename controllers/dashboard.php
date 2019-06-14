<?php

class Dashboard extends Controller {

	function __construct() {
		parent::__construct();
		Session::init();
		$logged = Session::get('loggedIn');
		if ($logged == false) {
			Session::destroy();
			header('location: ../login');
			exit;
		}
	}
	
	function index() 
	{
        $this->view->aboutUsText = $this->model->getAboutUsText();
        if(Session::get('role') == "admin") {
            $this->view->title = 'Ažuriranje stranice';
            $this->view->render('dashboard/edit');
        } else {
            $this->view->title = 'O nama';
            $this->view->render('dashboard/index');
        }

	}
    public function editSave()
    {
        if ($_POST['action'] == 'Submit') {
            $postData['text'] = $_POST['text'];
            $this->model->editSave($postData);
            header('location: ' . URL . 'dashboard');
        }
        if ($_POST['action'] == 'Upload') {
            $img = new ImageUploader();
            $name = $img->uploadPath();

            if ($name) {
                $this->view->path = $name;
                $this->index();
            } else {
                $this->view->path = false;
                $this->index();
            }
        }
    }
    public function createNews()
    {
            $postData['text'] = $_POST['text'];
            $this->model->createNews($postData);
            header('location: ' . URL . 'dashboard');

    }
	
	function logout()
	{
		Session::destroy();
		header('location: ../login');
		exit;
	}
}