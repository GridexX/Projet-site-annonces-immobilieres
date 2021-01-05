<?php namespace App\Controllers;

use App\Models\messagerieModel;
use App\Models\annonceModel;
use App\Models\utilisateurModel;
use CodeIgniter\Controller;

class Messagerie extends Controller
{
    public function returnError($error,$view)
    {
        service('SmartyEngine')->assign('error',$error);
        return service('SmartyEngine')->view($view.'.tpl');
    }

    public function create($id_annonce)
    {
        helper(['form', 'url']);
        $modelUser = new utilisateurModel();
        $modelAnnonce = new annonceModel();
        $annonce = $modelAnnonce->getAnnonce($id_annonce);
        $model = new messagerieModel();  
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
                $messagerie['A_mail'] = $annonce['U_mail'];
                $messagerie['M_texte_message'] = $this->request->getVar('message');
                date_default_timezone_set('Europe/Paris');
                $messagerie['M_dateheure_message'] = date('Y-m-d H:i:s');                      
                $model->insertMessagerie($messagerie);  
            }
        }
        $modelAnnonce = new annonceModel();
        $annonce = $modelAnnonce->getAnnonce($id_annonce);
        service('SmartyEngine')->assign('annonce',$annonce);
        service('SmartyEngine')->assign('messages',$model->getMessage($id_annonce, $session->get("mail")));
        service('SmartyEngine')->assign('user',$modelUser->getUtilisateur($annonce['U_mail']));
        return service('SmartyEngine')->view('messagerie.tpl');  
    }
    public function createConv($mail)
    {
        helper(['form', 'url']);
        $model = new messagerieModel(); 
        $session = \Config\Services::session();
        service('SmartyEngine')->assign('convs',$model->getConv($mail));
        return service('SmartyEngine')->view('liste_messagerie.tpl');  
    }

    public function view($id_annonce) {
        $messagerie = new messagerieModel();
        $modelAnnonce = new annonceModel();
        $modelUser = new utilisateurModel();
        $annonce = $modelAnnonce->getAnnonce($id_annonce);

        $session = \Config\Services::session();
        if( $session->get("mail") === null ) return $this->returnError('Vous devez être connecté pour envoyer un message','connexion');
        $annonce = $modelAnnonce->getAnnonce($id_annonce);
        
        if(!($id_annonce!==false && gettype($annonce)==='array' && empty($annonce['A_idannonce'])!==1)) //Lance une erreur si annonce n'existe pas pour édition où la vue
            return $this->returnError('L\'annonce n\'a pas été trouvée','connexion');   
        
        service('SmartyEngine')->assign('annonce',$annonce);
        service('SmartyEngine')->assign('messages',$messagerie->getMessage($id_annonce, $session->get("mail")));
        $tmp = $messagerie->getMessage($id_annonce, $session->get("mail"));
        $mess = end($tmp);
        $mail = $annonce['U_mail'];
        if (!empty($mess)) {
            if($session->get("mail") === $mess['A_mail']) $mail = $mess['U_mail'];
            else $mail = $mess['A_mail'];
        }
        service('SmartyEngine')->assign('user',$modelUser->getUtilisateur($mail));
        return service('SmartyEngine')->view('messagerie.tpl');     
    }
}
?>