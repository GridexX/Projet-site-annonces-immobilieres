<?php namespace App\Models;

use CodeIgniter\Model;

class utilisateurModel extends Model
{
    protected $table = 'T_utilisateur';

    protected $allowedFields = ['U_mail', 'U_mdp', 'U_pseudo', 'U_nom', 'U_prenom', 'U_estAdmin', 'U_estBloque'];

    public function insertUtilisateur($mail, $mdp, $pseudo, $nom, $prenom, $admin=false)
    {
        $mdp = sha1($mdp);
        $requete = 'INSERT INTO '.$this->table.' VALUES ("'.$mail.'", "'.$mdp.'", "'.$pseudo.'", "'.$nom.'", "'.$prenom.'", "'.$admin.'")';
        return $this->simpleQuery($requete);
    }

    public function getUtilisateur($mail=false)
    {
        if ($mail === false)
        {
            return $this->where(['U_estAdmin' => false])->findAll();
        }
        else if($mail === "admin")
        {
            return $this->where(['U_estAdmin' => true])->first();
        }
        return $this->asArray()->where(['U_mail' => $mail])->first();
    }

    public function updateUtilisateur(array $utilisateur)
    {
        $db = \Config\Database::connect();
        return $db->table($this->table)->where(['U_mail' => $utilisateur['U_mail']])->update($utilisateur);
    }

    public function deleteUtilisateur($mail)
    {
        $db = \Config\Database::connect();
        return $db->table($this->table)->delete(['U_mail' => $mail]);
    }

}

?>