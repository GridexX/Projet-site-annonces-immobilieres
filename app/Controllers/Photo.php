<?php namespace App\Controllers;

use App\Models\annonceModel;
use App\Models\photoModel;
use CodeIgniter\Controller;
use App\Controllers\Pages;

class Photo extends Controller
{
/*
  public function getFiles()
  {
	if (is_null($this->files))
	  {
		  $this->files = new FileCollection();
	  }
	  return $this->files->all();
  } */

    public function view()
    {
      return service('SmartyEngine')->view('user_view.tpl');
    }

    public function delete(int $id_annonce)
    {
      //VERIFICATION SI L'ANNONCE APPARTIENT L'UTILISATEUR

      helper('filesystem');
      $path = "uploads/$id_annonce";
      $model = new photoModel();
      $model->deletePhoto($id_annonce); //Suppression dans la BBD
      delete_files($path, true); //Suppression des fichiers dans le dossier
      if(is_dir($path)) rmdir($path); //Suppression du dossier
    }

    public function create(array $lImage,int $id_annonce)
    {
      $model = new photoModel();
      
      if(count($lImage['images'])<=5 && count($lImage['images'])>0)
      {
        foreach($lImage['images'] as $img)
        {
          if ($img->isValid() && ! $img->hasMoved())
          {
              $photo = array(
                "P_nom" => $img->getName(),
                "P_titre" => $img->getRandomName(),
                "A_idannonce" => $id_annonce  
              );
              $img->move("uploads/$id_annonce/", $photo["P_titre"]);
              $model->insertPhoto($photo);
          } 
        }
      }
      else if(count($lImage['images'])>5)  //Génère une erreur si plus de 5 photos veulent être insérées
      {
        $notification = array( 
          "type" => "erreur",
          "titre" => "Erreur",
          "message" => "Vous pouvez insérer au maximum 5 photos :".count($lImage['images'])." passées en paramètres"
        );
        return $notification;
      }
      else //génère un warning si pas de photos insérées
      {
        $notification = array( 
          "type" => "warning",
          "titre" => "Attention",
          "message" => "Vous n'avez pas inséré de photos, les photos permettent aux autres utilisateurs de voir votre logement." 
        );
        return $notification;
      }
      return null;
    }


      public function returnError($error,$view)
    {
        service('SmartyEngine')->assign('error',$error);
        return service('SmartyEngine')->view($view.'.tpl');
    }

}

?>