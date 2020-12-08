<?php namespace App\Models;

use CodeIgniter\Model;

class energieModel extends Model
{
    protected $table = 'T_energie';

    protected $allowedFields = [ 'E_id_engie', 'E_description' ];

    public function getEnergie($id=false)
    {
        if ($id === false)
        {
            return $this->findAll();
        }
        
        return $this->asArray()->where(['E_id_engie' => $id])->first();
    }

    public function insertEnergie($energie)
    {
        $db = \Config\Database::connect();
        return $db->table($this->table)->insert($energie);
    }
}

?>