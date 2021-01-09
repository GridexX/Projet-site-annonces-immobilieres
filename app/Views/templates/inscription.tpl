
{extends 'connexion.tpl'}
{block name="titre_onglet"}Inscription{/block}
{block name="titre_form"}Inscription{/block}
{block name="action_form"}create{/block}

{block name="input_inscription"}
    <div>
    <label for="pseudo">Pseudo : </label>
    <input class="champs" type="text" name="pseudo" required value="{($uti.U_pseudo|default:($smarty.session.pseudo|default:''))}" placeholder="MomoDu69" />
    </div>
    <div>
    <label for="prenom">Prénom : </label>
    <input class="champs" type="text" name="prenom" required value="{($uti.U_prenom|default:($smarty.session.prenom|default:''))}" placeholder="Momo"/>
    </div>
    <div>
    <label for="nom">Nom : </label>
    <input class="champs" type="text" name="nom" required value="{($uti.U_nom|default:($smarty.session.nom|default:''))}" placeholder="Durant"/>
    </div>

{/block}
        

{block name="input_inscription_confirmation"}
    {block name="nv_mdp"}{/block}
    <div>
    <label style="width:24rem;" for="confirmation">Confirmation mot de passe : </label>
    <input class="champs" type="password" name="confirmation" oninvalid="this.setCustomValidity('Doit être identique au mot de passe')" />
    <br /><small><i>* 2 derniers champs non obligatoires si pas de modification du mot de passe</i></small>
    </div>

{/block}

{block name="proposition_inscription"}{/block}