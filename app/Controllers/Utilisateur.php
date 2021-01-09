<?php namespace App\Controllers;

use App\Models\utilisateurModel;
use CodeIgniter\Controller;
use App\Controllers\Annonce;
use App\Models\annonceModel;
use App\Models\messagerieModel;
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

    public function delete($mail=false,$confirm=false)
    {
        $session = \Config\Services::session();
        service('SmartyEngine')->assign('session',$session);
        $controllerA = new Annonce();
        $controllerP = new Pages();
        if( !$this->estConnecte())
        {
            $controllerPa->affNotif('error','Vous devez etre connecté pour supprimer un compte !','/pages/view/connexion');
            return $controllerPa->view("connexion");
        }
        $adminDelAutre = $this->estAdmin() && $mail !== $session->get("mail");

        if(! $this->estAdmin() && $mail !== $session->get("mail"))  //empeche la suppression d'autre comptes
        {
            $controllerPa->affNotif('error',"Vous ne pouvez pas supprimer d'autres comptes !");
            return $this->view("edition_profil");
        }
        $modelU = new utilisateurModel();
        if($confirm===false)
        {
            service('SmartyEngine')->assign('uti', $modelU->getUtilisateur($mail) );
            service('SmartyEngine')->assign('confirmation',true);
            if($adminDelAutre)
                return $this->view("edition_profil",$mail);
            else
                return service('SmartyEngine')->view("edition_profil");
        }

        //Suppression de toutes les annonces de l'utilisateur
        $modelA = new annonceModel();
        $controllerP = new Photo();
        $lAnnonce = $modelA->getAnnonceUti($mail);
        $modelM = new messagerieModel();
        foreach($lAnnonce as $annonce)
        {
            $controllerP->delete($annonce["A_idannonce"]);  //Suppression des photos
            $modelM->deleteM($annonce["A_idannonce"]);  //Suppressions des messages
            $modelA->deleteAnnonce($annonce["A_idannonce"]);  //Suppression de l'annonce    
        }

        //Envoi d'un mail à l'utilisateur pour lui dire que son compte à bien été supprimé
        $controllerM = new Mail();
        $controllerM->delAccount($modelU->getUtilisateur($mail),$adminDelAutre);

        //Suppression du compte
        $modelU->deleteUtilisateur($mail);

        if(!$adminDelAutre)
        {
            $session->destroy();
            service('SmartyEngine')->assign('session',$session);
        }

        $controllerPa = new Pages();
        $controllerA = new Annonce();
        $msg = ($adminDelAutre) ? 'Ce compte' : 'Votre compte'; 
        $controllerPa->affNotif("success","$msg a bien été supprimé","/");
        return $controllerA->accueil();


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

    public function update2()
    {
        helper(['form','url']);
        $session = \Config\Services::session();  
        if( $this->estAdmin() && $session->get("mail")!==$this->request->getVar('mail') )  //Si admin edite un autre compte
        {
            $user = $this->validate([
                'nom' => 'required',
                'prenom' => 'required',
                'pseudo' => 'required',
                ]);
                $estRequeteVal=true;
        }   
        else
        {
            $user = $this->validate([
                'nom' => 'required',
                'prenom' => 'required',
                'pseudo' => 'required',
                'password' => 'required'
                ]);
                $estRequeteVal=false;
        }

        $controlP = new Pages();
        if ($user)
        {
            $mdp = $this->request->getVar('password');
            $confirmation = $this->request->getVar('confirmation');
            $newMdp = $this->request->getVar('new-password');
            $model = new utilisateurModel();
            $res = $model->getUtilisateur($session->get("mail"));

            
            //Si admin edite un autre compte
            if(!$estRequeteVal){
            if(! $this->sontMdpEgaux(sha1($mdp),$res["U_mdp"])) $this->returnError('Le mot de passe est incorrect','edition_profil');
            else if(! $this->sontMdpEgaux($confirmation,$newMdp)) $this->returnError('Le nouveau mot de passe n\'a pas été bien ressaisit','edition_profil');
            else if($this->sontMdpEgaux($mdp,$newMdp)) $this->returnError('Le nouveau mot de passe ressemble trop à l\'ancien','edition_profil');
            }
            //$this->sontMdpEgaux(sha1($mdp),$res["U_mdp"]) && $this->sontMdpEgaux($confirmation,$newMdp)
            else if( $estRequeteVal) //Le mdp est bon et les 2 nouveaux mots de passes sont égaux
            {
                $data['pseudo'] = $this->request->getVar('pseudo'); 
                $data['nom'] = $this->request->getVar('nom');
                $data['prenom'] = $this->request->getVar('prenom');
                
                if(! empty($newMdp)) $mdp = $this->estAdmin() && $session->get("mail")!==$this->request->getVar('mail') ? $res["U_mdp"] : sha1($newMdp); //Pour garder le même mdp quand on enregistre le formulaire

                $model->updateUtilisateur($session->get("mail"), $mdp, $data['pseudo'], $data['nom'] , $data['prenom']);
                $session->set($data); 

                //Envoi du mail de d'information
                $controllerM = new Mail();
                //$controllerM->accountModified($res, !empty($session->get("admin")) );
                var_dump("SESSION :",$session->get("mail"),"FORM:",$this->request->getVar('mail'));
                $controlA = new Annonce();
                $controlP->affNotif("success","Profil édité avec succès !");
                return ($this->estAdmin() && $session->get("mail")!==$this->request->getVar('mail') ) ?  $this->view("espace_admin") : $this->view("edition_profil");
            }

        }
        else
        {
            return $this->returnError('Veuillez vous connecter pour effectuer cette action','connexion');
        }
    }

    public function update($mail)
    {
        //Renvoie une erreur si l'utilisateur n'est pas admin et qu'il edit un autre profil
        helper(['form','url']);
        $session = \Config\Services::session();  
        $controllerP = new Pages();
        $modelU = new utilisateurModel();
        $uti = $modelU->getUtilisateur($mail);
        if( !$this->existeUti($mail))
        {
            $controllerP->affNotif('error',"Aucun utilisateur ne correspond à ce mail !");
            return $this->view("edition_profil");
        }
        if(! $this->estAdmin() && $mail!==$session->get('mail'))
        {
            $controllerP->affNotif('error',"Vous ne pouvez pas modifier un autre compte que le votre");
            return $this->view("edition_profil");
        }
        $adminModifUti = $this->estAdmin() && $session->get("mail")!==$mail;  //booléen pour savoir admin modif un autre compte
        //vérification du champ du mot de passe si user modifie son compte
        $user =  ($adminModifUti ) ? $this->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'pseudo' => 'required',
            ])
            : $this->validate([
                'nom' => 'required',
                'prenom' => 'required',
                'pseudo' => 'required',
                'password' => 'required'
            ]);
        
        //gestion des erreurs de mots de passe si c'est le cas
        $mdp = $this->request->getVar('password');
        $confirmation = $this->request->getVar('confirmation');
        $newMdp = $this->request->getVar('new-password');

        if(!$adminModifUti)
        {
            if(! $this->sontMdpEgaux(sha1($mdp),$uti["U_mdp"])) 
            {
                $controllerP->affNotif('error','Le mot de passe est incorrect','/utilisateur/view/edition_profil');
                return $this->view("edition_profil");
            }
            else if(! $this->sontMdpEgaux($confirmation,$newMdp)) 
            {
                $controllerP->affNotif('error','Les mots de passes ne correspondent pas','/utilisateur/view/edition_profil');
                return $this->view("edition_profil");
            }
            else if($this->sontMdpEgaux($mdp,$newMdp))
            {
                $controllerP->affNotif('error','Le nouveau mot de passe ressemble trop à l\'ancien','/utilisateur/view/edition_profil');
                return $this->view("edition_profil");
            }
        }
        if($user)  //Si la requête est valide
        {
            $data['U_pseudo'] = $this->request->getVar('pseudo'); 
            $data['U_nom'] = $this->request->getVar('nom');
            $data['U_prenom'] = $this->request->getVar('prenom');
            $data['U_mail'] = $mail;
            if( !$adminModifUti && !empty($newMdp) ) $data['U_mdp'] = sha1($newMdp);
            var_dump($data);
            $modelU->updateUtilisateur($data);
            if( !$adminModifUti)
            {
                $data['pseudo'] = $data['U_pseudo']; 
                $data['nom'] = $data['U_nom'];
                $data['prenom'] = $data['U_prenom'];
                $session->set($data);
                service('SmartyEngine')->assign('session',$session);
            }
            else
            {
                $uti['pseudo'] = $data['U_pseudo']; 
                $uti['nom'] = $data['U_nom'];
                $uti['prenom'] = $data['U_prenom'];
                service('SmartyEngine')->assign('uti',$uti);
            }
           
            $controllerM = new Mail();
            $controllerM->accountModified($data, $adminModifUti );
            $controllerP->affNotif("success","Profil édité avec succès !");
            return ( $adminModifUti ) ?  $this->view("espace_admin") : $this->view("edition_profil");
        
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
            $lAnnonce = $controllerA->arrDateFormat( $controllerA->addPhotoArrAnnonce($controllerA->getTypeAnnonce( $modelA->getAnnonce(), "bloquée" )) );
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