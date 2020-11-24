<?php namespace App\Models;

use CodeIgniter\Model;

class utilisateurModel extends Model
{
    protected $table = 'T_utilisateur';

    protected $allowedFields = ['U_mail', 'U_mdp', 'U_pseudo', 'U_nom', 'U_prenom'];
    /*
    public function getNews($slug = false)
    {
        if ($slug === false)
        {
            return $this->findAll();
        }

        return $this->asArray()
                    ->where(['slug' => $slug])
                    ->first();
    } */

    public function insertUtilisateur($mail, $mdp, $pseudo, $nom, $prenom)
    {
        $mdp = sha1($mdp);
        $requete = 'INSERT INTO '.$this->table.' VALUES ("'.$mail.'", "'.$mdp.'", "'.$pseudo.'", "'.$nom.'", "'.$prenom.'")';
        return $this->simpleQuery($requete);
    }

    public function getUtilisateur($mail, $mdp)
    {
        $mdp = sha1($mdp);
        return $this->asArray()->where(['U_mail' => $mail])->where(['U_mdp' => $mdp])->first();
    }
}

?>