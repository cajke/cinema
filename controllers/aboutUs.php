<?php

class AboutUs extends Controller {

	function __construct() {
		parent::__construct();
		Session::init();
	}
	
	function index() {
	    $this->view->aboutUsText = $this->model->getAboutUsText();
        $this->view->title = 'O nama';
	    $this->view->render('aboutUs/index');
	}

    function interesting() {
        $this->view->title = 'Zanimljivosti';
        $this->view->render('aboutUs/interesting');
    }

}