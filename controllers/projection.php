<?php

class Projection extends Controller
{

    public function __construct()
    {
        parent::__construct();
        Session::init();
    }



    public function index($filmId = null)
    {
        Session::checkRole('admin');
        $this->view->filmId =  $filmId != null ? $filmId : '';
        $this->view->projectionList = $this->model->projectionList();
        $this->view->title = 'Lista projekcija';
        $this->view->render('projection/index');

    }


    public function repertoire($date) {

        $this->view->filmListOnRepertoireByDate = $this->model->getFilmsOnRepertoireByDate($date);
        $this->view->date = $date;
        $this->view->title = 'Repertoar';
        $this->view->render('projection/repertoire');
    }


    public function edit($id)
    {

        Session::checkRole('admin');
        //$this->view->filmId = $id;
        $this->view->projection = $this->model->projectionSingleList($id);
        $this->view->title = 'Ažuriranje projekcije';
        $this->view->render('projection/edit');

    }


    public function findProjectionAndReservations($id)
    {
        Session::checkRole('user');
        $this->view->projection = $this->model->projectionSingleList($id);
        $this->view->reservationListForProjection = $this->model->reservationListForProjection($id);
        $this->view->title = 'Sala projekcija';
        $this->view->render('projection/hall');

    }

    public function create()
    {
        Session::checkRole('admin');
        $_POST['date'] = date('Y-m-d',strtotime($_POST['date']));
        $this->model->insert($_POST);
        header('location: ' . URL . 'projection');
    }

    public function editSave($id)
    {
        Session::checkRole('admin');
        $data = array();
        $data['id'] = $id;
        $postData = array_merge($data, $_POST);
        $this->model->editSave($postData);
        header('location: ' . URL . 'projection');

    }


    public function editSaveProjectionOnRepertoire($data)
    {
        Session::checkRole('admin');
        list($id, $date) = explode(':', $data);
        header('location: ' . URL . 'projection/repertoire/' . $date);
    }

    public function delete($id)
    {
        Session::checkRole('admin');
        $this->model->delete($id);
        header('location: ' . URL . 'projection');
    }


    public function deleteProjectionOnRepertoire($date)
    {

        Session::checkRole('admin');
        list($id,$date) = explode(':',$date);
        $this->model->delete($id);
        header('location: ' . URL .'projection/repertoire/' . $date);
    }


    public function deleteExpiredProjections()
    {
        Session::checkRole('admin');
        $this->model->deleteExpiredProjections();
        header('location: ' . URL . 'projection');
    }

    public function details($data) {

        list($filmId,$date) = explode(':',$data);
        $this->view->film = $this->model->findRelatedFilm($filmId);
        $this->view->projectionsByFilmAndDate = $this->model->getProjectionsByFilmAndDate($filmId,$date);
        $this->view->title = $this->view->film['name'];
        $this->view->render('projection/details');
    }
}