{extends 'inscription.tpl'}
{block name="titre_onglet"}Profil{/block}
{block name="titre_form"}Editer le profil{/block}
{block name="action_form"}update{/block}
{block name="for_mdp"}style="width:24rem;" >Ancien m{/block}
{block name="disable_mail"}disabled{/block}

{block name="nv_mdp"}
<div>
    <label style="width:24rem;" for="confirmation">Nouveau mot de passe : </label>
    <input class="champs" type="password" name="new-password" />
    </div>
{/block}
{block name="mdp-required"}{/block}