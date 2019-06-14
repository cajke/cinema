<?php


class Film_Model extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    /*
     * Show all films
     */
    public function filmList()
    {
        return $this->db->findAll(TABLE_FILM);
    }

    /*
     * Find one film
     */
    public function filmSingleList($id)
    {
        return $this->db->findById(TABLE_FILM, $id);
    }
    /*
     * Find newFilmsSorted
     */
    public function newestFilmsilmsSorted()
    {
        return $this->db->newestFilmsilmsSorted(TABLE_FILM);
    }
    /*
     * Find newFilmsSorted
     */
    public function popularFilmsSorted()
    {
        return $this->db->popularFilmsSorted(TABLE_FILM);
    }

    /*
     * Find one film
     */
    public function findIdByName($name)
    {
        return $this->db->findIdByName(TABLE_FILM, $name);
    }

    /*
     * Show all film by some criterium
     */
    public function browseFilmList($data)
    {

        $genre = $data['genre'] != '0' ? $data['genre'] : false;
        $rating = $data['rating'] != '0' ? $data['rating'] : false;
        $filmListByCriterium = array();

        $films = $this->filmList();
        foreach ($films as $film) {
            if ($genre && $rating) {
                if (strpos($film['genre'], $genre) !== false && $film['rating'] >= $rating) {
                    $filmListByCriterium[] = $film;
                    continue;
                }
            } else if ($genre != false and $rating == false) {
                if (strpos($film['genre'], $genre) !== false) {
                    $filmListByCriterium[] = $film;
                    continue;
                }
            } else {
                if ($film['rating'] >= $rating) {
                    $filmListByCriterium[] = $film;
                }
            }
        }
        return $filmListByCriterium;
    }

    /*
     * Insert film
     */
    public function create($data)
    {
        $this->db->insert(TABLE_FILM, $data);
    }

    /*
     * Edit film
     */
    public function editSave($data)
    {
        $this->db->update(TABLE_FILM, $data, " id= " . $data['id']);
    }

    /*
     * Delete single film
     */


    public function delete($id)
    {
        require 'projection_model.php';
        $pro_model = new Projection_Model();
        $pro_model->deleteAllProjectionsForFilm($id);
        $this->db->delete(TABLE_FILM, $id);
    }

}