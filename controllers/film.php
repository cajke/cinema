<?php

class Film extends Controller
{

    public function __construct()
    {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');
        $role = Session::get('role');

        if($logged == false || $role != 'admin') {
            Session::destroy();
            header('location: ' . URL . 'login');
        }

    }

    public function index()
    {
        $this->view->filmList = $this->model->filmList();
        $this->view->title = 'Lista filmova';
        $this->view->render('film/index');
    }

    public function browseFilm()
    {
        if($_GET['genre'] == '0' and $_GET['rating'] == '0') header('location: ' .URL. 'film');
        $this->view->filmList = $this->model->browseFilmList($_GET);
        $this->index();
    }


    public function create()
    {
        $this->model->create($_POST);
        $id = $this->model->findIdByName($_POST['name'])['id'];
        $img = new ImageUploader();
        $name = $img->uploadPath(TABLE_FILM,$id);
        header('location: ' . URL . 'film');

    }

    public function edit($id)
    {
        $this->view->film = $this->model->filmSingleList($id);
        $this->view->title = 'Ažuriranje filma';
        $this->view->render('film/edit');
    }

    public function editSave($id)
    {
        $data = array();
        $data['id'] = $id;
        if (isset($_POST) && $_POST['action'] == 'Upload') {
            $img = new ImageUploader();
            $name = $img->uploadPath(TABLE_FILM,$id);
            if ($name) {
                $this->view->path = $name;
                 header('location: ' . URL . 'film/edit/'.$id);
            } else {
                $this->view->path = false;
                header('location: ' . URL . 'film/edit/'.$id);
            }
        }else {
            unset($_POST['action']);
            $postData = array_merge($data, $_POST);
            $this->model->editSave($postData);
            header('location: ' . URL . 'film');
        }
    }

    public function delete($id)
    {
        $this->model->delete($id);
        header('location: ' . URL . 'film');


    }

}