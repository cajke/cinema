<?php

class Home extends Controller {

	function __construct() {
		parent::__construct();
        $this->loadModel("film");
	}
	
	function index() {
	    $this->view->title = 'Početna';
        $newestFilms = $this->model->newestFilmsilmsSorted();

        if(sizeof($newestFilms)>=4){
            $i=4;
        }else{
            $i= sizeof($newestFilms);
        }
        for ($j = 0;$j<$i;$j++){
            $this->view->newestFilms[$j]= $newestFilms[$j];
        }

        $popularFilmsSorted = $this->model->popularFilmsSorted();

        if(sizeof($popularFilmsSorted)>=4){
            $k=4;
        }else{
            $k= sizeof($popularFilmsSorted);
        }
        for ($m = 0;$m<$k;$m++){
            $this->view->popularFilmsSorted[$m]= $popularFilmsSorted[$m];
        }
        $this->loadModel("dashboard");

        $news = $this->model->getNews();
        $size = sizeof($news);
        $this->view->firstNews = $news[$size-1];
        $this->view->secondNews = $news[$size-2];

        $this->view->i=$i;
        $this->view->k=$k;
        $this->view->render('home/index');
	}

}