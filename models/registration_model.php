<?php

class Registration_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /*
     * Insert user
     */
    public function create($data)
    {
        $this->db->insert(TABLE_USERS, $data);
    }

    public function confirmEmail($username, $code){
        $sql = 'SELECT * FROM ' . TABLE_USERS . ' WHERE email=:email ';
        try
        {
            $sth = $this->db->prepare($sql);
            $sth->bindValue(':email',$username);
            $sth->execute();
            return $sth->fetchAll();
        }catch(PDOException $ex)
        {
            echo $ex->getMessage();
            return array();
        }
    }

    public function updateEmailConfirmation($data,$id){
        $this->db->update(TABLE_USERS, $data, "id=".$id);
    }
}