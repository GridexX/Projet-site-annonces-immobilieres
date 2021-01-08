{extends 'main.tpl'}
{block name="titre_onglet"}Accueil{/block}
{block name="output_area"}
<div class="flex-container ">
        <div class="txtblock w50 center txtcenter">
            <h2>{block name="titre_para"}Liste des dernières annonces{/block}</h2>
            <div class="txtblock w40 center txtcenter">
                <hr class="white"/>
            </div>
        </div>
    </div>
    {block name="recherche"}{/block}{*Champ pour la recherche d'annonces spécifiques*}
{if isset($liste_annonce)}
<div class="liste_annonce flex-container w75 center">

    {foreach from=$liste_annonce item=annonce}
    <div style="cursor: pointer;" onclick="window.location.href='/annonce/view/annonce/{$annonce.A_idannonce}'" class="{(isset($affBoutonsAdmin)) ? 'annonce-admin' : 'annonce'} flex-container center w45">

        <div class="w35 center">
        <div class="img-container">
            <img class="" {if isset($annonce.P_photo) } src='/uploads/{$annonce.A_idannonce}/{$annonce.P_photo.P_titre}' {else} src='/Images/logo_site.png' {/if} } alt="House logo">
        </div>
        </div> 
        <div class="w65"> 
            <p> {$annonce.A_titre} : {$annonce.A_cout_loyer+$annonce.A_cout_charges} €
            {if $annonce.A_etat==='publiée'}<span style="color:green">  <i class="fas fa-check-circle"></i></span> {/if}
            {if $annonce.A_etat==='en cours'}<span style="color:orange">  <i class="fas fa-file-alt"></i></span> {/if}
            {if $annonce.A_etat==='archivée'}<span style="color:orange">  <i class="fas fa-archive"></i></span> {/if}
            {if $annonce.A_etat==='bloquée'}<span style="color:red">  <i class="fas fa-ban"></i></span> {/if}
            </p>
            <p> {$annonce.A_superficie}m² {$annonce.T_type} | {$annonce.A_ville} </p>
            <small> Posté le {$annonce.A_date_maj}</small> 
            {block name="etat_bloque"}{/block}
        </div>   
            {if isset($affBoutonsAdmin)}
                {if $annonce.A_etat!=='bloquée'}
                    <a href="/annonce/changerEtat/{$annonce.A_idannonce}/bloquée/annoncesUti/"><button class="btn--danger"><i class="fas fa-ban"></i> Bloquer l'annonce</button></a>
                {else}
                    <a class="btn--success" href="/annonce/changerEtat/{$annonce.A_idannonce}/en cours/annoncesUti/" ><i class="fas fa-check-double"></i> Débloquer l'annonce</a>
                {/if}
                <a href="/messagerie/delete/{$annonce.A_idannonce}"><button class="btn--danger"><i class="fas fa-trash-alt"></i> Supprimer les messages de l'annonce</button></a>
            {/if}
    </div>
    {/foreach}
</div>
{/if}

{/block}