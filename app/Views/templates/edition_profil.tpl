{extends 'inscription.tpl'}
{block name="titre_onglet"}Profil{/block}
{block name="titre_form"}Editer le profil{/block}
{block name="action_form"}update{/block}
{block name="for_mdp"}style="width:24rem;" >Ancien m{/block}
{block name="disable_mail"}disabled{/block}

{block name="nv_mdp"}
<div>
    <label style="width:24rem;" for="confirmation">Nouveau mot de passe : </label>
    <input class="champs" type="password" name="new-password" required oninvalid="this.setCustomValidity('Doit être identique au mot de passe')" />
    </div>
{/block}
{block name="delete_user"}
    {if !isset($confirmation) && !isset($smarty.session.admin)}
    <div class="flex-container" style="margin-top: 2rem;">
        <div class="formulaire-container w40 item-center txtcenter">
            <form class="formulaire" action="/utilisateur/delete/" method="post">
                <input class="btn--dark" id="submit-button" type="submit" value="Supprimer le profil" name="suppression" />
            </form>
        </div>
    </div>
    {/if}
{/block}