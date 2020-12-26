<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-26 08:27:16
  from '/var/www/html/app/Views/templates/header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fe74844aa40b7_92023856',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8ceb1e664cc47fdcec539eb26fadc34c0541f83f' => 
    array (
      0 => '/var/www/html/app/Views/templates/header.tpl',
      1 => 1608992233,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fe74844aa40b7_92023856 (Smarty_Internal_Template $_smarty_tpl) {
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11772295975fe74844aa2ce1_22115162', "divBtnConnexion");
?>

    </div>
</div>
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19945308195fe74844aa39e3_08348029', "script");
}
/* {block "divBtnConnexion"} */
class Block_11772295975fe74844aa2ce1_22115162 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'divBtnConnexion' => 
  array (
    0 => 'Block_11772295975fe74844aa2ce1_22115162',
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
class Block_19945308195fe74844aa39e3_08348029 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_19945308195fe74844aa39e3_08348029',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "script"} */
}
