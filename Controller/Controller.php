<?php

include 'Model/Model.php';
include 'View/View.php';

class Controller
{
    private $view;
    private $model;

    public function __construct()
    {
        $this->view = new View();
        $this->model = new Model();
    }

    public function dispatch()
    {
        $action = isset($_GET['action']) ? $_GET['action'] : 'accueil';

        switch ($action){

            case 'accueil' :

                $this->view->index();
                
            break;

            case 'affichage' : 

                $parse=$this->model->affichage($_POST['code']);
                $sucre=$this->model->calcul($parse);
                $this->view->affichage($_POST['code'],$parse,$sucre);
            break;

            case 'test':

                $this->model->test();


        }
}
}