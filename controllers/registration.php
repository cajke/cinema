<?php

class Registration extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function register()
    {
        $userData = array();
        $message = array();
        if (!isset($_POST['firstName']) || $_POST['firstName'] == "") {
            $message['firstName'] = 'First name is required.';
            $this->view->msg = $message;
        }
        if (!isset($_POST['lastName']) || $_POST['lastName'] == "") {
            $message['lastName'] = 'Last name is required.';
            $this->view->msg = $message;
        }
        try {
            $this->form->post('email')
                ->val('isEmail')
                ->post('password')
                ->val('minlength', 4);
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
        $data = $this->form->submit();
        if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . Google_secret_key . '&response=' . $_POST['g-recaptcha-response']);
            $responseData = json_decode($verifyResponse);
            if (!$responseData->success) {
                $message['reCaptcha'] = "Robot verification failed, please try again.";
            }
        } else {
            $message['reCaptcha'] = "Please click on the reCAPTCHA box.";
        }
        if (!$data && !$message) {
            $this->form->post('email')
                ->val('checkEmailUniqueness');
            $mailExist = $this->form->submit();
            if ($mailExist && count($mailExist)) {
                $message['email'] = 'This mail is already in use!';
                $this->view->msg = $message;
            }
            if ($message) {
                $this->index();
            } else {
                $userData['role'] = 'user';
                $userData['password'] = md5($_POST['password']);
                $code = $this->generateRandomString(20);
                $userData['confirmation_code'] = $code;
                $userData['confirmed'] = 0;
                unset($_POST['password']);
                unset($_POST['g-recaptcha-response']);
                $postData = array_merge($userData, $_POST);
                $this->model->create($postData);
                $headers = "From: noreply@coloseum.tq \r\n";
                $headers .= "Reply-To: noreply@coloseum.tq \r\n";
                $headers .= "CC: susan@example.com\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                $email_message = $this->mailTemplate($_POST['email'], $code);
                mail($_POST['email'], "Confirmation mail coloseum", $email_message, $headers);
                header('location: ' . URL . 'registration/welcome');
            }
        } else {
            if (!empty($message) && !empty($data)) {
                $messages = array_merge($message, $data);

            } elseif (empty($message) && !empty($data)) {
                $messages = $data;
            } elseif (!empty($message) && empty($data)) {
                $messages = $message;
            }
            $this->view->msg = $messages;
            $this->index();
        }
    }

    public function index()
    {
        $this->view->title = 'Registracija';
        $this->view->render('registration/index');
    }

    public function welcome()
    {
        $this->view->title = 'Dobrodošli';
        $this->view->render('welcome/index');
    }

    public function emailConfirmation($username, $code)
    {
        $user = $this->model->confirmEmail($username, $code);
        if ($code == $user[0]['confirmation_code']) {
            $data['confirmation_code'] = 0;
            $data['confirmed'] = 1;
            $this->model->updateEmailConfirmation($data, $user[0]['id']);
            header('location: ' . URL . 'registration/confirmed');
        }
    }

    public function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function confirmed()
    {
        $this->view->title = 'Potvrda emaila';
        $this->view->render('registration/confirmed');
    }

    public function mailTemplate($username, $code)
    {
        $url = URL . 'web/images/logo.png';
        $template = '
        <html>
<body style="background-color: #011627; color: white;">
	<div class="logo">
		<img src="' .$url .'">
	</div>
	<div class="text">
		<p style="color:white;">Confirm Your Email.
        Click the link below to verify you account.</p>
		<p style="color:white;">http://coloseum.tk/user/emailConfirmation?username='.$username.'&code='.$code.'</p>
	</div>
</body>
</html>';
        return $template;
    }
}