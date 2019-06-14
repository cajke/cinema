<?php
/**
 * Created by PhpStorm.
 * User: dark021
 * Date: 5/22/2018
 * Time: 2:00 AM
 */

class Reservation extends Controller
{

    public function __construct() {
        parent::__construct();
        Session::init();
       /* if(Session::get('loggedIn') == false) {
            Session::destroy();
        }*/
    }


    public function index($id = null) {

        if(Session::get('role') == 'admin') {
            $this->view->reservationList = $this->model->reservationList();
            $this->view->title = 'Lista rezervacija';
            $this->view->render('reservation/index');
        } else if(Session::get('role') == 'user') {
            $this->view->reservationListForUser = $this->model->reservationListForUser($id);
            $this->view->title = 'Prikaz rezervacije';
            $this->view->render('reservation/reservationUser');
        }
    }

    public function seatListForProjection($id = null)
    {
        Session::checkRole('user');
        $this->view->seatListForProjection = $this->model->seatListForProjection($id);
        $this->view->title = 'Prikaz sale';
        $this->views->render('reservation/hall');
    }

    public function create($data)
    {
        Session::checkRole('user');
        list($row,$col,$seat,$projectionId) = explode(':',$data);
        $reservation['seat'] = $row . ':' . $col . ':' .$seat;
        $reservation['projectionId'] = $projectionId;
        $reservation['userId'] = Session::get('userId');
        $reservation['reservationDate'] = date('Y-m-d');
        $this->model->create($reservation);
        header('location: ' . URL . 'reservation/index/' . Session::get('userId'));
    }

    public function edit($id)
    {
        $this->view->reservation = $this->model->reservationSingleList($id);
        $this->view->render('reservation/edit');
    }


    public function delete($id) {

        Session::checkLoggedIn();
        $this->model->delete($id);
        if(Session::get('role') == 'admin') {
            header('location: ' . URL . 'reservation');
        } else {
            header('location: ' . URL . 'reservation/index/' . Session::get('userId'));
        }

    }

    public function deleteExpiredReservations()
    {
        Session::checkRole('admin');
        $this->model->deleteExpiredReservations();
        header('location: ' . URL . 'reservation');
    }


}