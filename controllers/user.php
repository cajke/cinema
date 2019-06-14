<?php

class User extends Controller {

	public function __construct() {
		parent::__construct();
		Session::init();
		$logged = Session::get('loggedIn');

		if ($logged == false ) {
			Session::destroy();
			header('location:'. URL .'login');
			exit;
		}
			
	}
	
	public function index() 
	{
        Session::init();
        $role = Session::get('role');
        $this->view->userList = $this->model->userList();
        if($role=='admin') {
            $this->view->title = 'Svi korisnici';
            $this->view->render('user/index');
        }else{
            Session::destroy();
            header('location:'. URL .'login');
        }
	}
	
	public function create() 
	{
        $this->form->post('email')
            ->val('checkEmailUniqueness');
        $mailExist = $this->form->submit();
        if ($mailExist && count($mailExist)) {
            $message['email'] = 'This mail is already in use!';
            $this->view->msg = $message;
        }
        if (isset($message) && !empty($message)) {
            $this->index();
        } else {
            $_POST['password'] = md5($_POST['password']);
            $this->model->create($_POST);
            header('location: ' . URL . 'user');
        }
	}
	
	public function edit($id)
	{
		$this->view->user = $this->model->userSingleList($id);
        $this->view->title = 'Ažuriranje korisnika';
		$this->view->render('user/edit');
	}

	public function profile(){
        Session::init();
        $role = Session::get('role');
        if($role=='admin') {
            Session::destroy();
            header('location:'. URL .'login');
        }
        $id = Session::get('userId');
        $this->view->user = $this->model->userSingleList($id);
        $this->view->title = 'Ažuriranje profila';
        $this->view->render('user/profile');
    }
	
	public function editSave($id=null)
    {

        if ($id == null) {
            Session::init();
            $id = Session::get('userId');
        }
        if (isset($_POST['action']) && $_POST['action'] == 'Upload') {
            $img = new ImageUploader();
            $name = $img->uploadPath(TABLE_USERS,$id);
            $role = Session::get('role');
            if ($role == 'user') {
                if ($name) {
                    $this->view->path = $name;
                    $this->profile();
                } else {
                    $this->view->path = false;
                    $this->profile();
                }
            }
            else{
                if ($name) {
                    $this->view->path = $name;
                    $this->edit($id);
                } else {
                    $this->view->path = false;
                    $this->edit($id);
                }
            }
        }
        else{
            $message = array();
            $email = $_POST['email'];
            if (!isset($_POST['firstName']) || $_POST['firstName'] == "") {
                $message['firstName'] = 'First name is required.';
                $this->view->msg = $message;
            }
            if (!isset($_POST['lastName']) || $_POST['lastName'] == "") {
                $message['lastName'] = 'Last name is required.';
                $this->view->msg = $message;
            }
            try {
                $this->form->post('email')
                    ->val('isEmail')
                    ->post('password')
                    ->val('minlength', 4);
            } catch (Exception $e) {
                echo $e->getMessage();
                return false;
            }
            $data = $this->form->submit();

            if(!$data && !$message){
                $this->form->post('email')->val('checkUserEmail', $id);
                $mailExist = $this->form->submit();

                if ($mailExist && count($mailExist)) {
                    $message['email'] = 'This mail is already in use!';
                    $this->view->msg = $message;
                }
                if ($message) {
                    $role = Session::get('role');
                    if($role == 'admin'){
                        $this->edit($id);
                    }
                    else{
                        $this->profile();
                    } 
                }
                else{
                    $data = array();
                    $data['id'] = $id;
                    $data['password'] = md5($_POST['password']);
                    unset($_POST['password']);
                    $postData = array_merge($data, $_POST);
                    $this->model->editSave($postData);

                    if (Session::get('role') == 'user') {
                        header('location: ' . URL . 'user/profile');
                    } 
                    else {
                        header('location: ' . URL . 'user');
                    }
                }
            }
            else{
                if(!empty($message) && !empty($data)){
                    $messages = array_merge($message, $data);

                }elseif (empty($message) && !empty($data) ){
                    $messages = $data;
                }
                elseif (!empty($message) && empty($data)) {
                    $messages = $message;
                }
                $this->view->msg = $messages;
                $role = Session::get('role');
                if($role == 'admin'){
                    $this->edit($id);
                }
                else{
                   $this->profile(); 
                }
            }
        }
    }
	
	public function delete($id)
	{
		$this->model->delete($id);
		header('location: ' . URL . 'user');
	}
}