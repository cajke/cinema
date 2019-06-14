<?php

class Reservation_Model extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    /*
     * Show all reservations
     */
    public function reservationList()
    {

        $sql = 'SELECT r.id AS reservationId,r.projectionId,r.userId,r.seat,r.reservationDate,u.*,p.*,f.* FROM ' . TABLE_RESERVATION . ' AS r INNER JOIN ' . TABLE_USERS . ' AS u ON r.userId = u.id INNER JOIN ' . TABLE_PROJECTION . ' AS p ON r.projectionId = p.id INNER JOIN ' . TABLE_FILM . ' AS f ON p.filmId = f.id';

        try
        {
            $sth = $this->db->prepare($sql);
            $sth->execute();
            $reservationList = $sth->fetchAll();
            //var_dump($reservationList); die();
            return $reservationList;

        } catch (PDOException $ex)
        {
            echo $ex->getMessage();
            return array();
        }

    }

    /*
     * Show all reservations for user
     */
    public function reservationListForUser($id)
    {

        $sql = 'SELECT r.id AS reservationId,r.projectionId,r.userId,r.seat,r.reservationDate,p.*,f.* FROM ' . TABLE_RESERVATION . ' AS r INNER JOIN ' . TABLE_USERS . ' AS u ON r.userId = u.id INNER JOIN ' . TABLE_PROJECTION . ' AS p ON r.projectionId = p.id INNER JOIN ' . TABLE_FILM . ' AS f ON p.filmId = f.id WHERE u.id = :id';

        try {

            $sth = $this->db->prepare($sql);
            $sth->bindValue(':id',$id);
            $sth->execute();
            return $sth->fetchAll();

        }catch(PDOException $ex)
        {
            echo $ex->getMessage();
            return array();
        }

    }

    /*
     * Find one reservation
     */
    public function reservationSingleList($id)
    {
        return $this->db->findById(TABLE_RESERVATION,$id);
    }

    /*
     * Insert reservation
     */
    public function create($data)
    {
        $this->db->insert(TABLE_RESERVATION,$data);
    }

    /*
     * Delete reservation
     */
    public function delete($id)
    {
        $this->db->delete(TABLE_RESERVATION,$id);
    }


    /*
     * Delete reservations for projection
     */
    public function deleteReservationsForProjection($projectionId)
    {

        $sql = 'DELETE r.* FROM ' . TABLE_RESERVATION . ' AS r WHERE r.projectionId = :proId';
       // var_dump($sql); die();
        try {

            $sth = $this->db->prepare($sql);
            $sth->bindValue(':proId',$projectionId);
            $sth->execute();

        }catch(PDOException $ex)
        {
            echo $ex->getMessage();
            return;
        }

    }

    /*
     * Delete reservations for film
     */
    public function  deleteReservationsForFilm($filmId)
    {
        $sql = 'DELETE r.* FROM ' . TABLE_RESERVATION . 'AS r INNER JOIN ' . TABLE_PROJECTION . ' AS p ON r.projectionId = p.id INNER JOIN ' . TABLE_FILM . ' AS f WHERE p.filmId = f.id WHERE f.id = :fid';

        try {

            $sth = $this->db->prepare($sql);
            $sth->bindValue(':fid',$filmId);
            $sth->execute();

        }catch(PDOException $ex)
        {
            echo $ex->getMessage();
            return;
        }

    }


    /*
     * Delete exipred reservations
     */
    public function deleteExpiredReservations()
    {

        $sql = "DELETE r.* FROM " . TABLE_RESERVATION . " AS r," . TABLE_PROJECTION  . " AS p WHERE r.projectionId = p.id AND
              p.date < :date1";

        try {

            $sth = $this->db->prepare($sql);
            $sth->bindValue(':date1',date('Y-m-d'));
            $sth->execute();

        }catch(PDOException $ex)
        {
            echo $ex->getMessage();
            return;
        }

    }

}