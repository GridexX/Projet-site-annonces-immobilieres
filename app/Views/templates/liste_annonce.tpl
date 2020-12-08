{extends 'main.tpl'}
{block name="titre_onglet"}Accueil{/block}
{block name="output_area"}
{if isset($lBoutons)}
    <div class="flex-container w75 center">
    {foreach from=$lBoutons item=bouton}
        <a href="/annonce/viewListe/{$bouton.numAnnDeb}/{$nbAnnonces}"><button class="bouton {($bSelect>=$bouton.numAnnDeb && $bSelect<$bouton.numAnnFin) ? 'btn-green' : 'btn-bleu' } center">{$bouton.numPage}</button></a>
    {/foreach}
        <select onchange="location = this.value;">
            <option default>Afficher {$nbAnnonces} annonces par pages</option>
            <option value="/annonce/viewListe/{$bSelect}/15">15 </option>
            <option value="/annonce/viewListe/{$bSelect}/30">30 </option>
            <option value="/annonce/viewListe/{$bSelect}/50">50 </option>
            <option value="/annonce/viewListe/{$bSelect}/100">100</option>
        </select>
    </div>
{/if}

<div class="liste_annonce flex-container w75 center">

    {foreach from=$liste_annonce item=annonce}
    <a href="/annonce/view/annonce/{$annonce.A_idannonce}" class="annonce flex-container center w45">
        <div class="w35">
            <img class="w90 center" src="/Images/logo_site.png" alt="House logo">
        </div> 
        <div class="w65"> 
            <p> {$annonce.A_titre} : {$annonce.A_cout_loyer+$annonce.A_cout_charges} €{if isset($smarty.session.mail) && $smarty.session.mail===$annonce.U_mail}<span style="color:green"><i class="fas fa-check-circle"></i></span>{/if}</p>
            <p> {$annonce.A_superficie}m² {$annonce.T_type} | {$annonce.A_ville} </p>
            <small> Posté le {$annonce.A_date_maj}</small> 
        </div>   
    </a>
    {/foreach}
</div>

{/block}