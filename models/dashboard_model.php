<?php

class Dashboard_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function getAboutUsText() {
        return $this->db->findById(TABLE_CONTENT,0);
    }

    public function editSave($data)
    {
        $this->db->update(TABLE_CONTENT, $data, "id=0");
    }
    public function createNews($data)
    {

        $this->db->insert(TABLE_CONTENT, $data);
    }
    public function getNews()
    {
        return $this->db->findAll(TABLE_CONTENT);

    }

}