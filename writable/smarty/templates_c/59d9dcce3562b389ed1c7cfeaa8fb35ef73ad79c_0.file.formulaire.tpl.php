<?php
/* Smarty version 3.1.34-dev-7, created on 2020-11-14 08:00:09
  from '/var/www/html/app/Views/templates/formulaire.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fafe2e9c132d7_69270487',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '59d9dcce3562b389ed1c7cfeaa8fb35ef73ad79c' => 
    array (
      0 => '/var/www/html/app/Views/templates/formulaire.tpl',
      1 => 1605362408,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fafe2e9c132d7_69270487 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_55785625fafe2e9c11093_29844953', "output_area");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'main.tpl');
}
/* {block "titre_form"} */
class Block_5632476735fafe2e9c11aa4_37685136 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
formulaire.TITRE<?php
}
}
/* {/block "titre_form"} */
/* {block "formulaire"} */
class Block_20045576055fafe2e9c12781_89473122 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                zone du formulaire d'inscription ou de connexion
            <?php
}
}
/* {/block "formulaire"} */
/* {block "output_area"} */
class Block_55785625fafe2e9c11093_29844953 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'output_area' => 
  array (
    0 => 'Block_55785625fafe2e9c11093_29844953',
  ),
  'titre_form' => 
  array (
    0 => 'Block_5632476735fafe2e9c11aa4_37685136',
  ),
  'formulaire' => 
  array (
    0 => 'Block_20045576055fafe2e9c12781_89473122',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="flex-container" style="margin-top: 2rem;">
        <div class="formulaire-container w33 item-center">
            <h2><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5632476735fafe2e9c11aa4_37685136', "titre_form", $this->tplIndex);
?>
</h2>
            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20045576055fafe2e9c12781_89473122', "formulaire", $this->tplIndex);
?>

        </div>
    </div>
<?php
}
}
/* {/block "output_area"} */
}
