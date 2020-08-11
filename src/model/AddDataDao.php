<?php


namespace src\model;
use config\Model;

class AddDataDao extends Model
{

    public static function insert($data)
    {

        $db = self::getConnectionOracle();
        
        extract($data); 
        $sql = "INSERT INTO alert_site_nokia
                VALUES ('$alarm_number','$alarm_type','$severity' , '$alarm_time', '$cancel_state', '$cancel_time',
                      '$name', '$consecutive_number', '$alarm_insertion_time', '$alarm_update_time')";
       
       try {
        $stm = $db->prepare($sql);
        $exe = $stm->execute(); 
     } catch (\Exception $th) {
         print_r($th->getMessage());
     }      

      if ($exe) {
          return $result = "Bien ajouté";
      } else {
          return $result = "Echec ajout !";
      }

    }

    public static function login($params)
    {


            //== CRYPTAGE DU MDP SAISI PAR LE USER
            // $pass = EncriptExpresso::getEncryption($admin->getPassword());
            $pass = $params['password'];
            $login = $params['login'];


            $sql = "SELECT * FROM `user` WHERE login = '" . $login . "' AND password ='" . $pass . "'";
            //$exe = sel->query($sql);

            if ($exe) {
                //TABLE OF DATA
                $data = [];
                //CHARGE THE TABLE OF DATA
                while ($donnee = $exe->fetch()) {
                    $data[] = $donnee;
                }

                if (empty($data)) {
                    $data = "vide";
                    return $data;
                } else {
                    return $data;
                }
            } else {
                return $data = "ERREUR LORS DE L'EXECUTION DE LA REQUETE";
            }
        }

}