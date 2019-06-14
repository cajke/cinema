<?php

class Login_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function run()
    {
        $message = array();
        $sth = $this->db->prepare("SELECT id, role, confirmation_code, confirmed FROM users WHERE 
				email = :email AND password = :password");
        try {
            $sth->bindValue(':email', $_POST['email']);
            $sth->bindValue(':password', md5($_POST['password']));
            $sth->execute();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }

        $data = $sth->fetch();

        $count = $sth->rowCount();
        if($data['confirmation_code']!='0' && $data['confirmed'] != 1) {
            $message['incorrect'] = 'Please confirm your email address!';
            return $message;
        }
        if ($count > 0) {
            // login
            Session::init();
            Session::set('role', $data['role']);
            Session::set('loggedIn', true);
           // Cookie::set('userId',$data['id']);
            Session::set('userId',$data['id']);
           // var_dump($data['id']); die();
            $message['correct'] = 'Successfully logged in!';
            return $message;
        } else {
            $message['incorrect'] = 'Email i lozinka se nisu odgovarajući! <a href='. URL .'registration></br>Molimo Vas, registrujte novi nalog.</a>';
            return $message;
        }
    }

}