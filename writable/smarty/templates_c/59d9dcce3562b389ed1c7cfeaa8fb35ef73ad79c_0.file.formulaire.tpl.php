<?php
/* Smarty version 3.1.34-dev-7, created on 2020-11-22 08:13:35
  from '/var/www/html/app/Views/templates/formulaire.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fba720fa931c3_05231889',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '59d9dcce3562b389ed1c7cfeaa8fb35ef73ad79c' => 
    array (
      0 => '/var/www/html/app/Views/templates/formulaire.tpl',
      1 => 1606054400,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fba720fa931c3_05231889 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3656198195fba720fa8bff5_73446098', "output_area");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'main.tpl');
}
/* {block "titre_form"} */
class Block_3507623635fba720fa8cbe3_20946638 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
formulaire.TITRE<?php
}
}
/* {/block "titre_form"} */
/* {block "formulaire"} */
class Block_1138059635fba720fa923e2_20030532 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                zone du formulaire d'inscription ou de connexion
            <?php
}
}
/* {/block "formulaire"} */
/* {block "output_area"} */
class Block_3656198195fba720fa8bff5_73446098 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'output_area' => 
  array (
    0 => 'Block_3656198195fba720fa8bff5_73446098',
  ),
  'titre_form' => 
  array (
    0 => 'Block_3507623635fba720fa8cbe3_20946638',
  ),
  'formulaire' => 
  array (
    0 => 'Block_1138059635fba720fa923e2_20030532',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="flex-container" style="margin-top: 2rem;">
        <div class="formulaire-container w33 item-center">
            <h2><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3507623635fba720fa8cbe3_20946638', "titre_form", $this->tplIndex);
?>
</h2>
            <?php if ((isset($_smarty_tpl->tpl_vars['error']->value))) {?>
            <h6 style="color:red; font-style:italic;"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</h6>
            <?php }?>
            
            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1138059635fba720fa923e2_20030532', "formulaire", $this->tplIndex);
?>

        </div>
    </div>
<?php
}
}
/* {/block "output_area"} */
}
