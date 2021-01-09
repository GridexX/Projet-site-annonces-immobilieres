<?php namespace App\Controllers;

use App\Models\annonceModel;
use App\Models\energieModel;
use App\Models\utilisateurModel;
use App\Models\messagerieModel;
use App\Models\photoModel;
use App\Controllers\Pages;
use CodeIgniter\Controller;
use App\Controllers\Photo;
use App\Controllers\Mail;

class Annonce extends Controller
{
    public function returnError($error,$view)
    {
        service('SmartyEngine')->assign('error',$error);
        return service('SmartyEngine')->view($view.'.tpl');
    }

    public function loadNotif($type, $message, $page=false)
    {

        $controlP = new Pages();
        $controlP->affNotif($type,$message);
        //if($page===false) return $this->accueil();
        //service('SmartyEngine')->view($page.'.tpl');
    }

    public function update($id_annonce,$deletePhoto=false)
    {
        $this->create($id_annonce,$deletePhoto);
    }


    public function getFiles()
    {
        if (is_null($this->files))
        {
            $this->files = new FileCollection();
        }
        return $this->files->all();
    } 

    public function bloquerAnnonces(string $mail)
    {
        
        $controlU = new Utilisateur();
        if( !$controlU->estAdmin() )
        {
            $controlP = new Pages();
            $controlP->affNotif("error","Vous ne pouvez pas bloquer des annonces !");
            return $this->accueil();
        }

        $modelA = new annonceModel();
        $modelU = new utilisateurModel();
        $lAnnonces = $modelA->getAnnonceUti($mail);
        foreach($lAnnonces as $annonce)
        {
            $annonce["A_etat"] = "bloquée";
            $modelA->updateAnnonce($annonce);
        }
        $controllerMail = new Mail();
        $controllerMail->annoncesBloquées($modelU->getUtilisateur($mail));
        return redirect()->to('/utilisateur/view/espace_admin');
    }

    public function changerEtat(int $id_annonce, string $etat, string $page) //Rajouter test appartenances annonce
    {
        if($etat==='en cours' || $etat==='publiée' || $etat==='archivée' || $etat="bloquée")
        {
            $model = new annonceModel();
            $annonce = $model->getAnnonce($id_annonce);
            $annonce["A_etat"] = $etat;
            $model->updateAnnonce($annonce);
            //prévient l'utilisateur si l'admin bloque son annonce

            //RAJOUTER MAIL
            if($etat==="bloquée")
            {
                $modelU = new utilisateurModel();
                $controllerMail = new Mail();
                $controllerMail->annonceBloquée($modelU->getUtilisateur($annonce["U_mail"]),$annonce);
            }
        }
        switch ($page) {
            case 'espace_admin':
                $controllerU = new Utilisateur();
                return $controllerU->view($page);
                break;
            case 'annonce':
                return $this->view($page,$annonce["A_idannonce"]);
                break;
            case 'annoncesUti':
                return $this->annoncesUti($annonce["U_mail"]);
                break;    
            default:
                # code...
                break;
        }
    }
   

