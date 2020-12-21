<?php namespace App\Controllers;

use App\Models\annonceModel;
use App\Models\energieModel;
use App\Models\utilisateurModel;
use App\Models\photoModel;
use App\Controllers\Pages;
use CodeIgniter\Controller;
use App\Controllers\Photo;

class Annonce extends Controller
{
    public function returnError($error,$view)
    {
        service('SmartyEngine')->assign('error',$error);
        return service('SmartyEngine')->view($view.'.tpl');
    }

    public function update($id_annonce)
    {
        helper(['form', 'url']);

        $annonceVal = $this->validate([
                   'titre' => 'required',
                   'type' => 'required',
                   'loyer' => 'required',
                   'charges' => 'required',
                   'chauffage' => 'required',
                   'perf_energie' => 'required',
                   'superficie' => 'required',
                   'meuble' => 'required',
                   'description' => 'required', 
                   'adresse' => 'required',
                   'ville' => 'required',
                   'cp' => 'required'
                ]);
        $session = \Config\Services::session();
        //return $this->returnError($session->get("mail"),'nouvelle_annonce');
        if( $session->get("mail") === null ) return $this->returnError('Vous n\'avez pa le droit d\'éditer cette annonce','nouvelle_annonce');
        else if($annonceVal) //Verifier l'utilisateur est connecté et qu'il modifie son annonce
        {
            $annonce = [];
            $annonce['A_idannonce'] = $id_annonce;
            $annonce['A_titre'] = $this->request->getVar('titre');
            $annonce['T_type'] = $this->request->getVar('type');
            $annonce['A_cout_loyer'] = $this->request->getVar('loyer');
            $annonce['A_cout_charges'] = $this->request->getVar('charges');
            $annonce['A_type_chauffage'] = $this->request->getVar('chauffage');
            $annonce['A_perf_energie'] = $this->request->getVar('perf_energie');
            $annonce['A_superficie'] = $this->request->getVar('superficie');
            $annonce['A_est_meuble'] = $this->request->getVar('meuble') === 'estMeuble' ?  true : false;
            $annonce['A_description'] = $this->request->getVar('description');
            $annonce['A_adresse'] = $this->request->getVar('adresse');
            $annonce['A_ville'] = $this->request->getVar('ville');
            $annonce['A_CP'] = $this->request->getVar('cp');

            $annonce['A_etat'] = 'publiée';


            date_default_timezone_set('Europe/Paris');
            $annonce['A_date_maj'] = date('Y-m-d H:i:s');
            $model = new annonceModel();
            
            if($annonce['A_type_chauffage'] === 'individuel')
            {
                $annonce['E_id_engie'] = $this->request->getVar('engie');
                if( $annonce['E_id_engie'] === 'autreTypeChauffage' ) //Si utilisateur entre nouveau type de chauffage insertion dans la BDD
                {
                    $modelE = new energieModel();
                    $energie = [];
                    $energie['E_id_engie'] = 'DEFAULT';
                    $energie['E_description'] = $this->request->getVar('nouv_energie');

                    //test Energie existe déjà
                    $lEner = $modelE->getEnergie();
                    for($i=0 ; $i<count($lEner); ++$i) 
                    {
                        if ($lEner[$i]['E_description'] === $energie['E_description'])
                        {
                            return $this->returnError('L\'energie entrée existe déjà dans la BDD','edition_annonce');
                        }
                    }   
                    
                    $modelE->insertEnergie($energie);
                    

                }
            }
            else  
            {
                $annonce['E_id_engie'] = null;
            }
            $model->updateAnnonce($annonce);
            service('SmartyEngine')->assign('succes','Annonce insérée avec succes');
            return service('SmartyEngine')->view('connexion.tpl');  
        }
        else
        {
            $this->returnError('Veuillez vous connecter pour effectuer cette action','connexion');
        }


    }

