<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Pages extends Controller
{
    public function affNotif($type, $message, $lien=false)
    {
        $notification = array( "type" => $type, "message" => $message, "lien" => $lien);
        service('SmartyEngine')->assign('notification',$notification);
    }

    public function returnError($error,$view)
    {
        service('SmartyEngine')->assign('error',$error);
        return service('SmartyEngine')->view($view.'.tpl');
    }

    public function showNotif(string $type, string $message, string $page)
    {
        $notification = array( 
            "type" => $type,
            "titre" => ucfirst($type),
            "message" => $message
        );
        service('SmartyEngine')->assign('notification',$notification);
        return service('SmartyEngine')->view("$page.tpl");
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