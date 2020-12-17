<?php namespace App\Models;

use CodeIgniter\Model;

class photoModel extends Model
{
    protected $table = 'T_photo';

    protected $allowedFields = [
            'P_idphoto',
            'P_titre',
            'P_nom',
            'A_idannonce'];

    public function insertPhoto(array $photo)
    {
        $db = \Config\Database::connect();
        return $db->table($this->table)->insert($photo);
    }
}

?>