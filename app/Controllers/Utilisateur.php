<?php namespace App\Controllers;

use App\Models\utilisateurModel;
use CodeIgniter\Controller;

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

    public function returnError($error,$view)
    {
        service('SmartyEngine')->assign('error',$error);
        return service('SmartyEngine')->view($view.'.tpl');
    }

    public function create()
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
                    
                    $model->insertUtilisateur($data['mail'], $mdp, $data['pseudo'], $data['nom'], $data['prenom']);

                    $session = \Config\Services::session();
                    $session->set($data);
                    service('SmartyEngine')->assign('session',$session);
                    return service('SmartyEngine')->view('liste_annonce.tpl');
                }
                else
                {
                    $this->returnError('Cette adresse mail existe déjà','inscription');
                }
            }  
            else
            {
                $this->returnError('Les mots de passes ne correspondent pas','inscription');
            }
        }
        else
        {
            $this->returnError('Veuillez vous connecter pour effectuer cette action','connexion');
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

                $session = \Config\Services::session();
                $session->set($data);
                service('SmartyEngine')->assign('session',$session);
                return redirect()->to('/');
            }
            else
            {
                $this->returnError('Le mail ou le mot de passe est incorrect','connexion');
            }
        }
        else
        {
            $this->returnError('Veuillez vous connecter pour effectuer cette action','connexion');
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
                service('SmartyEngine')->assign('succes','Profil mis à jour !');
                service('SmartyEngine')->assign('session',$session);
                service('SmartyEngine')->view('edition_profil.tpl');
            }

        }
        else
        {
            $this->returnError('Veuillez vous connecter pour effectuer cette action','connexion');
        }
    }
}
?>