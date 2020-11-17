<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Pages extends Controller
{
    public function index()
    {
        service('SmartyEngine')->assign('titre','Accueil - Site petites annonces');
        //echo view('templates/footer');
        return service('SmartyEngine')->view('connexion.tpl');
    }

    public function view($page = 'home')
    {
        service('SmartyEngine')->assign('titre','Accueil - Site petites annonces');
        return service('SmartyEngine')->view($page.'.tpl');
    }
}