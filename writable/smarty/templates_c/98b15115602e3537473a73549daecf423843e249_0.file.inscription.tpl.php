<?php
/* Smarty version 3.1.34-dev-7, created on 2020-11-17 08:42:42
  from 'C:\xampp\htdocs\Projet-site-annonces-immobilieres\app\Views\templates\inscription.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fb3e162b9d137_66467513',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '98b15115602e3537473a73549daecf423843e249' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Projet-site-annonces-immobilieres\\app\\Views\\templates\\inscription.tpl',
      1 => 1605623991,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fb3e162b9d137_66467513 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13889859805fb3e162b9c3b5_96834814', "titre_form");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9456166225fb3e162b9cc86_93119762', "formulaire");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'formulaire.tpl');
}
/* {block "titre_form"} */
class Block_13889859805fb3e162b9c3b5_96834814 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titre_form' => 
  array (
    0 => 'Block_13889859805fb3e162b9c3b5_96834814',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Inscription<?php
}
}
/* {/block "titre_form"} */
/* {block "formulaire"} */
class Block_9456166225fb3e162b9cc86_93119762 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'formulaire' => 
  array (
    0 => 'Block_9456166225fb3e162b9cc86_93119762',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    
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
<?php
}
}
/* {/block "formulaire"} */
}