    public function create($id_annonce=false, $deletePhoto=false)
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
        //return $this->returnError($session->get("mail").gettype($session->get("mail")),'nouvelle_annonce');
        if($session->get("mail") === null ) return $this->returnError('Vous devez être connecté pour créer une annonce','connexion');
        else if($annonceVal) //Verifier l'utilisateur est connecté et qu'il modifie son annonce
        {
            $annonce = [];
            $annonce['A_idannonce'] = ($id_annonce===false ) ? 'DEFAULT' : $id_annonce;
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
            $annonce['A_etat'] = 'en cours';
            $annonce['U_mail'] = $session->get("mail");

            date_default_timezone_set('Europe/Paris');  //Setup de l'heure courante
            $annonce['A_date_maj'] = date('Y-m-d H:i:s');
            
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
                    $annonce['E_id_engie'] = $modelE->getLastEnergie();
                }                
            }

            $model = new annonceModel();
            //Gestion des photos de l'annonce  
            $controllerP = new Photo();
            $imagefile = $this->request->getFiles();

            //Vérif si l'utilisateur n'insere pas de photos
            $controllerPa = new Pages();

            if( (!$controllerP->estPhotoValide($imagefile) && $deletePhoto!==false) || ($id_annonce===false && !$controllerP->estPhotoValide($imagefile))  )  //On interdit l'update sans photo ou la création sans photo
            {
                $controllerPa->affNotif("error","Vous devez insérer au moins une photo pour l'annonce");
                if($id_annonce!==false) return $this->view("edition_annonce",$id_annonce);
                else return $this->view("nouvelle_annonce",$id_annonce);
            }

            if($id_annonce!==false) //Si update d'une annonce destruction des anciennes photos si nouvelles 
            {
                $model->updateAnnonce($annonce);
                if($deletePhoto!==false)
                    $controllerP->delete($id_annonce);   
            }
            else  //Insertion de l'annonce si method create
            {
                $model->insertAnnonce($annonce);
            }
            if($deletePhoto!==false || $id_annonce===false)  //Ajout des photos si maj avec nouvelles photos ou création
            {
                $lastAnnonce = $model->getLastAnnonce($session->get("mail"));  //Récupère la dernière annonce insérée par l'utilisateur
                
                $controllerP->create($imagefile,$lastAnnonce["A_idannonce"]);
            }
            
            //return $this->returnError(print_r($lastAnnonce),'connexion');
            
            $controllerPa->affNotif('success',"Annonce insérée avec succés");
            return $this->mesAnnonces();
        }
        else
        {
            $this->returnError('Veuillez vous connecter pour effectuer cette action','connexion');
        }

        
    }

    public function delete(int $id_annonce, bool $confirm=false)
    {
        if($confirm===false)
        {
            service('SmartyEngine')->assign('confirmation',true);
            return $this->view('edition_annonce',$id_annonce);
        }
        $modelA = new annonceModel();
        $annonce = $modelA->getAnnonce($id_annonce);
        if( !(gettype($annonce)==='array' && empty($annonce['A_idannonce'])!==1) )
        {

            $controlP = new Pages();
            $controlP->affNotif('error',"L'annonce n'a pas été trouvée sur le site");
        }
        $modelM = new messagerieModel();
        $modelM->deleteM($id_annonce);
        $controllerP = new Photo();
        $controllerP->delete($id_annonce);
        
        $session = \Config\Services::session();
        //Envoie du mail de suppression
        $controllerU = new Utilisateur();
        $adminDelAutre = $controllerU->estAdmin() && $annonce['U_mail'] !== $session->get("mail");
        $controllerM = new Mail();
        $controllerM->delAnnonce($annonce, $adminDelAutre);
        $modelA->deleteAnnonce($id_annonce); 

        //Affichage de la notification
        $controlP = new Pages();
        $controlP->affNotif('success',"Annonce supprimée avec succés","/");
        return $this->mesAnnonces();
    }

    public function view($page,$id_annonce=false)
    {      
        $session = \Config\Services::session();
        $controlP = new Pages();
        if($session->get("mail") === null && $page === 'nouvelle_annonce') {
            $controlP->affNotif("error","Vous devez être connecté pour créer une annonce !");
            return $this->accueil(); 
        }  
        $modelA = new annonceModel();
        $annonce = $modelA->getAnnonce($id_annonce);
        if( $page!=='nouvelle_annonce' && !($id_annonce!==false && gettype($annonce)==='array' && empty($annonce['A_idannonce'])!==1)) //Lance une erreur si annonce n'existe pas pour édition où la vue
            return $this->returnError('L\'annonce n\'a pas été trouvée','connexion');
             
        if($page === 'edition_annonce' && !($session->get('mail')===$annonce['U_mail'] || $session->get('admin') ) )  //Vérifie que l'annonce appartient à l'utilisateur et 
            return $this->returnError('Vous n\'étes pas autorisé à modifier cette annonce','connexion');
        
        $controllerP = new Pages();
        $controllerU = new Utilisateur();

        
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
            $lDivID = array("one", "two", "three", "four", "five", "six");
            $nbPhotos = count($lPhotos);
            
            //$this->returnError(var_dump($lPhotos),'connexion');
            foreach($lPhotos as $photo)  //ajout des attributs html pour l'affichage
            {
                $photo["prev"] = ( $i==0 ) ?  $nbPhotos : $i ;
                $photo["next"] = ( $i==$nbPhotos-1) ? 1 : $i+2;
                $photo["lDivID"]=$lDivID[$i];
                $photo["index"]=$i+1;
                $lPhotos[$i++] = $photo;
                if($i===5) break;
            }
            service('SmartyEngine')->assign('liste_photo',$lPhotos);
        }
        
        if($page==='edition_annonce')
        {
            if($annonce["A_etat"]==="bloquée" && ! $controllerU->estAdmin())
            {
                $controllerP->affNotif('error', "Cette annonce à été bloquée, vous ne pouvez plus l'éditer !");
                $controllerA = new Annonce();
                return $controllerA->mesAnnonces();
            }
            $annonce['A_etat'] = 'en cours';
            $modelA->updateAnnonce($annonce);
            $modelP = new photoModel();
            $lPhotos = $modelP->getPhoto($annonce['A_idannonce']);
            if(count($lPhotos)>0){
                $tailleDiv = (int)( 100/count($lPhotos) ) ;
                service('SmartyEngine')->assign('taille_div',$tailleDiv);
                service('SmartyEngine')->assign('liste_photo',$lPhotos);
            }

            //Empeche modification champs annonces pour admin si elle ne lui appartient pas
            
            if( $session->get("admin")===true && $session->get('mail')!==$annonce['U_mail']  )
                service('SmartyEngine')->assign('adminNoModif',true);
            
            
        }
        service('SmartyEngine')->assign('annonce',$annonce);
        return service('SmartyEngine')->view($page.'.tpl');   
    }

    public function getTypeAnnonce(array $lAnnonces, $type):array
    {
        $lAnnType = [];
        foreach($lAnnonces as $annonce)
        {
            if($type==="débloquée")
            {
                if($annonce["A_etat"]!=="bloquée")
                {
                    array_push($lAnnType,$annonce);
                }
            }
            else if($annonce["A_etat"]===$type)
                array_push($lAnnType,$annonce);
        }
        return $lAnnType;
    }

    public function dateFormat(string $date):string
    {
        $tabMois = array("Janvier","Févrirer","Mars","Avril","Mai","Juin",'Juillet','Août','Septembre','Octobre','Novembre','Décembre');
        $numMois =  substr($date,5,2);
        return substr($date,8,2).' '.$tabMois[$numMois-1].' '.substr($date,0,4).' à '.substr($date,11,2).'h'.substr($date,14,2);  
    }

    public function arrDateFormat(array $lAnnonces)
    {
        $lAnnonceFormat = [];
        foreach($lAnnonces as $annonce)
        {
            $annonce["A_date_maj"] = $this->dateFormat($annonce["A_date_maj"]);
            array_push($lAnnonceFormat, $annonce); 
        }
        return $lAnnonceFormat;
    }

    function maxValueInArray($array, $keyToSearch)
    {
        $currentMax = 0;
        foreach($array as $ele)
        {
            if( $ele[$keyToSearch] > $currentMax )
                $currentMax = $ele[$keyToSearch];
        }
        return $currentMax;
    }

    function minValueInArray($array, $keyToSearch)
    {
        $currentMin = $array[0][$keyToSearch];
        foreach($array as $ele)
        {
            if( $ele[$keyToSearch] < $currentMin )
                $currentMin = $ele[$keyToSearch];
            
        }
        return $currentMin;
    }

    function lAnnonceVide($lAnnonce):bool  //renvoie si il y a des annonces selon un type dans la BDD
    {
        return (count($lAnnonce)===0 ) ? true : false;
    }

    public function whereReqChamps($lAnnonces):string
    {
        helper(['form', 'url']);
        $recherche = [];
        $recherche["A_titre"] = empty($this->request->getPost("A_titre")) ? null : $this->request->getPost("A_titre");
        $recherche["A_type_chauffage"] = $this->request->getPost("A_type_chauffage")=== "indifférent" ? null : $this->request->getPost("A_type_chauffage");
        $recherche["E_id_engie"] = $this->request->getPost("E_id_engie")=== "indifférent" ? null : $this->request->getPost("E_id_engie");
        $recherche["T_type"] = $this->request->getPost("T_type")=== "indifférent" ? null : $this->request->getPost("T_type");
        $recherche["A_est_meuble"] = $this->request->getPost("A_est_meuble")=== "indifférent" ? null : $this->request->getPost("A_est_meuble");
        $recherche["A_ville"] = empty($this->request->getPost("A_ville")) ? null : $this->request->getPost("A_ville");
        $recherche["A_CP"] = empty($this->request->getPost("A_CP")) ? null : $this->request->getPost("A_CP");

        $borne = [];
        $borne["min_A_cout_loyer"] = floor($this->minValueInArray($lAnnonces,"A_cout_loyer") - ($this->minValueInArray($lAnnonces,"A_cout_loyer")%10) );
        $borne["max_A_cout_loyer"] = floor($this->maxValueInArray($lAnnonces,"A_cout_loyer") + 10 - ($this->maxValueInArray($lAnnonces,"A_cout_loyer")%10) );
        $borne["min_A_cout_charges"] = floor($this->minValueInArray($lAnnonces,"A_cout_charges") - ($this->minValueInArray($lAnnonces,"A_cout_charges")%10) );
        $borne["max_A_cout_charges"] = floor($this->maxValueInArray($lAnnonces,"A_cout_charges") + 10 - ($this->maxValueInArray($lAnnonces,"A_cout_charges")%10) );
        $borne["min_A_superficie"] = ceil($this->minValueInArray($lAnnonces,"A_superficie"));
        $borne["max_A_superficie"] = floor($this->maxValueInArray($lAnnonces,"A_superficie"));
        $borne["min_A_perf_energie"] = ceil($this->minValueInArray($lAnnonces,"A_perf_energie"));
        $borne["max_A_perf_energie"] = floor($this->maxValueInArray($lAnnonces,"A_perf_energie"));

        $tabEngie = [ 0, 50, 90, 150, 230, 330, $borne["max_A_perf_energie"] ];

        $whereCond = "";
        $tempIndex = [];
        foreach($recherche as $key => $val)
        {
            if($val!==null)
            {
                if($key==="A_est_meuble")
                    $whereCond .= " && $key is $val";
                else
                    $whereCond .= " && $key like '%$val%'";
            }
        }
        foreach($borne as $key => $val)
        {
            if(!empty($this->request->getPost($key)))
            {
                $borne[$key] = $this->request->getPost($key);
                if(substr($key,4)==="A_perf_energie")
                {
                    //$tempIndex[$key] = $borne[$key];
                    $borne[$key] = $tabEngie[$borne[$key]];
                    //return $this->returnError( $borne["max_A_perf_energie"], 'connexion' );
                }
                //if(substr($key,4)==="A_perf_energie")
                    //  $borne[$key] = $tempIndex[$key];      
            }   
            $whereCond .= ( substr($key,0,3)==="min" ) ? ' && '.substr($key,4).' BETWEEN '.$borne[$key] :  ' AND '.$borne[$key] ; //en fonction du min ou du max
            
        }
        service('SmartyEngine')->assign('recherche',$recherche);
        service('SmartyEngine')->assign('borne',$borne);
        $whereCond = empty($whereCond) ? '' : 'WHERE '.substr($whereCond,3);
        return $whereCond;
    }

    public function assignButton($lAnnonces,$id_debut,$nbAnnonces)
    {
        $lBoutons = [] ;
        $debut = 0;
        //if($id_debut>count($lAnnonces) - count($lAnnonces)%$nbAnnonces ) $id_debut = count($lAnnonces) - count($lAnnonces)%$nbAnnonces;

        //Gestion des boutons en fonction du nombre d'annonces
        if(count($lAnnonces)>15){
        for($i=0; $i<ceil(count($lAnnonces)/$nbAnnonces); ++$i)
        {
            $lBoutons[$i]["numPage"] = $i;
            $lBoutons[$i]["numAnnDeb"] = $debut;
            //Modification du nb d'annonces pour le dernier boutons si le nombre dépasse le nombre dans la BDD
            $lBoutons[$i]["numAnnFin"] = ($nbAnnonces*($i+1) > count($lAnnonces)) ? count($lAnnonces)-$nbAnnonces*($i)+$debut : $nbAnnonces+$debut;
            $debut += $nbAnnonces;
        }
        service('SmartyEngine')->assign('lBoutons',$lBoutons);
        }
        
        service('SmartyEngine')->assign('bSelect',$id_debut);
        service('SmartyEngine')->assign('nbAnnonces',$nbAnnonces);
        
    }

    public function viewListe2(string $type, $id_debut=false, $nbAnnonces=false)
    {
        $modelA = new annonceModel();
        $modelU = new utilisateurModel();
        $controlU = new Utilisateur();
        $session = $session = \Config\Services::session();
        if(!$id_debut) $id_debut = 0;
        if(!$nbAnnonces) $nbAnnonces = 15;
        //Si on recherche les annonces d'un utilisateur, on vérifie que son mail est valide
        //Si admin veut voir annonce de quelqu'un ajouter fait pouvoir bloquer
        if($type==="accueil"){
        $lAnnonces = $modelA->getAnnonce();
        $lAnnonces = $this->arrDateFormat( $this->getTypeAnnonce($lAnnonces,"publiée") ); 
        
        if( count($lAnnonces)===0)
        {
            $this->notifPasAnnonces();
        }
        }
        //if($type==="accueil") service('SmartyEngine')->view('liste_annonce.tpl');
        

        else if($type==="all")
        {
            //affichage du champ de recherche avec les valeurs spécifiques dedans
            $lAnnonces = $modelA->getAnnonce();
            $lAnnonces = $this->arrDateFormat( $this->getTypeAnnonce($lAnnonces,"publiée") );
            $var["totAnnonce"] = count($lAnnonces);
            $whereCond = $this->whereReqChamps($lAnnonces);
            $lAnnonces = ($modelA->searchAnnonce($whereCond) !== NULL) ? $this->getTypeAnnonce($modelA->searchAnnonce($whereCond),"publiée" ) : array();
            $var["totAnnonceTrouvees"] = count($lAnnonces);
            service('SmartyEngine')->assign('var',$var);
            $modelE = new energieModel();
            $energie = $modelE->getEnergie();
            service('SmartyEngine')->assign('energie',$energie);

            //affichage des boutons si nbAnnonces>15
            if(count($lAnnonces)>15)
                $this->assignButton($lAnnonces,$id_debut,$nbAnnonces);
        }

        

        $lConcatAnn = [] ;
        //affichage des annonces avec bornes passées en paramètres
        $modelP = new photoModel();
        for($i=0; $i<$nbAnnonces && $i+$id_debut<count($lAnnonces); ++$i)
        {
            $lConcatAnn[$i] = $lAnnonces[$i+$id_debut];
            $lPhoto = [];
            array_push( $lPhoto , $modelP->getPhoto($lConcatAnn[$i]['A_idannonce']));
            if(isset($lPhoto[0][0]))  //Ajoute la miniature si une photo est définit pour l'annonce
                $lConcatAnn[$i]["P_photo"] = $lPhoto[0][0];  
        }
        

        service('SmartyEngine')->assign('liste_annonce',$lConcatAnn);
        service('SmartyEngine')->assign('session',$session);
        service('SmartyEngine')->view('liste_annonce.tpl');
        
        


    }

    public function notifPasAnnonces()
    {
        return $this->loadNotif('error', "Il n'y a pas encore d'annonces sur ce site");
    }

    public function viewListe(int $id_debut=0,int $nbAnnonces=15,$annUti=false)
    {
        $session = \Config\Services::session();
        $modelA = new annonceModel();
        $lAnnonces = $modelA->getAnnonce();
        $lAnnonces = $this->getTypeAnnonce($lAnnonces,"publiée"); 

        if(!$annUti)
        {
            
            $modelE = new energieModel();
            $energie = $modelE->getEnergie();
            
            //return $this->returnError( var_dump( $modelA->searchAnnonce($recherche)), 'connexion' );
            
            $var["totAnnonce"] = count($lAnnonces);
            $whereCond = $this->whereReqChamps($lAnnonces);
            if( $modelA->searchAnnonce($whereCond) !== NULL)
            {
                $lAnnonces = $this->getTypeAnnonce($modelA->searchAnnonce($whereCond),"publiée" );
            }
            else
            {
                $lAnnonces = array();
            }
            $var["totAnnonceTrouvees"] = count($lAnnonces);
            service('SmartyEngine')->assign('var',$var);
            service('SmartyEngine')->assign('energie',$energie);

        }
        else
        { 
            $lAnnonces = $modelA->getAnnonceUti($annUti);
            $lAnnonces = !empty($session->get("admin")) ? $lAnnonces : $this->getTypeAnnonce($lAnnonces, "débloquée");
            $nbAnnonces = count($lAnnonces);
        }

        if(count($lAnnonces)===0)  //Affichage du message de warning si pas d'annonces dans la BDD
        {
            $controlP = new Pages();
            $controlP->affNotif('error',"Pas d'annonce dans la BDD");
        }
        else{
        //$nbAnnonces = count($lAnnonces);
        //Modification de la variable id_debut si dépassement du nombre d'annonce ou borne trop petite
        if($nbAnnonces > 15)
            if($id_debut>count($lAnnonces) - count($lAnnonces)%$nbAnnonces ) $id_debut = count($lAnnonces) - count($lAnnonces)%$nbAnnonces;

            if(count($lAnnonces)>15)  //On affiche les boutons pour switch d'annonce si le nombre est supérieur à 15 et différent page accueil
            { 
                $lBoutons = [] ;
                $debut = 0;

                //Gestion des boutons en fonction du nombre d'annonces
                if($nbAnnonces>5)
                {
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
            }
        }
        //Gestion des dates pour chaque annonce
        $lConcatAnn = [] ;
        //affichage des annonces avec bornes passées en paramètres
        $modelP = new photoModel();
        for($i=0; $i<$nbAnnonces && $i+$id_debut<count($lAnnonces); ++$i)
        {
            $lConcatAnn[$i] = $lAnnonces[$i+$id_debut];
            $lConcatAnn[$i]['A_date_maj'] = $this->dateFormat($lConcatAnn[$i]['A_date_maj']);
            $photo = [];
            array_push( $photo , $modelP->getPhoto($lConcatAnn[$i]['A_idannonce']));
            if(isset($photo[0][0]))
                $lConcatAnn[$i]["P_photo"] = $photo[0][0];
            //return $this->returnError((gettype($photo[0][0])) , 'connexion');
        }
    
        //return $this->returnError($nbAnnonces." ". count($lAnnonces)." ".$id_debut ,'connexion');
        service('SmartyEngine')->assign('liste_annonce',$lConcatAnn);
        service('SmartyEngine')->assign('nb_annonces',count($lAnnonces));
        service('SmartyEngine')->assign('session',$session);
        return service('SmartyEngine')->view('liste_annonce.tpl');
    }

    public function toutesAnnonces(int $id_debut=0,int $nbAnnonces=15)
    {
        $session = \Config\Services::session();
        if($id_debut===false) $id_debut = 0;
        if($nbAnnonces===false) $nbAnnonces = 15;  //15 annonces affichés par page par défaut

        $modelA = new annonceModel();
        $lAnnonces = $this->getTypeAnnonce( $modelA->getAnnonce(), "publiée");
        $var["totAnnonce"] = count($lAnnonces);
        if($this->lAnnonceVide($lAnnonces))
        {
            $this->notifPasAnnonces();
            return $this->accueil();
        }
        $whereCond = $this->whereReqChamps($lAnnonces);
        if( $modelA->searchAnnonce($whereCond) !== NULL)
        {
            $lAnnonces = $this->getTypeAnnonce($modelA->searchAnnonce($whereCond),"publiée" );
        }
        else
        {
            $lAnnonces = array();
        } 

        if($id_debut>count($lAnnonces) - count($lAnnonces)%$nbAnnonces ) $id_debut = count($lAnnonces) - count($lAnnonces)%$nbAnnonces;
        
        $var["totAnnonceTrouvees"] = count($lAnnonces);
        //Setup des boutons
        //affichage des boutons si nbAnnonces>15
        
        $this->assignButton($lAnnonces,$id_debut,$nbAnnonces);
        if( $this->lAnnonceVide($lAnnonces))
        {
            $controllerP = new Pages();
            $controllerP->affNotif('error',"Il n'y a pas d'annonces correspondant à votre recherche",'recherche');
        } 
        else
        $lAnnonces = $this->annoncesBornees($lAnnonces,$id_debut,$nbAnnonces);
        $lAnnonces = $this->arrDateFormat( $this->addPhotoArrAnnonce( $lAnnonces ) );

        $modelE = new energieModel();
        $energie = $modelE->getEnergie();
        $var["annonceSurPages"] = count($lAnnonces);
        service('SmartyEngine')->assign('energie',$energie);
        service('SmartyEngine')->assign('var',$var);
        service('SmartyEngine')->assign('liste_annonce',$lAnnonces);
        return service('SmartyEngine')->view('recherche_annonce.tpl');
    }

    public function addPhotoArrAnnonce($lAnnonces)
    {
        $newLAnn = [];
        $modelP = new photoModel();
        for($i=0; $i<count($lAnnonces); ++$i)
        {
            $photo = [];
            $newLAnn[$i] = $lAnnonces[$i];
            array_push( $photo , $modelP->getPhoto($lAnnonces[$i]['A_idannonce']));
            if(isset($photo[0][0]))
                $newLAnn[$i]["P_photo"] = $photo[0][0];
        }
        return $newLAnn;
    }

    public function annoncesBornees($lAnnonces, $id_debut, $nbAnnonces):array  //Renvoie les dernières annonces entre 2 bornes
    {
        $modelP = new photoModel(); 
        for($i=0; $i<$nbAnnonces && $i+$id_debut<count($lAnnonces); ++$i)
        {
            $lConcatAnn[$i] = $lAnnonces[$i+$id_debut];

            $photo = [];
            array_push( $photo , $modelP->getPhoto($lConcatAnn[$i]['A_idannonce']));
            if(isset($photo[0][0]))
                $lConcatAnn[$i]["P_photo"] = $photo[0][0];
        }
        return $lConcatAnn;
    }

    public function accueil()
    {
        $session = \Config\Services::session();
        $controllerU = new Utilisateur();
        if(! $controllerU->existeAdmin())
            return service('SmartyEngine')->view('create_admin.tpl');

        $modelA = new annonceModel();
        $lAnnonces = $this->getTypeAnnonce( $modelA->getAnnonce(), "publiée");
        if($this->lAnnonceVide($lAnnonces))
        {
            $controlP = new Pages();
            $controlP->affNotif('error', "pas encore d'annonces publiées sur le site");
        }
        else
        {
            $lAnnonces = $this->annoncesBornees($lAnnonces,0,6);
            $lAnnonces = $this->arrDateFormat( $this->addPhotoArrAnnonce( $lAnnonces ) );
        }
        
        service('SmartyEngine')->assign('liste_annonce',$lAnnonces);
        service('SmartyEngine')->assign('estAccueil',true);
        return service('SmartyEngine')->view('accueil.tpl');
    }

    public function mesAnnonces($mail=false)
    {
        $session = \Config\Services::session();
        service('SmartyEngine')->assign('mesAnnonces',true);
        $controllerU = new Utilisateur();
        //vérifie si l'utilisateur est connecté
        if(! $controllerU->estConnecte() )
        {
            $controlP = new Pages();
            $controlP->affNotif("error","Vous devez être connecté pour accéder à vos annonces", "/pages/view/connexion");
            return service('SmartyEngine')->view('connexion.tpl');
        }
        $modelA = new annonceModel();

        if($mail!==false && $controllerU->estAdmin())
        {
            $modelU = new utilisateurModel();
            if( ! $controllerU->existeUti( $mail ) )
            {
                $controlP->affNotif("error", "L'utilisateur demandé n'existe pas");
                $mail = $session->get("mail");
            }
            else
            {
                service('SmartyEngine')->assign('affBoutonsAdmin',true);
            }
        }
        else
        {
            $mail = $session->get("mail");
        }

        $lAnnonces = $modelA->getAnnonceUti($mail);
        $lAnnonces = $this->arrDateFormat( $this->addPhotoArrAnnonce( $lAnnonces ) );
        service('SmartyEngine')->assign('liste_annonce',$lAnnonces);
        return service('SmartyEngine')->view('mes_annonces.tpl');  
    }

    public function annoncesUti($mail)
    {

        $controllerU = new Utilisateur();
        if( ! $controllerU->existeUti( $mail ) )
        {
            $controlP->affNotif("error", "L'utilisateur demandé n'existe pas");
            return $controllerU->view("espace_admin");
        }
        else
        {
            $modelU = new utilisateurModel();
            $uti = $modelU->getUtilisateur($mail);
            $tabVoyelle = [ 'a', 'e', 'i', 'y', 'o', 'u'];
            //Test de voyelles pour le d'
            $det="de ";
            $fLet = strtolower(substr($uti["U_pseudo"],0,1));
            for ($i=0; $i < count($tabVoyelle); ++$i) { 
                
                if( $fLet === $tabVoyelle[$i] )
                {
                    $det = "d'";
                    break;
                }
            }
            service('SmartyEngine')->assign('titrePara',"Annonces $det".$uti["U_pseudo"]);
            return $this->mesAnnonces($mail);
        }
        
    }

    
}
?>