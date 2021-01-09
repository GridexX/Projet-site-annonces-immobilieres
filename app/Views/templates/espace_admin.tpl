{extends file="main.tpl"}
{block name="titre_onglet"}Espace Admin{/block}
{block name="output_area"}

    {* Si le site ne contient pas d'annonces bloquées et d'utilisateur on affiche une notification*}
    {if empty($liste_utilisateur) && empty($liste_annonce)}
        {$notification.message = "Il n'y a rien ici pour l'instant"}
        {$notification.type = "error"}
        {$notification.lien = "/" } 
        {include file="notifications.tpl"}
    {/if}

    {if !empty($liste_utilisateur)}
        <div class="flex-container ">
            <div class="center w50 txtcenter txtblock">
                <h2>Liste des utilisateurs</h2>
                <div class="txtblock w40 center txtcenter">
                    <hr class="white"/>
                </div>
            </div>
        </div>
        <div class="liste_annonce flex-container w50 center item-center">
            {foreach from=$liste_utilisateur item=uti}
                <div class="annonce-container w35 center txt-center">
                <div class="w100 item-center">
                <i class="fas fa-user fa-4x blue"></i>
                <h5>{$uti.U_pseudo}</h5>
                <small>{$uti.U_prenom} {$uti.U_nom}</small>
                </div>
                <div class="flex-container bouton-admin">
                <a href="/utilisateur/view/edition_profil/{$uti.U_mail}" ><abbr title="Editer le profil"><button class="btn--primary"><small><i class="fas fa-edit"></i></small></button></abbr></a>
                <a href="/annonce/annoncesUti/{$uti.U_mail}" ><abbr title="Voir ses annonces"><button class="btn--primary"><small><i class="fas fa-eye"></i></small></button></abbr></a>
                <a href="/annonce/bloquerAnnonces/{$uti.U_mail}" ><abbr title="Bloquer les annonces"><button class="btn--danger"><small><i class="fas fa-ban"></i></small></button></abbr></a>
                <a href="/messagerie/sendMail/{$uti.U_mail}" ><abbr title="Envoyer un mail"><button class="btn--success"><small><i class="fas fa-envelope"></i></small></button></abbr></a>
                </div>
                </div>
            {/foreach}
        </div>
    {/if}

    {if !empty($liste_annonce)}
        <div class="flex-container ">
            <div class="txtblock w50 center txtcenter">
                <h2>Liste des annonces bloquées</h2>
                <div class="txtblock w40 center txtcenter">
                    <hr class="white"/>
                </div>
            </div>
        </div>
        
        
        <div class="liste_annonce flex-container w75 center">
            {foreach from=$liste_annonce item=annonce}
                <div class="flex-container center w33">
                    <div style="cursor: pointer;" onclick="window.location.href='/annonce/view/annonce/{$annonce.A_idannonce}'" class="annonce flex-container center">
                        <div class="w35">
                            <img class="w90 center" {if isset($annonce.P_photo) } src='/uploads/{$annonce.A_idannonce}/{$annonce.P_photo.P_titre}' {else} src='/Images/logo_site.png' {/if} } alt="House logo">
                        </div> 
                        <div class="w65"> 
                            <p> {$annonce.A_titre} : {$annonce.A_cout_loyer+$annonce.A_cout_charges} €{if isset($smarty.session.mail) && $smarty.session.mail===$annonce.U_mail} {if $annonce.A_etat==='publiée'}<span style="color:green"><i class="fas fa-check-circle"></i></span>{else}<span style="color:orange"><i class="fas fa-clock"></i></span>{/if}{/if}</p>
                            
                            <small> Posté le {$annonce.A_date_maj} par {foreach from=$liste_utilisateur item=uti}{($uti.U_mail===$annonce.U_mail)?$uti.U_pseudo:''}{/foreach}</small> 
                            <br><br><a class="btn--success" href="/annonce/changerEtat/{$annonce.A_idannonce}/en cours/espace_admin" ><i class="fas fa-check-double"></i> Débloquer l'annonce</a>   
                        </div>  
                    </div>      
                </div> 
            {/foreach}
        </div>
    {/if}
{/block}