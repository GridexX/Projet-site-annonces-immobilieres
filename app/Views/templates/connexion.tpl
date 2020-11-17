{extends 'formulaire.tpl'}
{block name="titre_form"}Connexion{/block}
{block name="formulaire"}
    
    <form>
        <div>
        <label for="mail">Mail : </label>
        <input type="text" name="mail" required placeholder="xxx@domain_name.com" pattern=".*@.*\..*"/>
        </div>
        <div>
        <label for="mdp">Mot de passe : </label>
        <input type="password" name="password" required />
        </div>
        <div>
        <input class="btn--primary" type="submit" value="Valider" name="inscription"/>
        <input class="btn--danger" type="reset" value="Effacer"/>
        </div>
    </form>
    <span>
        <p>Pas encore de compte ? <a href="">S'inscrire</a> </p>
    </span>
 
{/block}