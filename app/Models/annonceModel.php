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
        'E_id_engie' ];

    public function insertAnnonce($date, $etat, $titre, $loyer, $charges, $chauffage, $perf, $meuble, $superficie, $desc, $adresse, $ville, $cp, $type, $engie=false)
    {
        $requete = 'INSERT INTO '.$this->table.' VALUES (DEFAULT,"'.$date.'","'.$etat.'","'.$titre.'","'.$loyer.'","'.$charges.'","'.$chauffage.'","'.$perf.'","'.$meuble.'","'.$superficie.'","'.$desc.'","'.$adress.'","'.$ville.'","'.$cp.'","'.$type ;
        if($engie !== false)    //Ajout de l'id de l'énergie si elle à été définite dans le controlleur (chauffage individuel)
            $requete .= '","'.$engie ;
        $requete .= '");';
        return $this->simpleQuery($requete);
            
    }

    public function updateAnnonce($annonce:array)
    {
        $requete = 'UPDATE '.$this->table.' SET ';
        for( $i=0 ; $i<count($annonce) ; ++$i)
        {
            $requete .= $this->allowedField[$i].'='.$annonce[$i].", ";
        }
        $requete.=');';
        return $this->simpleQuery($requete);
    }
    
}

?>