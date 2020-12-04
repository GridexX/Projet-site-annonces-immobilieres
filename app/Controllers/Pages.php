<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Pages extends Controller
{

    /*
    $data = [
                'mail' => $session->get('mail'),
                'pseudo' => $session->get('pseudo'),
                'nom' => $session->get('nom'),
                'prenom' => $session->get('prenom') 
            ];
            if session.getMail != null //connecté
    */
    public function index()
    {
        $session = \Config\Services::session();
        service('SmartyEngine')->assign('session',$session);
        //echo view('templates/footer');
        return service('SmartyEngine')->view('connexion.tpl');
    }

    public function view($page = 'home')
    {
        $session = \Config\Services::session();
        service('SmartyEngine')->assign('session',$session);
        service('SmartyEngine')->assign('form_validation','\Config\Services::validation()->listErrors();');
        return service('SmartyEngine')->view($page.'.tpl',$session);
    }

    public function deconnexion()
    {
        $session = \Config\Services::session();
        $session->destroy();
        return redirect()->to('/');
    }
    
}