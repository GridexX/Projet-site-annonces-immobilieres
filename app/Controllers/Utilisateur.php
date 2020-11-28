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
                $mail = $this->request->getVar('mail');
                $model = new utilisateurModel();
                if(!$model->getUtilisateur($mail))
                {
                    $pseudo = $this->request->getVar('pseudo');
                    $nom = $this->request->getVar('nom');
                    $prenom = $this->request->getVar('prenom');
                    
                    $model->insertUtilisateur($mail, $mdp, $pseudo, $nom, $prenom);
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
                return service('SmartyEngine')->view('liste_annonce.tpl');
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
            'password' => 'required',
            'new-password' => 'required',
            'confirmation' => 'required'
            ]);

        $session = \Config\Services::session();   
        if ($user)
        {
            $mdp = $this->request->getVar('password');
            $confirmation = $this->request->getVar('confirmation');
            $newMdp = $this->request->getVar('new-password');
            $model = new utilisateurModel();
            $res = $model->getUtilisateur($session->get("mail"));
            if($newMdp == $mdp) $this->returnError('Le nouveau mot de passe ressemble trop à l\'ancien','edition_profil');

            

            else if( sha1($mdp) !== $res["U_mdp"]) $this->returnError('Le mot de passe est incorrect','edition_profil');

            else if($this->sontMdpEgaux($newMdp,$confirmation))
            {
                $data['pseudo'] = $this->request->getVar('pseudo'); 
                $data['nom'] = $this->request->getVar('nom');
                $data['prenom'] = $this->request->getVar('prenom');
                

                $model->updateUtilisateur($session->get("mail"), $newMdp, $data['pseudo'], $data['nom'] , $data['prenom']);
                $session->set($data); 
                service('SmartyEngine')->assign('succes','Profil mis à jour !');
                service('SmartyEngine')->assign('session',$session);
                service('SmartyEngine')->view('edition_profil.tpl');
            }
            else
            {
                service('SmartyEngine')->assign('error','Les mots de passes ne sont pas identiques');
                return service('SmartyEngine')->view('edition_profil.tpl');
            }
        }
        else
        {
            $this->returnError('Veuillez vous connecter pour effectuer cette action','connexion');
        }
    }
}
?>