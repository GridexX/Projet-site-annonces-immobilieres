{extends 'main.tpl'}
{block name="titre_onglet"}Connexion{/block}

{block name="output_area"}
    <div class="flex-container" style="margin-top: 2rem;">
        <div class="formulaire-container w40 item-center txtcenter">
            <h2>{block name="titre_form"}Connexion{/block}</h2>
            {if isset($error)}
                <h6 style="color:red; font-style:italic;">{$error}</h6>
            {/if}
            {if isset($succes)}
                <h6 style="color:green; font-style:italic;">{$succes}</h6>
            {/if}
            <form class="formulaire" action="/Utilisateur/{block name="action_form"}connect{/block}" method="post">
            <div>
            <label for="mail">Mail : </label>
            <input class="champs" type="text" name="mail" required placeholder="xxx@domain_name.com" pattern=".*@.*\..*" value="{($smarty.session.mail|default:'')}" {block name="disable_mail"}{/block} />
            </div>
            {block name="input_inscription"}{/block}
            <div>
            <label for="mdp"{block name="for_mdp"}>M{/block}ot de passe : </label>
            <input class="champs" type="password" name="password" required />
            </div>
            {block name="input_inscription_confirmation"}{/block}
            <div>
            <input class="btn--primary" type="submit" value="Valider" name="inscription"/>
            <input class="btn--danger" type="reset" value="Effacer"/>
            </div>
            </form>
            {block name="proposition_inscription"}
            <span>
                <p>Pas encore de compte ? <a href="/pages/view/inscription">S'inscrire</a> </p>
            </span>
            {/block}
        </div>
    </div>
{/block}