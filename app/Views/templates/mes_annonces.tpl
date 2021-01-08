{extends file="accueil.tpl"}
{block name="titre_onglet"}Mes Annonces{/block}
{block name="titre_para"}{$titrePara|default:'Mes Annonces'}{/block}
{block name="etat_bloque"} 
{if $annonce.A_etat==="bloquée" && empty($smarty.session.admin)}<br /><small style="color:red"><i><b>L'annonce à été bloquée par l'admin</b></i></small>{/if}
{/block}