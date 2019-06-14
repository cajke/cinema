<?php


require 'reservation_model.php';
class Projection_Model extends Model
{

    public function __construct()
    {
        parent::__construct();
    }


    /*
     * Show all projections
     */
    public function projectionList()
    {

        $sql = 'SELECT f.id,f.name,f.year,f.director,f.genre,f.durationTime,f.description,f.rating,p.id,p.filmId,p.date,p.start,p.end,
                p.hall,p.price FROM ' . TABLE_FILM . ' AS f INNER JOIN ' . TABLE_PROJECTION . ' AS p ON f.id = p.filmId';

        try {

            $sth = $this->db->prepare($sql);
            $sth->execute();
            $projectionList = $sth->fetchAll();
            return $projectionList;

        }catch(PDOException $ex)
        {
            echo $ex->getMessage();
            return array();
        }

    }

    /*
     * Show all projections by date
     */
    public function projectionListByDate($date)
    {

        $sql = 'SELECT f.id,f.name,f.year,f.director,f.genre,f.durationTime,f.description,f.rating,p.id,p.filmId,p.date,p.start,p.end,
                p.hall,p.price FROM ' . TABLE_FILM . ' AS f INNER JOIN ' . TABLE_PROJECTION . ' AS p ON f.id = p.filmId WHERE p.date= :date1';

        try {

            $sth = $this->db->prepare($sql);
            $sth->bindValue(':date1',$date);
            $sth->execute();
            $projectionListByDate = $sth->fetchAll();
            return $projectionListByDate;

        }catch(PDOException $ex)
        {
            echo $ex->getMessage();
            return array();
        }

    }

    /*
     * Show all reservations for projection
     */
    public function reservationListForProjection($id)
    {
        $sql = 'SELECT r.* FROM ' . TABLE_RESERVATION . ' AS r WHERE r.projectionId = :pid';

        try {

            $sth = $this->db->prepare($sql);
            $sth->bindValue(':pid',$id);
            $sth->execute();
            $projectionList = $sth->fetchAll();
            return $projectionList;

        }catch(PDOException $ex)
        {
            echo $ex->getMessage();
            return array();
        }
    }

    /*
     * Find one projection
     */
    public function projectionSingleList($id)
    {
        return $this->db->findById(TABLE_PROJECTION,$id);
    }

    /*
     * Insert projection
     */
    public function insert($data)
    {
        $this->db->insert(TABLE_PROJECTION,$data);
    }


    /*
     * Update projection
     */
    public function editSave($data)
    {
        $this->db->update(TABLE_PROJECTION,$data," id= " . $data['id']);
    }

    /*
     * Delete single projection
     */
    public function delete($id)
    {
        $res_model = new Reservation_Model();
        $res_model->deleteReservationsForProjection($id);
        $this->db->delete(TABLE_PROJECTION,$id);
    }


    /*
     * Delete expired projections
     */
    public function deleteExpiredProjections()
    {

       $res_model = new Reservation_Model();
       $res_model->deleteExpiredReservations();

       $sql = " DELETE p.* FROM " . TABLE_PROJECTION . " AS p WHERE p.date < :date1";

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

    /*
     * Delete all projection for film
     */
    public function deleteAllProjectionsForFilm($filmId)
    {

        $res_model = new Reservation_Model();
        $res_model->deleteReservationsForFilm($filmId);

        $sql = 'DELETE p.* FROM ' . TABLE_PROJECTION . ' AS p WHERE p.filmId = :fid';

        try
        {
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
     * Get id for films which on repertoire by date
     */
    public function getFilmsOnRepertoireByDate($date)
    {
        $sql = 'SELECT DISTINCT p.filmId FROM ' . TABLE_PROJECTION . ' AS p WHERE p.date = :date1';

        try
        {
            $sth = $this->db->prepare($sql);
            $sth->bindValue(':date1',$date);
            $sth->execute();
            return $sth->fetchAll();

        }catch(PDOException $ex)
        {
            $ex->getMessage();
            return array();
        }
    }

    /*
     * Get all projection order by start for film and date
     */
    public function getProjectionsByFilmAndDate($filmId,$date)
    {
        $sql = 'SELECT p.* FROM ' . TABLE_PROJECTION . ' AS p WHERE p.filmId = :filmId AND p.date = :date1 ORDER BY p.start';

        try
        {
            $sth = $this->db->prepare($sql);
            $sth->bindValue(':date1',$date);
            $sth->bindValue(':filmId',$filmId);
            $sth->execute();
            return $sth->fetchAll();

        }catch(PDOException $ex)
        {
            echo $ex->getMessage();
            return array();
        }

    }

    public function findRelatedFilm($id){
        return $this->db->findById(TABLE_FILM, $id);
    }

}