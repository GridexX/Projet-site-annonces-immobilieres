<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-26 07:57:18
  from 'C:\xampp\htdocs\Projet-site-annonces-immobilieres\app\Views\templates\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fe7413eab6737_38831866',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd2792c8d26eebdf8a269501465cbf7eebe12f69b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Projet-site-annonces-immobilieres\\app\\Views\\templates\\header.tpl',
      1 => 1608991035,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fe7413eab6737_38831866 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<div class="navbar navbar-fixed_top">
    <div class="flex-container">
        <div class="w33 navbar-div item-center txtcenter">
            <?php if ((isset($_smarty_tpl->tpl_vars['estAccueil']->value))) {?><button class="bouton btn-bleu center"><a class="lien" href="/annonce/viewListe">Afficher toutes les annonces</a></button><?php }?>
        </div>
        <span class="w33 navbar-div item-center txtcenter">
            <a href="/"><img src="/Images/logo_house.png" alt="House logo"></a>
        </span>
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16055745115fe7413eab3fc8_26835893', "divBtnConnexion");
?>

    </div>
</div>
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5870855255fe7413eab5a91_12622209', "script");
}
/* {block "divBtnConnexion"} */
class Block_16055745115fe7413eab3fc8_26835893 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'divBtnConnexion' => 
  array (
    0 => 'Block_16055745115fe7413eab3fc8_26835893',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        <span class="w33 navbar-div item-center txtcenter">
            <button class="bouton btn-vert center"><a class="lien" href="/pages/view/connexion">Connexion</a></button>
        </span>
        <?php
}
}
/* {/block "divBtnConnexion"} */
/* {block "script"} */
class Block_5870855255fe7413eab5a91_12622209 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_5870855255fe7413eab5a91_12622209',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "script"} */
}
