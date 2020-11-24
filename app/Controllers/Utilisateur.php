<?php namespace App\Controllers;

use App\Models\utilisateurModel;
use CodeIgniter\Controller;

class Utilisateur extends Controller
{
    public function index()
    {
        $model = new utilisateurModel();
    }

    
    public function create()
    {
        $model = new utilisateurModel();

        if ($this->request->getMethod() === 'post')
        {
            $mail = $this->request->getPost('mail');
            $mdp = $this->request->getPost('password');
            $pseudo = $this->request->getPost('pseudo');
            $nom = $this->request->getPost('nom');
            $prenom = $this->request->getPost('prenom');
            $model->insertUtilisateur($mail, $mdp, $pseudo, $nom, $prenom);
            service('SmartyEngine')->assign('titre','Accueil - Site petites annonces');
            return service('SmartyEngine')->view('annonce.tpl');
        }
        else
        {
            echo $this->request->getMethod();
            service('SmartyEngine')->assign('titre','Accueil - Site petites annonces');
            return service('SmartyEngine')->view('edition_annonce.tpl');
        }

    }

    public function connect()
    {
        $model = new utilisateurModel();

        if ($this->request->getMethod() === 'post')
        {
            $mail = $this->request->getPost('mail');
            $mdp = $this->request->getPost('password');
            $res = $model->getUtilisateur($mail, $mdp);
            if( ! empty($res))
            {
                service('SmartyEngine')->assign('titre','Accueil - Site petites annonces');
                return service('SmartyEngine')->view('annonce.tpl');
            }
            else { 
                service('SmartyEngine')->assign('error','Le mail ou le mot de passe est incorrect');
                service('SmartyEngine')->assign('titre','Accueil - Site petites annonces');
                return service('SmartyEngine')->view('connexion.tpl');
            }
        }
        else
        {
            service('SmartyEngine')->assign('error','La requête de connexion à échouée');
            service('SmartyEngine')->assign('titre','Accueil - Site petites annonces');
            return service('SmartyEngine')->view('connexion.tpl');
        }
    }
}
?>