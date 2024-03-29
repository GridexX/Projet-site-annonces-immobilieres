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

    public function getPhoto(int $idannonce)
    {
        $db = \Config\Database::connect();
        return $db->table($this->table)->select("*")->where(["A_idannonce" => $idannonce])->get()->getResultArray();
    }

    public function deletePhoto(int $idannonce)
    {
        $db = \Config\Database::connect();
        return $db->table($this->table)->delete(["A_idannonce" => $idannonce]);
    }
}

?>