<?php

class View
{
    private $page;
    

    public function __construct()
    {
        $this->page .= $this->searchHTML('header');
    }


    public function index(){
        $this->page .=$this->searchHTML('index');
        $this->display();
    }

    public function affichage($salut,$parse,$sucre){

        $this->page .= "
        
        <div class='col-12 row justify-content-center mt-5 text-light '>


        <div>
        <img class='center-block mr-5' src='". $parse['product']['selected_images']['front']['display']['fr'] ."'>
        </div>

        <div class='col-5'>
        <h1 class=' '>".$parse['product']['product_name'] ."</h1>
        <h4 >Code : ". $parse['code'] . "</h4>
        <p> ". $parse['product']['ingredients_text_fr'] . "</p>
        <p> Sucre : ". $parse['product']['nutriscore_data']['sugars'] ."g pour 100g</p>
        <p> Poids : " . $parse['product']['product_quantity'] . "g</p>
        <h6> Nombre de morceaux de sucre : </h6> " .str_repeat('<img src="img/sugar.png" class="col-1 mt-1">', $sucre) . "

        </div>

        </div>

        <div class='d-flex justify-content-center'>
       <a href='index.php?action=accueil' > <h1 class='text-light center-block mt-5 btn btn-dark'>Essayez un autre produit</h1></a>
        </div>

        ";
        
        $this->display();
    }


    private function display()
    {
        //$this->page .= $this->searchHTML('footer');
        echo $this->page;
    }

    private function searchHTML($html)
    {
        return file_get_contents('html/'.$html.'.html');
    }
}
