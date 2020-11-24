<?php
/* Smarty version 3.1.34-dev-7, created on 2020-11-22 07:46:38
  from '/var/www/html/app/Views/templates/connexion.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fba6bbe63d9e1_70225220',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6fce5cc73d5d0ac0ec8648cfaa5d159f978b7bf1' => 
    array (
      0 => '/var/www/html/app/Views/templates/connexion.tpl',
      1 => 1606052752,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fba6bbe63d9e1_70225220 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16423314475fba6bbe63b847_74550963', "titre_form");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20995362225fba6bbe63cca8_48444861', "formulaire");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'formulaire.tpl');
}
/* {block "titre_form"} */
class Block_16423314475fba6bbe63b847_74550963 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titre_form' => 
  array (
    0 => 'Block_16423314475fba6bbe63b847_74550963',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Connexion<?php
}
}
/* {/block "titre_form"} */
/* {block "formulaire"} */
class Block_20995362225fba6bbe63cca8_48444861 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'formulaire' => 
  array (
    0 => 'Block_20995362225fba6bbe63cca8_48444861',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    
    <form class="formulaire" action="/Utilisateur/connect" method="post">
        <div>
        <label for="mail">Mail : </label>
        <input class="champs" type="text" name="mail" required placeholder="xxx@domain_name.com" pattern=".*@.*\..*"/>
        </div>
        <div>
        <label for="mdp">Mot de passe : </label>
        <input class="champs" type="password" name="password" required />
        </div>
        <div>
        <input class="btn--primary" type="submit" value="Valider" name="inscription"/>
        <input class="btn--danger" type="reset" value="Effacer"/>
        </div>
    </form>
    <span>
        <p>Pas encore de compte ? <a href="">S'inscrire</a> </p>
    </span>
 
<?php
}
}
/* {/block "formulaire"} */
}
