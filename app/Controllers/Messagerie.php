<?php namespace App\Controllers;

use App\Models\messagerieModel;
use App\Models\annonceModel;
use App\Models\utilisateurModel;
use App\Controllers\Pages;
use CodeIgniter\Controller;

class Messagerie extends Controller
{
    public function returnError($error,$view)
    {
        service('SmartyEngine')->assign('error',$error);
        return service('SmartyEngine')->view($view.'.tpl');
    }

    public function create($id_annonce, $mail, $mail2)
    {
        helper(['form', 'url']);
        $modelUser = new utilisateurModel();
        $modelAnnonce = new annonceModel();
        $annonce = $modelAnnonce->getAnnonce($id_annonce);
        $messagerieVal = $this->validate([
            'message' => 'required'
         ]);
        $session = \Config\Services::session();
        if($session->get("mail") === null ) return $this->returnError('vous devez être connecté pour envoyer un message','connexion'); {
            if($messagerieVal) 
            {
                $messagerie = [];
                $messagerie['A_idannonce'] = $id_annonce;
                $messagerie['U_mail'] = $session->get("mail");
                if(empty($this->getMessage($id_annonce,  $mail, $mail2))) {
                    $messagerie['A_mail'] = $annonce['U_mail'];
                } else {
                    $tmp = $this->getMessage($id_annonce,  $mail, $mail2);
                    $mess = end($tmp);
                    if($mess['U_mail'] === $session->get("mail")) $messagerie['A_mail'] = $mess['A_mail'];
                    else $messagerie['A_mail'] = $mess['U_mail'];
                }
                $messagerie['M_texte_message'] = $this->request->getVar('message');
                date_default_timezone_set('Europe/Paris');
                $messagerie['M_dateheure_message'] = date('Y-m-d H:i:s');  
                $model = new messagerieModel();                     
                $model->insertMessagerie($messagerie);  
            }
        }
        $modelAnnonce = new annonceModel();
        $annonce = $modelAnnonce->getAnnonce($id_annonce);

        return redirect()->to("/messagerie/view/$id_annonce/$mail/$mail2");
    }
    public function createConv($mail)
    {
        helper(['form', 'url']);
        $session = \Config\Services::session();
        $controlP = new Pages();
        $annonce = new Annonce();
        if($session->get("mail") === null) {
            $controlP->affNotif("error","Vous devez être connecté pour accèder à vos messages !","/pages/view/connexion");
            return $annonce->accueil(); 
        } 
        $controlP = new Pages();
        if($mail != $session->get("mail")) {
            $tmp = $session->get("mail");
            $controlP->affNotif("error","Vous n'avez pas accès à cette page !","/messagerie/createConv/$tmp");
            return $this->createConv($session->get("mail")); 
        }
        service('SmartyEngine')->assign('convs',$this->getConv($mail));
        return service('SmartyEngine')->view('liste_messagerie.tpl');  
    }

    public function view($id_annonce, $mail, $mail2) {
        $controllerU = new Utilisateur();
        $controlP = new Pages();
        $session = \Config\Services::session();
        if(!$controllerU->estDansMessagerie($mail, $mail2)) {
            $tmp = $session->get("mail");
            $controlP->affNotif("error","Vous n'avez pas accès à cette messagerie !","/messagerie/createConv/$tmp");
            return $this->createConv($session->get("mail"));            
        }
        $modelUser = new utilisateurModel();
        $messagerie = new messagerieModel();
        $modelAnnonce = new annonceModel();

        if(empty($modelUser->getUtilisateur($mail)) || empty($modelUser->getUtilisateur($mail2))) {
            $tmp = $session->get("mail");
            $controlP->affNotif("error","Un des utilisateurs n'est pas répertorié !","/messagerie/createConv/$tmp");
            return $this->createConv($session->get("mail")); 
        }
        
        $annonce = $modelAnnonce->getAnnonce($id_annonce);  
        
        if(!($id_annonce!==false && gettype($annonce)==='array' && empty($annonce['A_idannonce'])!==1)) //Lance une erreur si annonce n'existe pas pour édition où la vue
        {
            $controlP = new Pages();
            $tmp = $session->get("mail");
            $controlP->affNotif("error","L'annonce est introuvable !", "/messagerie/createConv/$tmp");
            return $this->createConv($session->get("mail"));  
        }

        if($annonce['U_mail']!=$mail && $annonce['U_mail']!=$mail2) {
            $tmp = $session->get("mail");
            $controlP->affNotif("error","L'annonce n'appartient à aucun des 2 utilisateurs !","/messagerie/createConv/$tmp");
            return $this->createConv($session->get("mail"));
        }

        if( $session->get("mail") === null ) return $this->returnError('Vous devez être connecté pour envoyer un message','connexion');
        


        service('SmartyEngine')->assign('annonce',$annonce);
        service('SmartyEngine')->assign('messages',$this->getMessage($id_annonce, $mail, $mail2));
        service('SmartyEngine')->assign('user',$modelUser->getUtilisateur($mail));
        service('SmartyEngine')->assign('mail',$mail2);
        return service('SmartyEngine')->view('messagerie.tpl');     
    }

