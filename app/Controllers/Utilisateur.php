<?php namespace App\Controllers;

use App\Models\utilisateurModel;
use CodeIgniter\Controller;
use App\Controllers\Annonce;
use App\Models\annonceModel;
use App\Controllers\Mail;
use App\Controllers\Pages;

class Utilisateur extends Controller
{
    public function index()
    {
        $model = new utilisateurModel();
    }

    public function sontMdpEgaux($mdp1, $mdp2):bool
    {
        return $mdp1 === $mdp2;
    }

    public function existeAdmin()
    {
        $model = new utilisateurModel();
        $admin = $model->getUtilisateur("admin");
        return ! empty($admin);
    }

    public function existeUti($mail):bool
    {
        $model = new utilisateurModel();
        $uti = $model->getUtilisateur($mail);
        //var_dump(!empty($uti));
        return ! empty($uti);
    }

    public function estAdmin():bool
    {
        $session = \Config\Services::session();
        $estAdmin = $session->get('admin')===NULL ? false : true;
        //var_dump( $estAdmin );
        return $estAdmin;
    }

    public function annonceAppartientUti($annonce,$uti):bool
    {
        return $annonce["U_mail"] = $uti["U_mail"];
    }

    public function estDansMessagerie($mail,$mail2):bool
    {
        $session = \Config\Services::session();
        return $session->get('mail') === $mail || $session->get('mail') === $mail2;
    }

    public function estConnecte():bool
    {
        $session = \Config\Services::session();
        $estConnecte = ($session->get("mail")!==null) ? true : false;
        //var_dump($estConnecte);
        return $estConnecte;
    }



    public function returnError($error,$view)
    {
        service('SmartyEngine')->assign('error',$error);
        return service('SmartyEngine')->view($view.'.tpl');
    }

    public function delete($confirm=false)
    {
        $session = \Config\Services::session();
        service('SmartyEngine')->assign('session',$session);
        $controllerA = new Annonce();
        if( $session->get("mail") === null)
        {
            $notif = array(
                "type" => "error",
                "titre" => "Erreur",
                "message" => "Vous devez etre connecté pour supprimer un compte !"
            );
            return $controllerA->returnNotif($notif,false);
        }
        
        if($confirm===false)
        {
            service('SmartyEngine')->assign('confirmation',true);
            return service('SmartyEngine')->view('edition_profil');
        }

        //Suppression de toutes les annonces de l'utilisateur
        $modelA = new annonceModel();
        $controllerP = new Photo();
        $lAnnonce = $modelA->getAnnonceUti($session->get("mail"));
        foreach($lAnnonce as $annonce)
        {
            $controllerP->delete($annonce["A_idannonce"]);
            $modelA->deleteAnnonce($annonce["A_idannonce"]);
        }

        //Envoi d'un mail à l'utilisateur pour lui dire que son compte à bien été supprimé
        $controllerM = new Mail();
        $modelU = new utilisateurModel();
        $controllerM->mailDelAccount($modelU->getUtilisateur($session->get("mail")));

        //Suppression du compte
        $modelU->deleteUtilisateur($session->get("mail"));
        $notif = array(
            "type" => "success",
            "titre" => "Success",
            "message" => "Votre compte à bien été supprimé"
        );

        $session->destroy();
        service('SmartyEngine')->assign('session',$session);
        return redirect()->to('/');
        return $controllerA->returnNotif($notif,false);
    }

    public function create($admin=false)
    {
        helper(['form','url']);

        $user = $this->validate([
                'mail' => 'required',
                'nom' => 'required',
                'prenom' => 'required',
                'pseudo' => 'required',
                'password' => 'required',
                'confirmation' => 'required'
                ]);

        if($user)
        {
            $mdp = $this->request->getVar('password');
            $confirmation = $this->request->getVar('confirmation');

            if($this->sontMdpEgaux($mdp,$confirmation))
            {
                $data['mail'] = $this->request->getVar('mail');
                $model = new utilisateurModel();
                if(!$model->getUtilisateur($data['mail']))
                {
                    $data['pseudo'] = $this->request->getVar('pseudo');
                    $data['nom'] = $this->request->getVar('nom');
                    $data['prenom'] = $this->request->getVar('prenom');
                    //var_dump($data);
                    if($this->existeAdmin())
                        $model->insertUtilisateur($data['mail'], $mdp, $data['pseudo'], $data['nom'], $data['prenom']);
                    else{
                        $model->insertUtilisateur($data['mail'], $mdp, $data['pseudo'], $data['nom'], $data['prenom'], true);
                        $data["admin"] = true;
                    }
                    $controllerA = new Annonce();
                    $session = \Config\Services::session();
                    $session->set($data);
                    $controllerM = new Mail();
                    $modelU = new utilisateurModel();
                    $controllerM->createAccount($modelU->getUtilisateur($data['mail']));
                    
                    $notif = array(
                        "type" => "success",
                        "titre" => "Success",
                        "message" => "Votre compte à bien été crée"
                    );
                    service('SmartyEngine')->assign('session',$session);
                    return redirect()->to('/');
                }
                else
                {
                    return $this->returnError('Cette adresse mail existe déjà','inscription');
                }
            }  
            else
            {
                return $this->returnError('Les mots de passes ne correspondent pas','inscription');
            }
        }
        else
        {
            return $this->returnError('Veuillez vous connecter pour effectuer cette action','connexion');
        }   
    }

   
    public function connect()
    {
        helper(['form','url']);

        $user = $this->validate([
                'mail' => 'required',
                'password' => 'required'
                ]);
    
        if ($user)
        {
            $mail = $this->request->getVar('mail');
            $mdp = $this->request->getVar('password');

            $model = new utilisateurModel();
            $res = $model->getUtilisateur($mail);
            if( ! empty($res) && $res["U_mdp"] === sha1($mdp) ) 
            {
                $data['mail'] = $mail; //Initialisations des variables de sessions
                $data['pseudo'] = $res["U_pseudo"];
                $data['nom'] = $res["U_nom"];
                $data['prenom'] = $res["U_prenom"];
                if ($res["U_estAdmin"] == true) $data['admin'] = true;
                $session = \Config\Services::session();
                $session->set($data);
                service('SmartyEngine')->assign('session',$session);
                return redirect()->to('/');
            }
            else
            {
                return $this->returnError('Le mail ou le mot de passe est incorrect','connexion');
            }
        }
        else
        {
            return $this->returnError('Veuillez vous connecter pour effectuer cette action','connexion');
        }
    }  

