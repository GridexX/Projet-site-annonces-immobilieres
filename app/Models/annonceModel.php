<?php namespace App\Models;

use CodeIgniter\Model;

class annonceModel extends Model
{
    protected $table = 'T_annonce';

    protected $allowedFields = [
        'A_idannonce',
        'A_date_maj',
        'A_etat' ,
        'A_titre' ,
        'A_cout_loyer' ,
        'A_cout_charges',
        'A_type_chauffage' ,
        'A_perf_energie',
        'A_est_meuble',
        'A_superficie',
        'A_description',
        'A_adresse',
        'A_ville',
        'A_CP' ,
        'T_type' ,
        'E_id_engie',
        'U_mail' ];

    public function insertAnnonce(array $annonce)
    {
        $db = \Config\Database::connect();
        return $db->table($this->table)->insert($annonce);
    }

    public function updateAnnonce(array $annonce)
    {
        $db      = \Config\Database::connect();
        return $db->table($this->table)->where(['A_idannonce' => $annonce['A_idannonce']])->update($annonce);
    }

    public function getAnnonce($id=false)
    {
        
        if ($id === false)
        {
            $db = \Config\Database::connect();
            return $db->table($this->table)->select('*')->orderBy("A_date_maj", "desc")->get()->getResultArray();
            //return $db->table($this->table)->findAll()->orderBy("A_date_maj", "desc");
        }
        
        return $this->asArray()->where(['A_idannonce' => $id])->first();
    }

    public function getLastAnnonce($mail)
    {
        $db = \Config\Database::connect();
        $dateMax = $db->table($this->table)->select('MAX(A_date_maj)')->where(['U_mail' => $mail])->get()->getResultArray();
        //return $dateMax;//[0]["MAX(A_date_maj)"];
        $res = $db->table($this->table)->where(['A_date_maj' => $dateMax[0]["MAX(A_date_maj)"]])->get()->getResultArray();
        return $res[0];
        
        $query = 'SELECT MAX(A_idannonce) FROM '.$this->table.' WHERE U_mail like "'.$mail.'"';
        return $result = $this->simpleQuery($query);
    } 
    
    public function getAnnonceUti($mail)
    {
        $db = \Config\Database::connect();
        return $db->table($this->table)->select('*')->where(['U_mail' => $mail])->orderBy("A_date_maj", "desc")->get()->getResultArray();
    }
}

?>