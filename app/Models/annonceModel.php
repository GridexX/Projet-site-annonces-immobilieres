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
        $db->table($this->table)->where(['A_idannonce' => $annonce['A_idannonce']])->update($annonce);
    }

    public function getAnnonce($id=false)
    {
        if ($id === false)
        {
            return $this->findAll();
        }
        
        return $this->asArray()->where(['A_idannonce' => $id])->first();
    }
    
}

?>