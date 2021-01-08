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

    public function estPhotoValide(array $lImage)
    {
      if(count($lImage['images'])<=5 && count($lImage['images'])>0)
      {
        foreach($lImage['images'] as $img)
          if (!($img->isValid() && ! $img->hasMoved()))
            return false;

        return true;
      }
      else
        return false;

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
          else  //Si il n'y a pas d'insertion d'images
          {
            return false;
          }
        }
      }
    }


      public function returnError($error,$view)
    {
        service('SmartyEngine')->assign('error',$error);
        return service('SmartyEngine')->view($view.'.tpl');
    }

}

?>