    public function test()
    {
        $session = \Config\Services::session();
        $model = new annonceModel();
        $res = $model->getLastAnnonce($session->get("mail"));
        $this->returnError(var_dump($res['A_idannonce']),"connexion");
    }

    public function getFiles()
    {
        if (is_null($this->files))
        {
            $this->files = new FileCollection();
        }
        return $this->files->all();
    } 

    public function create()
    {
        //return service('SmartyEngine')->view('connexion.tpl');  
        helper(['form', 'url']);

        $annonceVal = $this->validate([
                   'titre' => 'required',
                   'type' => 'required',
                   'loyer' => 'required',
                   'charges' => 'required',
                   'chauffage' => 'required',
                   'perf_energie' => 'required',
                   'superficie' => 'required',
                   'meuble' => 'required',
                   'description' => 'required', 
                   'adresse' => 'required',
                   'ville' => 'required',
                   'cp' => 'required'
                ]);
        $session = \Config\Services::session();
        //return $this->returnError($session->get("mail").gettype($session->get("mail")),'nouvelle_annonce');
        if($session->get("mail") === null ) return $this->returnError('Vous devez être connecté pour créer une annonce','connexion');
        else if($annonceVal) //Verifier l'utilisateur est connecté et qu'il modifie son annonce
        {
            $annonce = [];
            $annonce['A_titre'] = $this->request->getVar('titre');
            $annonce['T_type'] = $this->request->getVar('type');
            $annonce['A_cout_loyer'] = $this->request->getVar('loyer');
            $annonce['A_cout_charges'] = $this->request->getVar('charges');
            $annonce['A_type_chauffage'] = $this->request->getVar('chauffage');
            $annonce['A_perf_energie'] = $this->request->getVar('perf_energie');
            $annonce['A_superficie'] = $this->request->getVar('superficie');
            $annonce['A_est_meuble'] = $this->request->getVar('meuble') === 'estMeuble' ?  true : false;
            $annonce['A_description'] = $this->request->getVar('description');
            $annonce['A_adresse'] = $this->request->getVar('adresse');
            $annonce['A_ville'] = $this->request->getVar('ville');
            $annonce['A_CP'] = $this->request->getVar('cp');

            $annonce['A_etat'] = 'publiée';
            $annonce['U_mail'] = $session->get("mail");

            date_default_timezone_set('Europe/Paris');
            $annonce['A_date_maj'] = date('Y-m-d H:i:s');

            //Gestion des photos de l'annonce  
            $controllerP = new Photo();
            $model = new annonceModel();
            $lastAnnonce = $model->getLastAnnonce($session->get("mail"));  //Récupère la dernière annonce insérée par l'utilisateur
            $imagefile = $this->request->getFiles();
            $notif = $controllerP->create($imagefile, $lastAnnonce["A_idannonce"]);
            //$this->returnError(gettype($notif),'connexion');
            if(gettype($notif)!==NULL)
            {
                $this->returnError(var_dump($notif),'connexion');
                service('SmartyEngine')->assign('notification',$notif);
                return service('SmartyEngine')->view('nouvelle_annonce.tpl');   
            }
            
            //gestion du chauffage
            if($annonce['A_type_chauffage'] === 'individuel')
            {
                $annonce['E_id_engie'] = $this->request->getVar('engie');
                if( $annonce['E_id_engie'] === 'autreTypeChauffage' ) //Si utilisateur entre nouveau type de chauffage insertion dans la BDD
                {
                    $modelE = new energieModel();
                    $energie = [];
                    $energie['E_id_engie'] = 'DEFAULT';
                    $energie['E_description'] = $this->request->getVar('nouv_energie');

                    //test Energie existe déjà
                    $lEner = $modelE->getEnergie();
                    for($i=0 ; $i<count($lEner); ++$i) 
                    {
                        if ($lEner[$i]['E_description'] === $energie['E_description'])
                        {
                            return $this->returnError('L\'energie entrée existe déjà dans la BDD','edition_annonce');
                        }
                    }   
                    
                    $modelE->insertEnergie($energie);
                
                }
            }
            
            $model->insertAnnonce($annonce);
            $notification = array( 
                "type" => "success",
                "titre" => "Success",
                "message" => "Votre annonce à été insérée dans la BDD"
            );
            service('SmartyEngine')->assign('notification',$notification);
            return $this->accueil();
            return service('SmartyEngine')->view("connexion.tpl");

        }
        else
        {
            $this->returnError('Veuillez vous connecter pour effectuer cette action','connexion');
        }
    }





