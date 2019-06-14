<?php

class Login extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->title = 'Prijavi se';
        $this->view->render('login/index');
    }

    function run()
    {
        try {
            $this->form->post('email')
                ->val('isEmail');
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
        $data = $this->form->submit();
        if (!$data) {
            $data = $this->model->run();
            if (isset($data['correct']) && $data['correct']) {
                header('location: ' . URL . 'home');
            } else {
                $this->view->msg = $data;
                $this->index();
            }
        } else {
            $this->view->msg = $data;
            $this->index();
        }
    }
}