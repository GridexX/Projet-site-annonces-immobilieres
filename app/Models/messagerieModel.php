<?php namespace App\Models;

use CodeIgniter\Model;
use App\Models\messagerieModel;
use App\Models\annonceModel;
use App\Models\utilisateurModel;

class MessagerieModel extends Model
{
    protected $table = 'T_Message';

    protected $allowedFields = [
        'A_idannonce',
        'U_mail',
        'A_mail',
        'M_texte_message' ,
        'M_dateheure_message'
];

    public function insertMessagerie(array $Messagerie)
    {
        $db = \Config\Database::connect();
        return $db->table($this->table)->insert($Messagerie);
    }
    /*
    public function updateMessagerie(array $Messagerie)
    {
        $db      = \Config\Database::connect();
        $db->table($this->table)->where(['A_idMessagerie' => $Messagerie['A_idMessagerie']])->update($Messagerie);
    }
    */
    public function dateFormat(string $date):string
    {
        $tabMois = array("Janvier","Févrirer","Mars","Avril","Mai","Juin",'Juillet','Août','Septembre','Octobre','Novembre','Décembre');
        $numMois =  substr($date,5,2);
        return substr($date,8,2).' '.$tabMois[$numMois-1].' '.substr($date,0,4).' à '.substr($date,11,2).'h'.substr($date,14,2);  
    } 
    public function getMessage($id_annonce, $mail) 
    {
        $modelAnnonce = new annonceModel();
        $annonce = $modelAnnonce->getAnnonce($id_annonce);
        $db = \Config\Database::connect();
        $allMessages = $db->table($this->table)->select('*')->where(['A_idannonce' => $id_annonce])->orderBy("M_dateheure_message", "asc")->get()->getResultArray();
        $listeMessage = [];
        foreach ($allMessages as $message) {
            $message['M_dateheure_message'] = $this->dateFormat($message['M_dateheure_message']);
            if($message['A_idannonce'] === $id_annonce && ($message['U_mail'] === $mail || $mail === $message['A_mail'])) { 
                $listeMessage[] = $message;
            }
        }
        return $listeMessage;
    }
    public function getConv($mail) //Récupère les convs de l'utilisateur
    {
        $db = \Config\Database::connect();
        $allConv = $db->table($this->table)->select('*')->get()->getResultArray();
        $listeId = [];
        foreach ($allConv as $mess) {
            if(!in_array($mess['A_idannonce'], $listeId) && ($mail == $mess['A_mail'] || $mail == $mess['U_mail'])) { 
                $listeId[] = $mess['A_idannonce'];
            }
            
        }
        $modelAnnonce = new annonceModel();
        $case = [];
        $liste = [];
        $mess = [];
        $model = new messagerieModel();
        $modelUser = new utilisateurModel(); 
        foreach ($listeId as $id) {
            $tmp = $model->getMessage($id, $mail);
            if(!empty($tmp)) {
                $mess = end($tmp);
                $case['last'] = $mess['M_texte_message'];
                $annonce = $modelAnnonce->getAnnonce($id);
                if($mail === $mess['A_mail']) $case['mail'] = $mess['U_mail'];
                else $case['mail'] = $mess['A_mail'];
                if($annonce['U_mail'] === $mail) $case['state'] = 'Client';
                else $case['state'] = 'Propriétaire';
                $case['title'] = $annonce['A_titre'];
                $user = $modelUser->getUtilisateur($case['mail']);
                if(!empty($user)) $case['pseudo'] = $user['U_pseudo'];
                $case['lien'] = "/messagerie/view/{$annonce['A_idannonce']}";
            }
            $liste[] = $case;            
        }
        return $liste;
    }    
}
?>