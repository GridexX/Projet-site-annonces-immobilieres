<?php
/* Smarty version 3.1.34-dev-7, created on 2020-11-29 13:12:32
  from '/var/www/html/app/Views/templates/inscription.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fc3f2a0e03b20_35805322',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd9a643b7347ed84456cab33d1a57764df4256983' => 
    array (
      0 => '/var/www/html/app/Views/templates/inscription.tpl',
      1 => 1606666004,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fc3f2a0e03b20_35805322 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15602770915fc3f2a0df44b7_94532370', "titre_onglet");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_742401205fc3f2a0df58b5_64305299', "titre_form");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16456958645fc3f2a0df6d55_97510361', "action_form");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4264312445fc3f2a0df81c6_82007536', "input_inscription");
?>

        

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_64715835fc3f2a0e01d60_44934851', "input_inscription_confirmation");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15499352315fc3f2a0e03468_89506318', "proposition_inscription");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'connexion.tpl');
}
/* {block "titre_onglet"} */
class Block_15602770915fc3f2a0df44b7_94532370 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titre_onglet' => 
  array (
    0 => 'Block_15602770915fc3f2a0df44b7_94532370',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Inscription<?php
}
}
/* {/block "titre_onglet"} */
/* {block "titre_form"} */
class Block_742401205fc3f2a0df58b5_64305299 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titre_form' => 
  array (
    0 => 'Block_742401205fc3f2a0df58b5_64305299',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Inscription<?php
}
}
/* {/block "titre_form"} */
/* {block "action_form"} */
class Block_16456958645fc3f2a0df6d55_97510361 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'action_form' => 
  array (
    0 => 'Block_16456958645fc3f2a0df6d55_97510361',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
create<?php
}
}
/* {/block "action_form"} */
/* {block "input_inscription"} */
class Block_4264312445fc3f2a0df81c6_82007536 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'input_inscription' => 
  array (
    0 => 'Block_4264312445fc3f2a0df81c6_82007536',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div>
    <label for="pseudo">Pseudo : </label>
    <input class="champs" type="text" name="pseudo" required value="<?php echo ((($tmp = @$_SESSION['pseudo'])===null||$tmp==='' ? '' : $tmp));?>
" placeholder="MomoDu69" />
    </div>
    <div>
    <label for="prenom">Prénom : </label>
    <input class="champs" type="text" name="prenom" required value="<?php echo ((($tmp = @$_SESSION['prenom'])===null||$tmp==='' ? '' : $tmp));?>
" placeholder="Momo"/>
    </div>
    <div>
    <label for="nom">Nom : </label>
    <input class="champs" type="text" name="nom" required value="<?php echo ((($tmp = @$_SESSION['nom'])===null||$tmp==='' ? '' : $tmp));?>
" placeholder="Durant"/>
    </div>

<?php
}
}
/* {/block "input_inscription"} */
/* {block "nv_mdp"} */
class Block_6742323975fc3f2a0e02599_95962306 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "nv_mdp"} */
/* {block "input_inscription_confirmation"} */
class Block_64715835fc3f2a0e01d60_44934851 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'input_inscription_confirmation' => 
  array (
    0 => 'Block_64715835fc3f2a0e01d60_44934851',
  ),
  'nv_mdp' => 
  array (
    0 => 'Block_6742323975fc3f2a0e02599_95962306',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6742323975fc3f2a0e02599_95962306', "nv_mdp", $this->tplIndex);
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
class Block_15499352315fc3f2a0e03468_89506318 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'proposition_inscription' => 
  array (
    0 => 'Block_15499352315fc3f2a0e03468_89506318',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "proposition_inscription"} */
}
