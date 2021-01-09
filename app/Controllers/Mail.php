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
        $session = \Config\Services::session();
        //service('SmartyEngine')->assign('session',$session);
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
            $message .= '<div style="background-color:#F79F1F;width:80%;margin-left:10%;padding:.1rem;color:black;border-radius: .9rem;"><p style="text-align:left;margin-left:10%"><small>'.$msg["U_mail"].'</small> : "<i>'.$msg["M_texte_message"].'</i> "</p></div>';
        $message .= '</div><br/><br/><br/><br/><br/><br/><p>&copy; 2021 Andréa Duhamel & Arsène Fougerouse, IUT D\'Aix-Marseille campus d\'Arles</p></div></body>' ;
        return $message;
    }

    public function adminMark($action)
    {
        $msg = "<p>L'administrateur à pris la décision de <b>$action</b> votre compte.</p>";
        return $msg;
    }

    public function accountModified($uti, $actionAdmin=false)
    {
        var_dump($uti);
        $modelU = new utilisateurModel();
        //$uti = $modelU->getUtilisateur('fr.annonce.immobiliere@gmail.com');
        $sujet = "Modification de votre compte";
        $dest = $uti['U_mail'];
        $corps = "<p> Vous recevez ce mail de confirmation car votre compte à été modifié. </p>";
        if($actionAdmin)
        {
            $corps .= $this->adminMark("modifier");
            $corps .= '<h5>Vos nouveaux attributs : </h5><div style="background-color:white;width:80%;margin-left:10%;padding:.1rem;color:black;border-radius: .9rem;">';
            $corps .= '<p><b>Pseudo : </b> <i>'.$uti["U_pseudo"].'</i></p>';
            $corps .= "<p><b>Prénom : </b> <i>".$uti["U_prenom"]."</i></p>";
            $corps .= '<p><b>Nom : </b> <i>'.$uti["U_nom"].'</i></p></div>';
        } 
        $message = $this->text($uti,$corps);
        return $this->sendMail($sujet, $message, $dest);
    }
     
    public function delAccount($uti, $actionAdmin=false)
    {
        $sujet = "Suppression de votre compte";
        $dest = $uti['U_mail'];
        $corps = "<p>Vous recevez ce mail de confirmation car votre compte à été supprimé.</p>";
        if($actionAdmin) $corps .= $this->adminMark("supprimer");
        $corps .= "<p>Nous sommes dans le regret de vous voir nous quitter.</p> <br/><br/><p>Bonne continuation !</p><p>L'équipe du Site</p>";
        $message = $this->text($uti,$corps);
        return $this->sendMail($sujet, $message, $dest);
    }    

    public function createAccount($uti)
    {
        $sujet = "Creation de votre compte";
        $dest = $uti['U_mail'];
        $corps = '<p>Votre compte à bien été crée sur notre site. Nous sommes ravis de vous accueillir parmis nous !</p>';
        $message = $this->text($uti,$corps);
        return $this->sendMail($sujet, $message, $dest);
    }

    public function incomingMessage($T_message, $utiDest, $utiSend)  //Definit que l'annonce si message au proprio, sinon destinataire si réponse du proprio
    {
        $modelU = new utilisateurModel();
        $utiDest = $modelU->getUtilisateur('fr.annonce.immobiliere@gmail.com');
        $utiSend = $modelU->getUtilisateur('arsene.fougerouse@etu.univ-amu.fr');
        $sujet = $utiSend["U_mail"]." vous a envoyé un message";
        $T_message["U_mail"] = $utiSend["U_mail"];
        $T_message["M_texte_message"] = "Yo bgggg !";
        $annonce["A_titre"] = "fzfze";
        $corps = '<p>Vous avez reçu un message de <b>'.$utiSend['U_pseudo'].'</b> concernant l\'annonce : <b>'.$annonce["A_titre"].'</b>.';
        $message = $this->text($utiDest, $corps, $T_message);
        return $this->sendMail($sujet, $message, $utiDest["U_mail"]);
    }  
    
    public function annonceBloquée($uti, $annonce=false)
    {
        $sujet = ($annonce===false) ? "Vos annonces ont été bloquées" : "Votre annonce a été bloquée";
        $dest = $uti['U_mail'];
        $corps = "<p>L'administrateur à pris la décision de bloquer ";
        $corps .=($annonce===false) ? "vos annonces" : "votre annonce : <i>".$annonce["A_titre"]."</i>"; 
        $corps.="</p><br/><br/><small>Soyez certains que cette nouvelle nous attriste grandement...</small>";
        $message = $this->text($uti,$corps);
        return $this->sendMail($sujet, $message, $dest);
    }

    public function delAnnonce($annonce, $actionAdmin=false)
    {
        $sujet = "Votre annonce a été supprimée";
        $dest = $annonce["U_mail"];
        $admMsg = ($actionAdmin) ? " par l'administrateur du site. </p><br/><br/><small>Soyez certains que cette nouvelle nous attriste grandement...</small>" : "</p>";
        $corps = "<p>Votre annonce ".$annonce["A_titre"]." a été supprimée".$admMsg;
        $modelU = new utilisateurModel();
        $uti = $modelU->getUtilisateur($annonce["U_mail"]);
        $message = $this->text($uti,$corps);
        return $this->sendMail($sujet, $message, $dest);
    }


    public function annoncesBloquées($uti)
    {
        return $this->annonceBloquée($uti,false);
    }



    public function mailAdmin($msg, $sujet, $uti, $send)
    {
        $sujet = $sujet;
        $dest = $uti["U_mail"];
        $corps = "<p>L'administrateur du site <b>".$send."</b> vous a envoyé un mail : </p>";
        $message = $this->text($uti, $corps, $msg);
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

        }
        else
        {   
            $data = $email->printDebugger(['header']);
            print_r($data);
        }
        
    }
    
}

?>