    public function getMessage($id_annonce, $mail, $mail2) {
        $modelMessagerie = new messagerieModel();
        $allMessages = $modelMessagerie->getMessage($id_annonce, $mail, $mail2);
        return $this->arrDateFormat($allMessages);
    }

    public function getConv($mail) {
        $modelMessagerie = new messagerieModel();
        $allConv = $modelMessagerie->getConv($mail);        
        $liste = [];
        $bool = false;        
        foreach ($allConv as $mess) {
            $case = [];
            if(!empty($liste)) {
                foreach($liste as $c) {
                    if($mess['A_idannonce'] === $c['id'] && ($c['mail'] == $mess['A_mail'] || $c['mail'] == $mess['U_mail'])) $bool = true;
                }
            }

            if(!$bool) { 
                $case['id'] = $mess['A_idannonce'];
                if($mail === $mess['A_mail']) $case['mail'] = $mess['U_mail'];
                else $case['mail'] = $mess['A_mail'];
                $liste[] = $case;
            }
                  
            $bool = false;      
        }
        //var_dump($allConv);
        $modelAnnonce = new annonceModel();
        $mess = [];
        $convs = [];
        $model = new messagerieModel();
        $modelUser = new utilisateurModel(); 
        foreach ($liste as $l) {
            
            $tmp = $model->getMessage($l['id'], $mail, $l['mail']);
            if(!empty($tmp)) {
                $case = [];
                $mess = end($tmp);
                $case['last'] = $mess['M_texte_message'];
                $annonce = $modelAnnonce->getAnnonce($l['id']);
                if($mail === $mess['A_mail']) $case['mail'] = $mess['U_mail'];
                else $case['mail'] = $mess['A_mail'];
                if($annonce['U_mail'] === $mail) $case['state'] = 'Client';
                else $case['state'] = 'Propriétaire';
                $case['title'] = $annonce['A_titre'];
                $user = $modelUser->getUtilisateur($case['mail']);
                if(!empty($user)) $case['pseudo'] = $user['U_pseudo'];
                $session = \Config\Services::session();
                $case['lien'] = "/messagerie/view/{$annonce['A_idannonce']}/{$case['mail']}/{$session->get('mail')}";
                $convs[] = $case;  
            }
                      
        }
        return $convs;
    }

    public function arrDateFormat(array $lMessage)
    {
        $lMessageFormat = [];
        foreach($lMessage as $message)
        {
            $message["M_dateheure_message"] = $this->dateFormat($message["M_dateheure_message"]);
            array_push($lMessageFormat, $message); 
        }
        return $lMessageFormat;
    }

    public function dateFormat(string $date):string
    {
        $tabMois = array("Janvier","Févrirer","Mars","Avril","Mai","Juin",'Juillet','Août','Septembre','Octobre','Novembre','Décembre');
        $numMois =  substr($date,5,2);
        return substr($date,8,2).' '.$tabMois[$numMois-1].' '.substr($date,0,4).' à '.substr($date,11,2).'h'.substr($date,14,2);  
    }
    public function delete($id_annonce)
    {
        $model = new messagerieModel();
        $model->deleteM($id_annonce);
        return redirect()->to("/annonce/view/$id_annonce"); 
    }
    
}
?>