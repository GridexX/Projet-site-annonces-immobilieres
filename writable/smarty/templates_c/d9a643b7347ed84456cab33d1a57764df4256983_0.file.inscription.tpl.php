<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-31 06:20:53
  from '/var/www/html/app/Views/templates/inscription.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fedc225ba5e19_88286890',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd9a643b7347ed84456cab33d1a57764df4256983' => 
    array (
      0 => '/var/www/html/app/Views/templates/inscription.tpl',
      1 => 1609417252,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fedc225ba5e19_88286890 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17695792355fedc225b92190_18089793', "titre_onglet");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19577647205fedc225b92fc4_77433760', "titre_form");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12150500345fedc225b94944_40816435', "action_form");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16082846755fedc225b959b9_36348028', "input_inscription");
?>

        

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19630001935fedc225ba3ea4_90360925', "input_inscription_confirmation");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15105547465fedc225ba5677_95112962', "proposition_inscription");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'connexion.tpl');
}
/* {block "titre_onglet"} */
class Block_17695792355fedc225b92190_18089793 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titre_onglet' => 
  array (
    0 => 'Block_17695792355fedc225b92190_18089793',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Inscription<?php
}
}
/* {/block "titre_onglet"} */
/* {block "titre_form"} */
class Block_19577647205fedc225b92fc4_77433760 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titre_form' => 
  array (
    0 => 'Block_19577647205fedc225b92fc4_77433760',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Inscription<?php
}
}
/* {/block "titre_form"} */
/* {block "action_form"} */
class Block_12150500345fedc225b94944_40816435 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'action_form' => 
  array (
    0 => 'Block_12150500345fedc225b94944_40816435',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
create<?php
}
}
/* {/block "action_form"} */
/* {block "input_inscription"} */
class Block_16082846755fedc225b959b9_36348028 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'input_inscription' => 
  array (
    0 => 'Block_16082846755fedc225b959b9_36348028',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div>
    <label for="pseudo">Pseudo : </label>
    <input class="champs" type="text" name="pseudo" required value="<?php echo ((($tmp = @$_smarty_tpl->tpl_vars['uti']->value['U_pseudo'])===null||$tmp==='' ? ((($tmp = @$_SESSION['pseudo'])===null||$tmp==='' ? '' : $tmp)) : $tmp));?>
" placeholder="MomoDu69" />
    </div>
    <div>
    <label for="prenom">Prénom : </label>
    <input class="champs" type="text" name="prenom" required value="<?php echo ((($tmp = @$_smarty_tpl->tpl_vars['uti']->value['U_prenom'])===null||$tmp==='' ? ((($tmp = @$_SESSION['prenom'])===null||$tmp==='' ? '' : $tmp)) : $tmp));?>
" placeholder="Momo"/>
    </div>
    <div>
    <label for="nom">Nom : </label>
    <input class="champs" type="text" name="nom" required value="<?php echo ((($tmp = @$_smarty_tpl->tpl_vars['uti']->value['U_nom'])===null||$tmp==='' ? ((($tmp = @$_SESSION['nom'])===null||$tmp==='' ? '' : $tmp)) : $tmp));?>
" placeholder="Durant"/>
    </div>

<?php
}
}
/* {/block "input_inscription"} */
/* {block "nv_mdp"} */
class Block_1000067205fedc225ba4767_73521008 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "nv_mdp"} */
/* {block "input_inscription_confirmation"} */
class Block_19630001935fedc225ba3ea4_90360925 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'input_inscription_confirmation' => 
  array (
    0 => 'Block_19630001935fedc225ba3ea4_90360925',
  ),
  'nv_mdp' => 
  array (
    0 => 'Block_1000067205fedc225ba4767_73521008',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1000067205fedc225ba4767_73521008', "nv_mdp", $this->tplIndex);
?>

    <div>
    <label style="width:24rem;" for="confirmation">Confirmation mot de passe : </label>
    <input class="champs" type="password" name="confirmation" required oninvalid="this.setCustomValidity('Doit être identique au mot de passe')" />
    </div>

<?php
}
}
/* {/block "input_inscription_confirmation"} */
/* {block "proposition_inscription"} */
class Block_15105547465fedc225ba5677_95112962 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'proposition_inscription' => 
  array (
    0 => 'Block_15105547465fedc225ba5677_95112962',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "proposition_inscription"} */
}
