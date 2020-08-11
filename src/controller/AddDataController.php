<?php
use src\model\AddDataDao;
use src\services\CallApiSendSms;

class AddDataController extends config\Controller
{
    public function index()
    {
        $this->view->load('accueil/index');
    }

     //login controller
     public function login()
     {
         if(isset($_POST['connexion']))
         {
             if(!empty($_POST['login']) && !empty($_POST['password']))
             {
                 //== admin base
                 $admindao = new AdminDao();
                 //== User instanciation
                 $user = new Admin();


                 $user->setLogin($_POST['login']);
                 $user->setPassword($_POST['password']);

                 $result = $admindao->login($user);



                 //== Requete ne fonctionne pas
                 if ($result == 'vide')
                 {
                     $resultat =  "LOGIN OU MOT DE PASSE INCORRECT!";
                     //return header('Location:http://localhost/bloquage?message=\'.$resultat );
                     return header('location: http://192.168.180.222/api-charge-data-oracle?message='.$resultat);
                     //echo 'LOGIN OU MOT DE PASSE INCORRECT!';
                 }
                 //== Requete find something
                 else
                 {
                     //== Verif if its the admi profil
                      session_start();
                      $_SESSION['auth'] = $result;
                      $_SESSION['username'] = $_POST['login'];
                      //return $this->view->load('bloque/bloque');
                     return header('location: http://192.168.180.222/api-charge-data-oracle/adddata/add');
                 }

             }
             else
             {
                 $resultat =  "VEUILLEZ SAISIR TOUS LES CHAMPS";
                 //return header('location: http://192.168.180.40/RequizAdmin?message='.$resultat);
                 return header('location: http://192.168.180.222/api-charge-data-oracle?message='.$resultat);
                // return header('Location:http://localhost/bloquage?message=\'.$resultat );

             }

         }
     }

     //LogOut Controller
     public function logout() {
         session_start();
         unset($_SESSION['auth']);
         $_SESSION['flash']['success'] = "Vous etes maintenant déconnecté";
          session_destroy();
         header('location: http://192.168.180.222/api-charge-data-oracle');
     }
     

    /**
     * METHODE ADD DATA
     *
     **/

    public function add()
    {
       
       // $content_file_csv = file('C:\xampp\htdocs\api-charge-data-oracle\Resultats agence Janvier.csv');
        //var_dump($_FILES); die();
       
        if (!empty($_FILES['path_file']['name'])) {
            $extension = pathinfo($_FILES['path_file']['name'], PATHINFO_EXTENSION);
            // VERIFY IF THE EXTENSION IS CSV
            if ($extension==="csv" || $extension==="CSV") {
                $path_file = $_FILES['path_file']['name']; //Pour recuperer le nom du fichier qui sera stocker dans la base de données
                $path_file = str_replace(' ', '_', $path_file);
                $i = rand();
                $path_file = $i . $path_file;
                $path = __DIR__; 

               $path = str_replace('src\controller', '', $path);
                
                $fichierTmp = $_FILES['path_file']['tmp_name']; //Dossier temporaire pour stocker le fichier.
                move_uploaded_file($fichierTmp, 'Files csv uploaded\\'.$path_file); 
                $path = $path.'Files csv uploaded\\'.$path_file;
                $content_file_csv = file($path); 
                $j = 1;
                $first_column = explode(';', $content_file_csv[0]);
                
                for ($k=0; $k<count($first_column); $k++) {
                    $first_column[$k] = trim($first_column[$k]);
                }
                $good_columns[0] = "ALARM_NUMBER";
                $good_columns[1] = "ALARM_TYPE";
                $good_columns[2] = "SEVERITY";
                $good_columns[3] = "ALARM_TIME";
                $good_columns[4] = "CANCEL_STATE";
                $good_columns[5] = "CANCEL_TIME";
                $good_columns[6] = "NAME";
                $good_columns[7] = "CONSECUTIVE_NUMBER";
                $good_columns[8] = "ALARM_INSERTION_TIME";
                $good_columns[9] = "ALARM_UPDATE_TIME";
                
                if (count($first_column)==10) {
                    if ($first_column[0]==="ALARM_NUMBER" && $first_column[1]==="ALARM_TYPE"
                        && $first_column[2]==="SEVERITY" && $first_column[3]==="ALARM_TIME" && $first_column[4] === "CANCEL_STATE"
                        && $first_column[5] === "CANCEL_TIME" && $first_column[6] === "NAME" && $first_column[7] === "CONSECUTIVE_NUMBER"
                        && $first_column[8] === "ALARM_INSERTION_TIME" && $first_column[9] === "ALARM_UPDATE_TIME") {
                        
                        for ($i=1; $i<count($content_file_csv); $i++)
                        {
                            $tab = explode(';', $content_file_csv[$i]); // COUNT($tab) = 3
                            
                            $data['alarm_number'] = $tab[0];
                            $data['alarm_type'] = $tab[1];
                            $data['severity'] = $tab[2];
                            $data['alarm_time'] = $tab[3];
                            $data['cancel_state'] = $tab[4];
                            $data['cancel_time'] = $tab[5];
                            $data['name'] = $tab[6];
                            $data['consecutive_number'] = $tab[7];
                            $data['alarm_insertion_time'] = $tab[8];
                            $data['alarm_update_time'] = $tab[9];
                            
        
                            $added = AddDataDao::insert($data); 
                            
                            $j++;
                        }
                    
                        //echo '$j = '.$j.' ==> count tab = '.count($content_file_csv); die();
                        // ON VERIFIE 
                        if ($j === count($content_file_csv)) {
                        $this->view->data['added']=true;
                        }
                        else {
                            
                            $rs = 'Lignes restantes';
                        }

                    } else {
                        $this->view->data['bad_file']=true;
                        $this->view->data['good_columns'] = $good_columns;
                    }
                }
                else {
                    $this->view->data['number_column'] = true;
                }
              
            }
            else {
                $this->view->data['bad_extension']=true;
            }
        }
          //var_dump($this->view->data['number_column']); die();    
            //}
       // }
        $this->view->load('addFile');
    }

}
