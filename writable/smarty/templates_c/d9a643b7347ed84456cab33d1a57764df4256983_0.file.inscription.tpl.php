<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-04 04:22:26
  from '/var/www/html/app/Views/templates/inscription.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fca0de2bf7255_55768298',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd9a643b7347ed84456cab33d1a57764df4256983' => 
    array (
      0 => '/var/www/html/app/Views/templates/inscription.tpl',
      1 => 1607076101,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fca0de2bf7255_55768298 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4365249275fca0de2be3e48_36718583', "titre_onglet");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_21042204835fca0de2be5206_88658764', "titre_form");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10239198735fca0de2be63b7_31421197', "action_form");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17247324515fca0de2be75e5_75902592', "input_inscription");
?>

        

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19927018375fca0de2bf4ae4_24683635', "input_inscription_confirmation");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19522291715fca0de2bf6a34_63923015', "proposition_inscription");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'connexion.tpl');
}
/* {block "titre_onglet"} */
class Block_4365249275fca0de2be3e48_36718583 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titre_onglet' => 
  array (
    0 => 'Block_4365249275fca0de2be3e48_36718583',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Inscription<?php
}
}
/* {/block "titre_onglet"} */
/* {block "titre_form"} */
class Block_21042204835fca0de2be5206_88658764 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titre_form' => 
  array (
    0 => 'Block_21042204835fca0de2be5206_88658764',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Inscription<?php
}
}
/* {/block "titre_form"} */
/* {block "action_form"} */
class Block_10239198735fca0de2be63b7_31421197 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'action_form' => 
  array (
    0 => 'Block_10239198735fca0de2be63b7_31421197',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
create<?php
}
}
/* {/block "action_form"} */
/* {block "input_inscription"} */
class Block_17247324515fca0de2be75e5_75902592 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'input_inscription' => 
  array (
    0 => 'Block_17247324515fca0de2be75e5_75902592',
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
class Block_530303685fca0de2bf5709_57429372 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "nv_mdp"} */
/* {block "input_inscription_confirmation"} */
class Block_19927018375fca0de2bf4ae4_24683635 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'input_inscription_confirmation' => 
  array (
    0 => 'Block_19927018375fca0de2bf4ae4_24683635',
  ),
  'nv_mdp' => 
  array (
    0 => 'Block_530303685fca0de2bf5709_57429372',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_530303685fca0de2bf5709_57429372', "nv_mdp", $this->tplIndex);
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
class Block_19522291715fca0de2bf6a34_63923015 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'proposition_inscription' => 
  array (
    0 => 'Block_19522291715fca0de2bf6a34_63923015',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "proposition_inscription"} */
}