    public function view($page,$id_annonce=false)
    {        
        $modelA = new annonceModel();
        $annonce = $modelA->getAnnonce($id_annonce);
        if( $page!=='nouvelle_annonce' && !($id_annonce!==false && gettype($annonce)==='array' && empty($annonce['A_idannonce'])!==1)) //Lance une erreur si annonce n'existe pas pour édition où la vue
            return $this->returnError('L\'annonce n\'a pas été trouvée','connexion');
             
        $session = \Config\Services::session();
        if($page === 'edition_annonce' && $session->get('mail')!==$annonce['U_mail'])  //Vérifie que l'annonce appartient à l'utilisateur
            return $this->returnError('Vous n\'étes pas autorisé à modifier cette annonce','connexion');
        
        $modelE = new energieModel();
        $energie = $modelE->getEnergie();
        service('SmartyEngine')->assign('energie',$energie);
        
        if($page==='nouvelle_annonce')
            return service('SmartyEngine')->view($page.'.tpl');
        
        if($page==='annonce')
        {
            //Gestion de la date
            $dateFormat = $this->dateFormat($annonce['A_date_maj']);
            service('SmartyEngine')->assign('dateFormat',$dateFormat);

            //Gestion du propriétaire 
            $modelU = new utilisateurModel();
            $proprio = $modelU->getUtilisateur($annonce['U_mail']);
            service('SmartyEngine')->assign('proprio',$proprio);

            //Gestion des photos
            $modelP = new photoModel();
            $lPhotos = $modelP->getPhoto($annonce["A_idannonce"]);
            $i=0;
            $lDivID = array("one", "two", "three", "four", "five");
            $nbPhotos = count($lPhotos);
            
            //$this->returnError(var_dump($lPhotos),'connexion');
            foreach($lPhotos as $photo)  //ajout des attributs html pour l'affichage
            {
                $photo["prev"] = ( $i==0 ) ?  $nbPhotos : $i ;
                $photo["next"] = ( $i==$nbPhotos-1) ? 1 : $i+2;
                $photo["lDivID"]=$lDivID[$i];
                $photo["index"]=$i+1;
                $lPhotos[$i++] = $photo;
            }
            service('SmartyEngine')->assign('liste_photo',$lPhotos);
        }
        
        if($page==='edition_annonce')
        {
            $annonce['A_etat'] = 'en cours';
            $modelA->updateAnnonce($annonce);
        }
        service('SmartyEngine')->assign('annonce',$annonce);
        return service('SmartyEngine')->view($page.'.tpl');   
    }

    public function getAnnoncesPubliees(array $lAnnonces):array
    {
        $lAnnPub = [];
        foreach($lAnnonces as $annonce)
        {
            if($annonce["A_etat"]==="publiée")
                array_push($lAnnPub,$annonce);
        }
        return $lAnnPub;
    }

    public function dateFormat(string $date):string
    {
        $tabMois = array("Janvier","Févrirer","Mars","Avril","Mai","Juin",'Juillet','Août','Septembre','Octobre','Novembre','Décembre');
        $numMois =  substr($date,5,2);
        return substr($date,8,2).' '.$tabMois[$numMois-1].' '.substr($date,0,4).' à '.substr($date,11,2).'h'.substr($date,14,2);  
    }


