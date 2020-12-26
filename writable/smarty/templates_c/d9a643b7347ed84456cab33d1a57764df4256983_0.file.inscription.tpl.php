<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-26 10:21:45
  from '/var/www/html/app/Views/templates/inscription.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fe76319da4af0_02381899',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd9a643b7347ed84456cab33d1a57764df4256983' => 
    array (
      0 => '/var/www/html/app/Views/templates/inscription.tpl',
      1 => 1608992233,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fe76319da4af0_02381899 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15685087215fe76319d982b0_37175771', "titre_onglet");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15921344885fe76319d99212_87562198', "titre_form");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4497390575fe76319d99d24_60140199', "action_form");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5063636865fe76319d9a7c2_84167921', "input_inscription");
?>

        

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6658022045fe76319da2f21_84636283', "input_inscription_confirmation");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_423244335fe76319da4406_72804326', "proposition_inscription");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'connexion.tpl');
}
/* {block "titre_onglet"} */
class Block_15685087215fe76319d982b0_37175771 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titre_onglet' => 
  array (
    0 => 'Block_15685087215fe76319d982b0_37175771',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Inscription<?php
}
}
/* {/block "titre_onglet"} */
/* {block "titre_form"} */
class Block_15921344885fe76319d99212_87562198 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titre_form' => 
  array (
    0 => 'Block_15921344885fe76319d99212_87562198',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Inscription<?php
}
}
/* {/block "titre_form"} */
/* {block "action_form"} */
class Block_4497390575fe76319d99d24_60140199 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'action_form' => 
  array (
    0 => 'Block_4497390575fe76319d99d24_60140199',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
create<?php
}
}
/* {/block "action_form"} */
/* {block "input_inscription"} */
class Block_5063636865fe76319d9a7c2_84167921 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'input_inscription' => 
  array (
    0 => 'Block_5063636865fe76319d9a7c2_84167921',
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
class Block_16685023345fe76319da3678_29908812 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "nv_mdp"} */
/* {block "input_inscription_confirmation"} */
class Block_6658022045fe76319da2f21_84636283 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'input_inscription_confirmation' => 
  array (
    0 => 'Block_6658022045fe76319da2f21_84636283',
  ),
  'nv_mdp' => 
  array (
    0 => 'Block_16685023345fe76319da3678_29908812',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16685023345fe76319da3678_29908812', "nv_mdp", $this->tplIndex);
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
class Block_423244335fe76319da4406_72804326 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'proposition_inscription' => 
  array (
    0 => 'Block_423244335fe76319da4406_72804326',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "proposition_inscription"} */
}
