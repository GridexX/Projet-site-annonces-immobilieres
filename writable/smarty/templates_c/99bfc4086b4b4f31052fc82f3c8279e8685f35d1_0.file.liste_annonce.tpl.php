<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-26 08:00:58
  from 'C:\xampp\htdocs\Projet-site-annonces-immobilieres\app\Views\templates\liste_annonce.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fe7421a5bf993_03161320',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '99bfc4086b4b4f31052fc82f3c8279e8685f35d1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Projet-site-annonces-immobilieres\\app\\Views\\templates\\liste_annonce.tpl',
      1 => 1608991252,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fe7421a5bf993_03161320 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20921538995fe7421a57d330_48835375', "titre_onglet");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4403226005fe7421a57f098_70978311', "output_area");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'main.tpl');
}
/* {block "titre_onglet"} */
class Block_20921538995fe7421a57d330_48835375 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titre_onglet' => 
  array (
    0 => 'Block_20921538995fe7421a57d330_48835375',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Accueil<?php
}
}
/* {/block "titre_onglet"} */
/* {block "output_area"} */
class Block_4403226005fe7421a57f098_70978311 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'output_area' => 
  array (
    0 => 'Block_4403226005fe7421a57f098_70978311',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php if ((isset($_smarty_tpl->tpl_vars['lBoutons']->value))) {?>
    <div class="flex-container w75 center">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['lBoutons']->value, 'bouton');
$_smarty_tpl->tpl_vars['bouton']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['bouton']->value) {
$_smarty_tpl->tpl_vars['bouton']->do_else = false;
?>
        <a href="/annonce/viewListe/<?php echo $_smarty_tpl->tpl_vars['bouton']->value['numAnnDeb'];?>
/<?php echo $_smarty_tpl->tpl_vars['nbAnnonces']->value;?>
"><button class="bouton <?php echo $_smarty_tpl->tpl_vars['bSelect']->value >= $_smarty_tpl->tpl_vars['bouton']->value['numAnnDeb'] && $_smarty_tpl->tpl_vars['bSelect']->value < $_smarty_tpl->tpl_vars['bouton']->value['numAnnFin'] ? 'btn-green' : 'btn-bleu';?>
 center"><?php echo $_smarty_tpl->tpl_vars['bouton']->value['numPage'];?>
</button></a>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <select onchange="location = this.value;">
            <option default>Afficher <?php echo $_smarty_tpl->tpl_vars['nbAnnonces']->value;?>
 annonces par pages</option>
            <option value="/annonce/viewListe/<?php echo $_smarty_tpl->tpl_vars['bSelect']->value;?>
/15">15 </option>
            <option value="/annonce/viewListe/<?php echo $_smarty_tpl->tpl_vars['bSelect']->value;?>
/30">30 </option>
            <option value="/annonce/viewListe/<?php echo $_smarty_tpl->tpl_vars['bSelect']->value;?>
/50">50 </option>
            <option value="/annonce/viewListe/<?php echo $_smarty_tpl->tpl_vars['bSelect']->value;?>
/100">100</option>
        </select>
    </div>
<?php }
if ((isset($_smarty_tpl->tpl_vars['liste_annonce']->value))) {?>
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
            <img class="w90 center" <?php if ((isset($_smarty_tpl->tpl_vars['annonce']->value['P_photo']))) {?> src='/uploads/<?php echo $_smarty_tpl->tpl_vars['annonce']->value['A_idannonce'];?>
/<?php echo $_smarty_tpl->tpl_vars['annonce']->value['P_photo']['P_titre'];?>
' <?php } else { ?> src='/Images/logo_site.png' <?php }?> } alt="House logo">
        </div> 
        <div class="w65"> 
            <p> <?php echo $_smarty_tpl->tpl_vars['annonce']->value['A_titre'];?>
 : <?php echo $_smarty_tpl->tpl_vars['annonce']->value['A_cout_loyer']+$_smarty_tpl->tpl_vars['annonce']->value['A_cout_charges'];?>
 €<?php if ((isset($_SESSION['mail'])) && $_SESSION['mail'] === $_smarty_tpl->tpl_vars['annonce']->value['U_mail']) {?> <?php if ($_smarty_tpl->tpl_vars['annonce']->value['A_etat'] === 'publiée') {?><span style="color:green"><i class="fas fa-check-circle"></i></span><?php } else { ?><span style="color:orange"><i class="fas fa-clock"></i></span><?php }
}?></p>
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
<?php }
}
}
/* {/block "output_area"} */
}
