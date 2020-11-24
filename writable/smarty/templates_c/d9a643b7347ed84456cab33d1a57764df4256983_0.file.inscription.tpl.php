<?php
/* Smarty version 3.1.34-dev-7, created on 2020-11-22 07:30:44
  from '/var/www/html/app/Views/templates/inscription.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fba6804785c95_85352608',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd9a643b7347ed84456cab33d1a57764df4256983' => 
    array (
      0 => '/var/www/html/app/Views/templates/inscription.tpl',
      1 => 1606051838,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fba6804785c95_85352608 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17401236785fba6804783550_10516221', "titre_form");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5735954015fba6804784b79_74493189', "formulaire");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'formulaire.tpl');
}
/* {block "titre_form"} */
class Block_17401236785fba6804783550_10516221 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titre_form' => 
  array (
    0 => 'Block_17401236785fba6804783550_10516221',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Inscription<?php
}
}
/* {/block "titre_form"} */
/* {block "formulaire"} */
class Block_5735954015fba6804784b79_74493189 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'formulaire' => 
  array (
    0 => 'Block_5735954015fba6804784b79_74493189',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    
    <form class="formulaire" action="/Utilisateur/create" method="post">
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
<?php
}
}
/* {/block "formulaire"} */
}
