<div class="navbar navbar-fixed_top">
    <div class="flex-container">
        <div class="w33 navbar-div item-center txtcenter">
            {if isset($estAccueil)}<button class="bouton btn-bleu center"><a class="lien" href="/annonce/toutesAnnonces/">Afficher toutes les annonces</a></button>{/if}
        </div>
        <span class="w33 navbar-div item-center txtcenter">
            <a href="/"><img src="/Images/logo_house.png" alt="House logo"></a>
        </span>
        {block name="divBtnConnexion"}
        <span class="w33 navbar-div item-center txtcenter">
            <button class="bouton btn-vert center"><a class="lien" href="/pages/view/connexion">Connexion</a></button>
        </span>
        {/block}
    </div>
</div>
{block name="script"}{/block}