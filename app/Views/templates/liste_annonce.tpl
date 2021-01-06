{extends 'main.tpl'}
{block name="titre_onglet"}Accueil{/block}
{block name="output_area"}
{if isset($lBoutons) && !isset($estAccueil)}
    <div class="flex-container w75 center">
    {foreach from=$lBoutons item=bouton}
        <a href="/annonce/viewListe/{$bouton.numAnnDeb}/{$nbAnnonces}"><button class="bouton {($bSelect>=$bouton.numAnnDeb && $bSelect<$bouton.numAnnFin) ? 'btn-green' : 'btn-bleu' } center">{$bouton.numPage+1}</button></a>
    {/foreach}
        <select onchange="location = this.value;">
            <option default>Afficher {$nbAnnonces} annonces par pages</option>
            <option value="/annonce/viewListe/{$bSelect}/15">15 </option>
            {if $nb_annonces>30}<option value="/annonce/viewListe/{$bSelect}/30">30 </option>{/if}
            {if $nb_annonces>50}<option value="/annonce/viewListe/{$bSelect}/50">50 </option>{/if}
            {if $nb_annonces>100}<option value="/annonce/viewListe/{$bSelect}/100">100</option>{/if}
        </select>
    </div>
    {/if}
    {if !isset($estAccueil) && (isset($recherche) || isset($borne) )}
        <p>Yo</p>
        {include file="recherche_annonce.tpl"}
    {/if}

{if isset($liste_annonce)}
<div class="liste_annonce flex-container w75 center">

    {foreach from=$liste_annonce item=annonce}
    <div style="cursor: pointer;" onclick="window.location.href='/annonce/view/annonce/{$annonce.A_idannonce}'" class="annonce flex-container center w45">

        <div class="w35 center">
        <div class="img-container">
            <img class="" {if isset($annonce.P_photo) } src='/uploads/{$annonce.A_idannonce}/{$annonce.P_photo.P_titre}' {else} src='/Images/logo_site.png' {/if} } alt="House logo">
        </div>
        </div> 
        <div class="w65"> 
            <p> {$annonce.A_titre} : {$annonce.A_cout_loyer+$annonce.A_cout_charges} €{if isset($smarty.session.mail) && $smarty.session.mail===$annonce.U_mail} {if $annonce.A_etat==='publiée'}<span style="color:green"><i class="fas fa-check-circle"></i></span>{else}<span style="color:orange"><i class="fas fa-clock"></i></span>{/if}{/if}</p>
            <p> {$annonce.A_superficie}m² {$annonce.T_type} | {$annonce.A_ville} </p>
            <small> Posté le {$annonce.A_date_maj}</small> 
            {if isset($smarty.session.admin) && isset($mesAnnonces)}
                {if $annonce.A_etat!=='bloquée'}
                    <a href="/annonce/changerEtat/{$annonce.A_idannonce}/bloquée/annoncesUti/"><button class="btn--danger"><i class="fas fa-ban"></i> Bloquer l'annonce</button></a>
                {else}
                    <a class="btn--success" href="/annonce/changerEtat/{$annonce.A_idannonce}/en cours/annoncesUti/" ><i class="fas fa-check-double"></i> Débloquer l'annonce</a>
                {/if}
            {/if}
        </div>   
    </div>
    {/foreach}
</div>
{/if}
{/block}