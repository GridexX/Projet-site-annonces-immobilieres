<?php namespace App\Models;

use CodeIgniter\Model;
use App\Models\messagerieModel;
use App\Models\annonceModel;
use App\Models\utilisateurModel;

class MessagerieModel extends Model
{
    protected $table = 'T_message';

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

    public function getMessageAnnonce($id_annonce)
    {
        $db = \Config\Database::connect();
        return $db->table($this->table)
        ->select('*')
        ->where('A_idannonce', $id_annonce)
        ->get()->getResultArray();
        return $this->select('A_idannonce')->where(['A_idannonce' => $id_annonce])->asArray();
        return $db->table($this->table)->select('*')->where(['A_idannonce' => $id_annonce])->get()->getResultArray();

        
    }

    public function getMessage($id_annonce, $mail, $mail2) 
    {
        $db = \Config\Database::connect();
        return $db->table($this->table)
        ->select('*')
        ->orderBy("M_dateheure_message", "asc")
        ->where('A_idannonce', $id_annonce)
        ->groupStart()
            ->where("U_mail", $mail)
            ->where("A_mail", $mail2)
        ->groupEnd()
        ->orGroupStart()
            ->where("U_mail", $mail2)
            ->where("A_mail", $mail)
        ->groupEnd()
        ->where('A_idannonce', $id_annonce)
        ->get()->getResultArray();
        /*
        $modelAnnonce = new annonceModel();
        $annonce = $modelAnnonce->getAnnonce($id_annonce);
        $listeMessage = [];
        foreach ($allMessages as $message) {
            $message['M_dateheure_message'] = $this->dateFormat($message['M_dateheure_message']);
            if($message['A_idannonce'] === $id_annonce && ($message['U_mail'] === $mail || $mail === $message['A_mail'])) {
                $listeMessage[] = $message;
            }
        }
        return $listeMessage;
        */
    }
    public function getConv($mail) //Récupère les convs de l'utilisateur
    {
        $db = \Config\Database::connect();
        return $db->table($this->table)
        ->select('*')
        ->orderBy("M_dateheure_message", "asc")
        ->where("U_mail", $mail)
        ->orWhere("A_mail", $mail)
        ->get()->getResultArray();
        /*
        $listeId = [];
        foreach ($allConv as $mess) {
            if(!in_array($mess['A_idannonce'], $listeId) && ($mail == $mess['A_mail'] || $mail == $mess['U_mail'])) { 
                $liste['ID'] = $mess['A_idannonce'];

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
                $case['lien'] = "/messagerie/view/{$annonce['A_idannonce']}/{$case['mail']}";
            }
            $liste[] = $case;            
        }
        return $liste;
        */
    }  
    public function deleteM($id_annonce) {
        $db = \Config\Database::connect();
        return $db->table($this->table)->delete(["A_idannonce" => $id_annonce]);
    }  
}
?>