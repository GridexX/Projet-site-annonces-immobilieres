<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-05 11:30:20
  from 'C:\xampp\htdocs\Projet-site-annonces-immobilieres\app\Views\templates\liste_annonce.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fcbc3acc5ecb3_15713665',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '99bfc4086b4b4f31052fc82f3c8279e8685f35d1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Projet-site-annonces-immobilieres\\app\\Views\\templates\\liste_annonce.tpl',
      1 => 1607189259,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fcbc3acc5ecb3_15713665 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6103187755fcbc3ac8b2734_71987984', "titre_onglet");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12516046005fcbc3ac8b7311_97324751', "output_area");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'main.tpl');
}
/* {block "titre_onglet"} */
class Block_6103187755fcbc3ac8b2734_71987984 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titre_onglet' => 
  array (
    0 => 'Block_6103187755fcbc3ac8b2734_71987984',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Accueil<?php
}
}
/* {/block "titre_onglet"} */
/* {block "output_area"} */
class Block_12516046005fcbc3ac8b7311_97324751 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'output_area' => 
  array (
    0 => 'Block_12516046005fcbc3ac8b7311_97324751',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="liste_annonce flex-container w75 center">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['liste_annonce']->value, 'annonce');
$_smarty_tpl->tpl_vars['annonce']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['annonce']->value) {
$_smarty_tpl->tpl_vars['annonce']->do_else = false;
?>
        
    
    <a href="/annonce/view/annonce/<?php echo $_smarty_tpl->tpl_vars['annonce']->value['A_idannonce'];?>
" class="annonce flex-container center w45">
        <div class="w35">
            <img class="w90 center" src="/Images/logo_site.png" alt="House logo">
        </div> 
        <div class="w65"> 
            <p> <?php echo $_smarty_tpl->tpl_vars['annonce']->value['A_titre'];?>
 : <?php echo $_smarty_tpl->tpl_vars['annonce']->value['A_cout_loyer']+$_smarty_tpl->tpl_vars['annonce']->value['A_cout_charges'];?>
 €<?php if ((isset($_SESSION['mail'])) && $_SESSION['mail'] === $_smarty_tpl->tpl_vars['annonce']->value['U_mail']) {?><span style="color:green"><i class="fas fa-check-circle"></i></span><?php }?></p>
            <p> <?php echo $_smarty_tpl->tpl_vars['annonce']->value['A_superficie'];?>
m² <?php echo $_smarty_tpl->tpl_vars['annonce']->value['T_type'];?>
 | <?php echo $_smarty_tpl->tpl_vars['annonce']->value['A_ville'];?>
 </p>
            <small> Posté le <?php echo $_smarty_tpl->tpl_vars['annonce']->value['A_date_maj'];?>
</small> 
        </div>   
    </a>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</div>

<?php
}
}
/* {/block "output_area"} */
}
