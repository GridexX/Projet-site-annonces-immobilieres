<?php namespace App\Models;

use CodeIgniter\Model;

class utilisateurModel extends Model
{
    protected $table = 'T_utilisateur';

    protected $allowedFields = ['U_mail', 'U_mdp', 'U_pseudo', 'U_nom', 'U_prenom', 'U_estAdmin'];

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
            return $this->where(['U_estAdmin' => true])->findAll();
        }
        return $this->asArray()->where(['U_mail' => $mail])->first();
    }

    public function updateUtilisateur($mail, $mdp, $pseudo, $nom, $prenom)
    {
        $mdp = sha1($mdp);
        $requete = 'UPDATE '.$this->table.' SET U_mdp = "'.$mdp.'", U_pseudo = "'.$pseudo.'", U_nom = "'.$nom.'", U_prenom = "'.$prenom.'"WHERE U_mail = "'.$mail.'";';
        return $this->simpleQuery($requete);
    }

    public function deleteUtilisateur($mail)
    {
        $db = \Config\Database::connect();
        return $db->table($this->table)->delete(['U_mail' => $mail]);
    }

}

?>