    public function viewListe(int $id_debut=0,int $nbAnnonces=15, bool $annUti=false)
    {
        $session = \Config\Services::session();
        $modelA = new annonceModel();
        if(!$annUti)

            $lAnnonces = $modelA->getAnnonce();

        else
        {
            $lAnnonces = $modelA->getAnnonceUti($session->get("mail"));
            $nbAnnonces = count($lAnnonces);
        }
        $lAnnonces = $this->getAnnoncesPubliees($lAnnonces);

        //Modification de la variable id_debut si dépassement du nombre d'annonce ou borne trop petite
        if($id_debut>count($lAnnonces) - count($lAnnonces)%$nbAnnonces ) $id_debut = count($lAnnonces) - count($lAnnonces)%$nbAnnonces;
        //return $this->returnError("$nbAnnonces $id_debut ",'connexion');
        if($nbAnnonces === 0)  //Affichage du message de warning si pas d'annonces dans la BDD
        {
            $notification = array( 
                "type" => "warning",
                "titre" => "Warning",
                "message" => "Pas d'annonces dans la BDD"
            );
            service('SmartyEngine')->assign('notification',$notification);
            return service('SmartyEngine')->view('liste_annonce.tpl');
        }

        if($nbAnnonces!==6 && !$annUti)  //On considère qu'on affiche 6 annonces sur la page d'accueil, Autrement on est sur la page qui affiche toutes les annonces
        { 
            $lBoutons = [] ;
            $debut = 0;
            //Gestion des boutons en fonction du nombre d'annonces
            for($i=0; $i<ceil(count($lAnnonces)/$nbAnnonces); ++$i)
            {
                $lBoutons[$i]["numPage"] = $i;
                $lBoutons[$i]["numAnnDeb"] = $debut;
                //Modification du nb d'annonces pour le dernier boutons si le nombre dépasse le nombre dans la BDD
                $lBoutons[$i]["numAnnFin"] = ($nbAnnonces*($i+1) > count($lAnnonces)) ? count($lAnnonces)-$nbAnnonces*($i)+$debut : $nbAnnonces+$debut;
                $debut += $nbAnnonces;
            }
            service('SmartyEngine')->assign('lBoutons',$lBoutons);
            service('SmartyEngine')->assign('bSelect',$id_debut);
            service('SmartyEngine')->assign('nbAnnonces',$nbAnnonces);
        }
        //Gestion des dates pour chaque annonce
        $lConcatAnn = [] ;
        //affichage des annonces avec bornes passées en paramètres
        $modelP = new photoModel();
        for($i=0; $i<$nbAnnonces && $i+$id_debut<count($lAnnonces); ++$i)
        {
            $dateFormat = $this->dateFormat($lAnnonces[$i]['A_date_maj']);
            $lConcatAnn[$i] = $lAnnonces[$i+$id_debut];
            $photo = [];
            array_push( $photo , $modelP->getPhoto($lConcatAnn[$i]['A_idannonce']));
            if(isset($photo[0][0]))
                $lConcatAnn[$i]["P_photo"] = $photo[0][0];
            //return $this->returnError((gettype($photo[0][0])) , 'connexion');
        }
        service('SmartyEngine')->assign('dateFormat',$dateFormat);
        service('SmartyEngine')->assign('liste_annonce',$lConcatAnn);
        service('SmartyEngine')->assign('session',$session);
        return service('SmartyEngine')->view('liste_annonce.tpl');
    }

    public function accueil()
    {
        $session = \Config\Services::session();
        $modelA = new annonceModel();
        $lAnnonces = $modelA->getAnnonce();
        service('SmartyEngine')->assign('estAccueil',true);
        $this->viewListe(0,6);
    }

    public function mesAnnonces()
    {
        $session = \Config\Services::session();
        if( !empty($session->get("mail")))  
        {
            return $this->viewListe(0,0,true);
        }
        return $this->accueil();
    }
}
?>