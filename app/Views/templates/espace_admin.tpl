{extends file="main.tpl"}
{block name="titre_onglet"}Espace Admin{/block}
{block name="output_area"}
    <div class="flex-container ">
        <div class="center w50 txtcenter txtblock">
            <h2>Liste des utilisateurs</h2>
            <div class="txtblock w40 center txtcenter">
                <hr class="white"/>
            </div>
        </div>
    </div>
    <div class="liste_annonce flex-container w50 center itemcenter">

        {foreach from=$liste_utilisateur item=uti}
        <div class="w25 ">
            <div class="annonce-container w80 center txtcenter">
            <i class="fas fa-user fa-4x blue"></i>
            <h5>{$uti.U_pseudo}</h5>
            <small>{$uti.U_prenom} {$uti.U_nom}</small>
            <a href="/utilisateur/view/edition_profil/{$uti.U_mail}" ><button class="btn--primary">Editer</button></a>
            <a href="/annonce/annoncesUti/{$uti.U_mail}" ><button class="btn--primary"><small><i class="fas fa-eye"></i> Voir ses annonces</small></button></a>
            <a href="/annonce/bloquerAnnonces/{$uti.U_mail}" ><button class="btn--danger"><small><i class="fas fa-ban"></i> Bloquer les annonces</small></button></a>
            </div>
        </div>
        {/foreach}

    </div>
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
{/block}