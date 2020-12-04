<?php namespace App\Controllers;

use App\Models\annonceModel;
use App\Models\energieModel;
use App\Models\utilisateurModel;
use CodeIgniter\Controller;

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
                        # code...
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

    public function create()
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
        if($annonceVal['U_mail'] !== $session->get("mail") || $session->get("mail") === null ) return $this->returnError('Vous n\'avez pa le droit d\'éditer cette annonce','nouvelle_annonce');
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
                        # code...
                    }   
                    
                    $modelE->insertEnergie($energie);
                    

                }
            }  
            $model->insertAnnonce($annonce);
            service('SmartyEngine')->assign('succes','Annonce insérée avec succes');
            return service('SmartyEngine')->view('connexion.tpl');  
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
        service('SmartyEngine')->assign('session',$session);
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
            $numMois =  substr($annonce['A_date_maj'],5,2);
            $tabMois = array("Janvier","Févrirer","Mars","Avril","Mai","Juin",'Juillet','Août','Septembre','Octobre','Novembre','Décembre');
            $dateFormat = substr($annonce['A_date_maj'],8,2).' '.$tabMois[$numMois-1].' à '.substr($annonce['A_date_maj'],11,2).'h'.substr($annonce['A_date_maj'],14,2);
            service('SmartyEngine')->assign('dateFormat',$dateFormat);

            //Gestion du propriétaire 
            $modelU = new utilisateurModel();
            $proprio = $modelU->getUtilisateur($annonce['U_mail']);
            service('SmartyEngine')->assign('proprio',$proprio);
        }
        
        if($page==='edition_annonce')
        {
            $annonce['A_etat'] = 'en cours';
            $modelA->updateAnnonce($annonce);
        }
        service('SmartyEngine')->assign('annonce',$annonce);
        return service('SmartyEngine')->view($page.'.tpl');
        
    }

    public function viewListe($id_debut=false,$nbAnnonces=false)
    {
        $session = \Config\Services::session();
        $modelA = new annonceModel();
        $annonce = $modelA->getAnnonce();

        //Gestion des dates
        $tabMois = array("Janvier","Févrirer","Mars","Avril","Mai","Juin",'Juillet','Août','Septembre','Octobre','Novembre','Décembre');
            
        for($i=0; $i<count($annonce); ++$i)
        {
            $numMois =  substr($annonce[$i]['A_date_maj'],5,2);
            $dateFormat = substr($annonce[$i]['A_date_maj'],8,2).' '.$tabMois[$numMois-1].' à '.substr($annonce[$i]['A_date_maj'],11,2).'h'.substr($annonce[$i]['A_date_maj'],14,2);
            $annonce[$i]['A_date_maj'] = $dateFormat;
        }
        service('SmartyEngine')->assign('dateFormat',$dateFormat);
        service('SmartyEngine')->assign('liste_annonce',$annonce);
        service('SmartyEngine')->assign('session',$session);
        return service('SmartyEngine')->view('liste_annonce.tpl');
    }
}
?>