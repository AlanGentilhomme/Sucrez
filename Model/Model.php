<?php

class Model
{

    // // déclaration à distance

     const SERVER = "localhost";
     const USER = "root";
     const PASSWORD = "root";
      const BASE ="Sucrez";

      //const SERVER = "sqlprive-pc2372-001.privatesql.ha.ovh.net:3306";
      //const USER = "cefiidev908";
      //const PASSWORD = "hzc5JV62S";
      //const BASE ="cefiidev908";



    private $connexion;

    public function __construct()
    {
        try
        {
            $this->connexion = new PDO("mysql:host=".self::SERVER.";dbname=".self::BASE, self::USER, self::PASSWORD);
        } 
        catch (Exception $e) 
        {
            die('Erreur : ' . $e->getMessage());
        }          
    }

    public function affichage($code){

        $json=file_get_contents('https://world.openfoodfacts.org/api/v0/product/'.$code.'.json');
        $parse=json_decode($json,true);

        return $parse;



    }

    public function test(){

        $code = "3256226084493";
        $json=file_get_contents('https://world.openfoodfacts.org/api/v0/product/ ' .$code . '.json');
        $parse=json_decode($json,true);

        echo "<pre>";
        var_dump($parse['product']['product_name']);
        
    }

    public function calcul($parse){

        $sucre = $parse['product']['nutriscore_data']['sugars'];
        $poids = $parse['product']['product_quantity'];

        $total= round(($poids*$sucre)/100);


        $sucre = round($total/5);

        return $sucre;
    }
    

}