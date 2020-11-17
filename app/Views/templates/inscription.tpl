{extends 'formulaire.tpl'}
{block name="titre_form"}Inscription{/block}
{block name="formulaire"}
    
    <form class="formulaire ">
        <div>
        <label for="pseudo">Pseudo : </label>
        <input class="champs" type="text" name="pseudo" required placeholder="MomoDu69"/>
        </div>
        <div>
        <label for="prenom">Prénom : </label>
        <input class="champs" type="text" name="prenom" required placeholder="Momo"/>
        </div>
        <div>
        <label for="nom">Nom : </label>
        <input class="champs" type="text" name="nom" required placeholder="Durant"/>
        </div>
        <div>
        <label for="mail">Mail : </label>
        <input class="champs" type="text" name="mail" required placeholder="xxx@domain_name.com" pattern=".*@.*\..*"/>
        </div>
        <div>
        <label for="mdp">Mot de passe : </label>
        <input class="champs" type="password" name="password" required />
        </div>
        <div>
        <label for="confirmation">Confirmation mot de passe : </label>
        <input class="champs" type="password" name="confirmation" required />
        </div>
        <div>
        <input class="btn--primary" type="submit" value="Valider" name="inscription"/>
        <input class="btn--danger" type="reset" value="Effacer"/>
        </div>
    </form>
{/block}