<?php

class Validation extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function minlength($data, $arg)
    {
        if (strlen($data) < $arg) {
            return "Lozinka mora da sadrži najmanje $arg karaktera";
        }
    }

    public function maxlength($data, $arg)
    {
        if (strlen($data) > $arg) {
            return "Your string can only be $arg long";
        }
    }

    public function digit($data)
    {
        if (ctype_digit($data) == false) {
            return "Your string must be a digit";
        }
    }

    public function isEmail($data)
    {
        if (!filter_var($data, FILTER_VALIDATE_EMAIL)) {
            return ("Nepravilan format, molimo Vas ponovite!");
        }
    }

    public function checkEmailUniqueness($data)
    {
        $sth = $this->db->prepare("SELECT * FROM users WHERE email = :email");
        try {
            $sth->bindValue(':email', $data);
            $sth->execute();
            return $sth->fetch();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }
    }

    public function checkUserEmail($data, $id)
    {
        $sth = $this->db->prepare("SELECT * FROM users WHERE email = :email  AND id != :id" );
        try {
            $sth->bindValue(':email', $data);
            $sth->bindValue(':id', $id);
            $sth->execute();
            return $sth->fetch();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }
    }

    public function __call($name, $arguments)
    {
        throw new Exception("$name does not exist inside of: " . __CLASS__);
    }

}