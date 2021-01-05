<?php
namespace App\Controllers;

use App\Models\annonceModel;
use App\Models\energieModel;
use App\Models\utilisateurModel;

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

    public function index()
    {
        $dest = 'fr.annonce.immobiliere@gmail.com';
        $modelU = new utilisateurModel();
        $uti = $modelU->getUtilisateur('fr.annonce.immobiliere@gmail.com');
        $corps = 'Votre compte à bien été supprimé';
        $msg = array( "Eliot", "Coucou ca va ?" );
        $message = $this->text($uti,$corps,$msg);
        return $this->sendMail('Suppression du compte', $message, $dest);
    }

    public function text($uti,$corps,$msg=false):string
    {
        $message = '<body style="width: 100%; background-color: #56199c;">
        <div style="color: white; text-align: center;"><h1>Bonjour '.$uti["U_pseudo"].'</h1><div style="font-size:1.35rem;">'.$corps;
        if($msg!==false)  
            $message .= '<div style="background-color:#F79F1F;width:80%;margin-left:10%;padding:.1rem;color:black;border-radius: .9rem;"><p style="text-align:left;margin-left:10%">'.$msg[0].' : "<i>'.$msg[1].'</i>"</p></div>';
        $message .= '</div><br><br><br><br><br><br><p>&copy; 2021 Andréa Duhamel & Arsène Fougerouse, IUT D\'Aix-Marseille campus d\'Arles</p></div></body>' ;
        return $message;
    }

    public function adminMark($action)
    {
        $msg = "<p>L'administrateur à pris la décision de <b>$action</b> votre compte.</p>";
        return $msg;
    }

    public function accountModified( $actionAdmin=false)
    {
        $modelU = new utilisateurModel();
        $uti = $modelU->getUtilisateur('fr.annonce.immobiliere@gmail.com');
        $sujet = "Modification de votre compte";
        $dest = $uti['U_mail'];
        $corps = "<p> Vous recevez ce mail de confirmation car votre compte à été modifié. </p>";
        if($actionAdmin)
        {
            $corps .= $this->adminMark("modifier");
            
            $corps .= '<div style="color:black;background-color:white;border-radius:1rem;border-color: black;"><b>Nom : </b> <i>"'.$uti["U_nom"].'"</i></p>';
            $corps .= "<h5>Vos nouveaux attributs :</h5> <p><b>Pseudo : </b> <i>".$uti["U_pseudo"]."</i></p>";
            $corps .= "<p><b>Prénom : </b> <i>".$uti["U_prenom"]."</i></p></div>";
        } 
        $message = $this->text($uti,$corps);
        return $this->sendMail($sujet, $message, $dest);
    }
     
    public function delAccount($uti, $actionAdmin=false)
    {
        $sujet = "Suppression de votre compte";
        $dest = $uti['U_mail'];
        $corps = "<p>Vous recevez ce mail pour vous indiquer que votre compte à été supprimé.</p>";
        if($actionAdmin) $corps .= $this->adminMark("supprimer");
        $corps .= "<p>Nous sommes dans le regret de vous voir nous quitter.</p> <br><br><p>Bonne continuation !</p><p>L'équipe du Site</p>";
        $message = $this->text($uti,$corps);
        return $this->sendMail($sujet, $message, $dest);
    }    

    public function createAccount($uti)
    {
        $sujet = "Creation de votre compte";
        $dest = $uti['U_mail'];
        $message = '<h4>Cher'.$uti["U_pseudo"].' </h4> <br><p>Bienvenue sur notre site ShareLoc !</p>';
        return $this->sendMail($sujet, $message, $dest);
    }

    public function incomingMessage($annonce, $message, $utiDest, $utiSend)  //Definit que l'annonce si message au proprio, sinon destinataire si réponse du proprio
    {
        $sujet = "Vous avez un nouveau message";
        $dest = $utiDest['U_mail'];
        $message = '<p>Vous avez reçu un message de <b>'.$utiSend['U_pseudo'].'</b> concernant l\'annonce : <b>'.$annonce["A_titre"].'</b>.</p> <br><p><pre>'.$message.'</pre></p>';
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