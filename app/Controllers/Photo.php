<?php namespace App\Controllers;

use App\Models\annonceModel;
use App\Models\photoModel;
use CodeIgniter\Controller;
use App\Controllers\Pages;

class Photo extends Controller
{
    public function view()
    {
      return service('SmartyEngine')->view('user_view.tpl');
    }

    public function create($id_annonce=false)
    {

      $lImage = $this->request->getFileMultiple();
      
      if(!empty($lImage) && count($lImage)<6 )
      {
        $i=0;
        foreach($lImage as $img)
        {
            $i=$i+1;
            $model = new photoModel();
            if ($img->isValid() && ! $img->hasMoved())
            {
              $photo = array(
                "P_nom" => $img->getName(),
                "P_titre" => $img->getRandomName(),
                "A_idannonce" => $id_annonce  
              );
              $img->move('uploads/', $photo["P_titre"]);
              $model->insertPhoto($photo);
            }
        }
        return $this->returnError($i,"connexion");
    }
    else if(!empty($lImage)) //génère une erreur si plus de 5 photos envoyées
    {
      $controller = new Pages();
      return $controller->showNotif("erreur","Vous pouvez ajouter au maximum 5 photos","user_view");
    }
  


        /*
          $data = array();
    
          // Count total files
          $countfiles = count($_FILES['files']['name']);
     
          // Looping all files
          for($i=0;$i<$countfiles;$i++){
     
            if(!empty($_FILES['files']['name'][$i])){
     
              // Define new $_FILES array - $_FILES['file']
              $_FILES['file']['name'] = $_FILES['files']['name'][$i];
              $_FILES['file']['type'] = $_FILES['files']['type'][$i];
              $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
              $_FILES['file']['error'] = $_FILES['files']['error'][$i];
              $_FILES['file']['size'] = $_FILES['files']['size'][$i];
    
              // Set preference
              $config['upload_path'] = 'uploads/'; 
              $config['allowed_types'] = 'jpg|jpeg|png|gif';
              $config['max_size'] = '5000'; // max_size in kb
              $config['file_name'] = $_FILES['files']['name'][$i];
     
              //Load upload library
              $this->load->library('upload',$config); 
     
              // File upload
              if($this->upload->do_upload('file')){
                // Get data about the file
                $uploadData = $this->upload->data();
                $filename = $uploadData['file_name'];
    
                // Initialize array
                $data['filenames'][] = $filename;
              }
            }
     
          }
     
          // load view
          service('SmartyEngine')->assign('data',$data);
          return service('SmartyEngine')->view('user_view.tpl');  
          $this->load->view('user_view',$data);
        }else{
    
          // load view
          return service('SmartyEngine')->view('user_view.tpl');  
        } */
        return service('SmartyEngine')->view('user_view.tpl');
      
    }

      public function returnError($error,$view)
    {
        service('SmartyEngine')->assign('error',$error);
        return service('SmartyEngine')->view($view.'.tpl');
    }

}

?>