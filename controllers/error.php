<?php

class ErrorC extends Controller {

	function __construct() {
		parent::__construct();
	}
	
	function index() {
		$this->view->headline = "Nažalost nismo mogli pronaći ovu stanicu ili Vi nemate dozvolu da joj pristupite.";
		$this->view->errorText = "Ovaj resurs kojem pokušavate da pristupite ne postoji ili Vi nemate neophodnu dozvolu da joj pristupite.</br>
			    Proverite da li je zahtevana adresa tačna i da li je stranica premeštena.";
		$this->view->render('error/index',true);
	}

}