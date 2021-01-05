{extends file="main.tpl"}
{block name="titre_onglet"}Espace Admin{/block}
{block name="output_area"}

    <div class="liste_annonce flex-container w50 center">
        {foreach from=$liste_utilisateur item=uti}
        <div class="w15 ">
            <div class="annonce-container w80 center txtcenter">
            <i class="fas fa-user fa-4x blue"></i>
            <h5>{$uti.U_pseudo}</h5>
            <small>{$uti.U_prenom} {$uti.U_nom}</small>
            <a href="/utilisateur/view/edition_profil/{$uti.U_mail}" ><button class="btn--primary">Editer</button></a>
            
            </div>
        </div>
        {/foreach}
    </div>
<div class="liste_annonce flex-container w50 center">
    {foreach from=$liste_annonce item=annonce}
    
    <a href="/annonce/view/annonce/{$annonce.A_idannonce}" class="annonce-pad{extends 'inscription.tpl'}
{block name="titre_onglet"}Profil{/block}
{block name="titre_form"}Editer le profil{/block} flex-container center w33">
    
        <div class="w35">
            <img class="w90 center" {if isset($annonce.P_photo) } src='/uploads/{$annonce.A_idannonce}/{$annonce.P_photo.P_titre}' {else} src='/Images/logo_site.png' {/if} } alt="House logo">
        </div> 
        <div class="w65"> 
            <p> {$annonce.A_titre} : {$annonce.A_cout_loyer+$annonce.A_cout_charges} €{if isset($smarty.session.mail) && $smarty.session.mail===$annonce.U_mail} {if $annonce.A_etat==='publiée'}<span style="color:green"><i class="fas fa-check-circle"></i></span>{else}<span style="color:orange"><i class="fas fa-clock"></i></span>{/if}{/if}</p>
            <p> {$annonce.A_superficie}m² {$annonce.T_type} | {$annonce.A_ville} </p>
            <small> Posté le {$annonce.A_date_maj}</small> 
        </div>   
    </a>
    
    {/foreach}
    </div>
{/block}