<?php
namespace App\Controllers;

use \CodeIgniter\Controller;

class Mail extends Controller
{
    public function configMail()
    {
        $email = \Config\Services::email();

        $config['protocol'] = 'smtp';
        $config['SMTPHost'] = 'smtp.gmail.com';
        $config['SMTPUser'] = 'fr.annonce.immobiliere@gmail.com';
        $config['SMTPPass'] = 'wHxSxf11GQ1DA6nG';
        $config['SMTPPort'] = 465; 

        $email->initialize($config);
        return $email;
    }

    public function adminMark($action)
    {
        $msg = "<p style=\"color:red;\">L'administrateur à pris la décision de $action votre compte.</p>";
        return $msg;
    }

    public function accountModified($uti, $mdp, $actionAdmin=false)
    {
        $sujet = "Modification de votre compte";
        $dest = $uti['U_mail'];
        $message = "<h4>Cher(e) ".$uti["U_pseudo"].",</h4> <br> <p> Vous recevez ce mail de confirmation car votre compte du site ShareLoc à été modifié. <br>";
        if($actionAdmin)
        {
            $message .= $this->adminMark("modifier");
            $message .= "<h5>Vos nouveaux attributs :</h5> <p><b>Pseudo : </b> <i>".$uti["U_pseudo"]."</i></p>";
            $message .= "Nom : </b> <i>".$uti["U_nom"]."</i></p>";
            $message .= "<p><b>Prénom : </b> <i>".$uti["U_prenom"]."</i></p>";
        } 
        $message .= "<br><br>Cordialement, </p> <p>L'équipe du Site</p>";
        return $this->sendMail($sujet, $message, $dest);
    }
     
    public function mailDelAccount($uti, $actionAdmin=false)
    {
        $sujet = "Suppression de votre compte";
        $dest = $uti['U_mail'];
        $message = "<h4>Cher(e) ".$uti["U_pseudo"].",</h4> <br> <p> Vous recevez ce mail de confirmation car votre compte du site ShareLoc a bien été supprimé. <br>";
        if($actionAdmin) $message .= $this->adminMark("supprimer");
        $message .= "Nous sommes dans le regret de vous voir nous quitter. <br><br>Bonne continuation ! </p> <p>L'équipe du Site</p>";
        return $this->sendMail($sujet, $message, $dest);
    }    
        

    public function sendMail($sujet, $message, $dest)
    {
        $email = $this->configMail();
        $email->setFrom('fr.annonce.immobiliere@gmail.com', 'Annonce immobiliere');
        $email->setTo($dest);
        $email->setSubject($sujet);
        $email->setMessage($message);

        if($email->send(false))
        {
            return service('SmartyEngine')->view('header_user.tpl');
        }
        else
        {
            $data = $email->printDebugger(['headers']);
            print_r($data);
        }
    }
    
}

?>