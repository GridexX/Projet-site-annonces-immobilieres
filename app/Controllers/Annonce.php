<?php namespace App\Controllers;

use App\Models\utilisateurModel;
use CodeIgniter\Controller;

class Annonce extends Controller
{
    public function returnError($error,$view)
    {
        service('SmartyEngine')->assign('error',$error);
        return service('SmartyEngine')->view($view.'.tpl');
    }

    public function create()
    {
        $helper = (['form', 'url']);

        $annonce = $this->validate([
                   'titre' => 'required',
                   'type' => 'required',
                   'loyer' => 'required',
                   'charges' => 'required',
                   'chauffage' => 'required',
                   'perf_energie' => 'required',
                   'superficie' => 'required',
                   'meuble' => 'required',
                   'description' => 'required', 
                   'adresse' => 'required',
                   'ville' => 'required',
                   'cp' => 'required'
                ]);
        $session = \Config\Services::session();
        if($annonce && ! empty($session->get("mail")))
        {
            $titre = $this->request->getVar('mail');
            $type = $this->request->getVar('type');
            $loyer = $this->request->getVar('loyer');
            $charges = $this->request->getVar('charges');
            $chauffage = $this->request->getVar('chauffage');
            $perf_energie = $this->request->getVar('perf_energie');
            $superficie = $this->request->getVar('superficie');
            $meuble = ( $this->request->getVar('meuble') === 'oui' ? )  true : false;
            $description = $this->request->getVar('description');
            $adresse = $this->request->getVar('adresse');
            $ville = $this->request->getVar('ville');
            $cp = $this->request->getVar('cp');

            $etat = 'publiée';

            date_default_timezone_set('Europe/Paris');
            $date = date('Y-m-d h:i:s');
            $model = new annonceModel();
            
            if($chauffage==='individuel')
                $model->insertAnnonce($date, $etat, $titre, $loyer, $charges, $chauffage, $perf, $meuble, $superficie, $desc, $adresse, $ville, $cp, $type, 1);
            else
            $model->insertAnnonce($date, $etat, $titre, $loyer, $charges, $chauffage, $perf, $meuble, $superficie, $desc, $adresse, $ville, $cp, $type)
        }
        else
        {
            $this->returnError('Veuillez vous connecter pour effectuer cette action','connexion');
        }
    }
}
?>