    public function update()
    {
        helper(['form','url']);

        $user = $this->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'pseudo' => 'required',
            'password' => 'required'
            ]);

        $session = \Config\Services::session();   
        if ($user)
        {
            $mdp = $this->request->getVar('password');
            $confirmation = $this->request->getVar('confirmation');
            $newMdp = $this->request->getVar('new-password');
            $model = new utilisateurModel();
            $res = $model->getUtilisateur($session->get("mail"));
            if(! $this->sontMdpEgaux(sha1($mdp),$res["U_mdp"])) $this->returnError('Le mot de passe est incorrect','edition_profil');
            else if(! $this->sontMdpEgaux($confirmation,$newMdp)) $this->returnError('Le nouveau mot de passe n\'a pas été bien ressaisit','edition_profil');
            else if($this->sontMdpEgaux($mdp,$newMdp)) $this->returnError('Le nouveau mot de passe ressemble trop à l\'ancien','edition_profil');
            else  if($this->sontMdpEgaux(sha1($mdp),$res["U_mdp"]) && $this->sontMdpEgaux($confirmation,$newMdp)) //Le mdp est bon et les 2 nouveaux mots de passes sont égaux
            {
                $data['pseudo'] = $this->request->getVar('pseudo'); 
                $data['nom'] = $this->request->getVar('nom');
                $data['prenom'] = $this->request->getVar('prenom');
                
                if(! empty($newMdp)) $mdp = $newMdp; //Pour garder le même mdp quand on enregistre le formulaire
                $model->updateUtilisateur($session->get("mail"), $mdp, $data['pseudo'], $data['nom'] , $data['prenom']);
                $session->set($data); 

                //Envoi du mail de d'information
                $controllerM = new Mail();
                $controllerM->accountModified($res, !empty($session->get("admin")) );

                service('SmartyEngine')->assign('succes','Profil mis à jour !');
                service('SmartyEngine')->assign('session',$session);
                //service('SmartyEngine')->view('edition_profil');
            }

        }
        else
        {
            return $this->returnError('Veuillez vous connecter pour effectuer cette action','connexion');
        }
    }


    public function view($page,$mail=false)
    {
        $session = \Config\Services::session();
        $modelU = new utilisateurModel();
        $controlP = new Pages();
        if($page==="espace_admin")  //vérification si admin pour accéder à l'espace administrateur
        {
            if (!$this->estAdmin()){
                $controlP->affNotif("error","Vous devez disposer des droits administrateurs pour effectuer cette action");
                $controlA = new Annonce();
                return $controlA->accueil();
            }
                //return $this->returnError('Vous devez disposer des droits administrateurs pour effectuer cette action','connexion');

            
            $modelA = new annonceModel();
            $controllerA = new Annonce();
            $lUtilisateurs = $modelU->getUtilisateur();
            $lAnnonce = $controllerA->arrDateFormat( $controllerA->getTypeAnnonce( $modelA->getAnnonce(), "bloquée" ) );
            service('SmartyEngine')->assign('liste_annonce',$lAnnonce);
            service('SmartyEngine')->assign('liste_utilisateur',$lUtilisateurs);

            
        } 
        else if($page==="edition_profil")
        {
            if ($session->get("admin")!==true && $mail!==false && $mail!==$session->get("mail"))
                return $this->returnError('Vous devez disposer des droits administrateurs pour effectuer cette action','connexion');
        
            if($mail!==false){
                $utilisateur = $modelU->getUtilisateur($mail);
                service('SmartyEngine')->assign('uti',$utilisateur);
            }
            
        }   
        return service('SmartyEngine')->view($page.'.tpl');   
    }
}
?>