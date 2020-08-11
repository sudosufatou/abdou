<?php
/**
 * Created by PhpStorm.
 * User: Diallo
 * Date: 05/04/2019
 * Time: 09:14
 */
namespace config;

use \Exception;

class View
{

    public $data;

    /*public function assign($cle,$valeur){
        $this->data[$cle]=$valeur;
    }*/
    public function __construct()
    {
        $this->data = [];
    }

    // CETTE FONCTION PERMET DE CAHRGER LES FICHIER VIEWS.
    // CETTE FONCTION SERA APPELEE AVEC DES ARGUMENTS DYNAMIQUEMENT
    public function load($nameFile)
    {

        $file = "src/view/" . $nameFile . ".php";
        try {
            if (file_exists($file)) {
                $data = $this->data;
                //extract($data); // ON EXTRAIT LE TABLEAU $data.
                // ON INCLUT UN FICHIER header.php SI CE DERNIER EXISTE
                if (file_exists("src/view/inc/header.php")) {
                    require_once "src/view/inc/header.php";
                }
                // LE CONTENU DE LA PAGE A AFFICHER
                require_once $file;
                // ON INCLUT UN FICHIER footer.php SI CE DERNIER EXISTE
                if (file_exists("src/view/inc/footer.php")) {
                    require_once "src/view/inc/footer.php";
                }
            } else {
                throw new \Exception("Cette vue n'existe pas");
            }

        }
        catch (\Exception $e) {
            // MODE PRODUCTION
            //require_once "src/view/errors/404.php";
            // MODE DEVELOPPEMENT
            echo $e->getMessage();
        }
    }
}