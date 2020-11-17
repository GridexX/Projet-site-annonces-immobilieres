{extends 'main.tpl'}
{block name="output_area"}
    <div class="flex-container" style="margin-top: 2rem;">
        <div class="formulaire-container w33 item-center">
            <h2>{block name="titre_form"}formulaire.TITRE{/block}</h2>
            {block name="formulaire"}
                zone du formulaire d'inscription ou de connexion
            {/block}
        </div>
    </div>
{/block}