<?php

class AboutUs_Model extends Model {

	public function __construct() {
        parent::__construct();
	}
	
	public function getAboutUsText() {
       return $this->db->findById(TABLE_CONTENT,0);
	}
}