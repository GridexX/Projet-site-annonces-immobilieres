<?php
/* Smarty version 3.1.34-dev-7, created on 2020-11-17 08:38:41
  from 'C:\xampp\htdocs\Projet-site-annonces-immobilieres\app\Views\templates\connexion.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fb3e071452eb3_68392142',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ec4a6bd57823d7fc0262c7a68a5071097e93d35a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Projet-site-annonces-immobilieres\\app\\Views\\templates\\connexion.tpl',
      1 => 1605623919,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fb3e071452eb3_68392142 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19044991385fb3e071452005_94492312', "titre_form");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7324935315fb3e0714529f6_15097847', "formulaire");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'formulaire.tpl');
}
/* {block "titre_form"} */
class Block_19044991385fb3e071452005_94492312 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titre_form' => 
  array (
    0 => 'Block_19044991385fb3e071452005_94492312',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Connexion<?php
}
}
/* {/block "titre_form"} */
/* {block "formulaire"} */
class Block_7324935315fb3e0714529f6_15097847 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'formulaire' => 
  array (
    0 => 'Block_7324935315fb3e0714529f6_15097847',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    
    <form class="formulaire ">
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
