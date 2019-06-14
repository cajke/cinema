<?php

class ImageUploader_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

//    public function getPath() {
//        return $this->db->findById(TABLE_CONTENT,0);
//    }

    public function uploadPath($table,$data,$id)
    {
        $this->db->update($table, $data," id=".$id);
    }

}