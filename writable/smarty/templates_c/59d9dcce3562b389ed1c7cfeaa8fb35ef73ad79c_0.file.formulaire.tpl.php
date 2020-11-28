<?php
/* Smarty version 3.1.34-dev-7, created on 2020-11-24 04:09:03
  from '/var/www/html/app/Views/templates/formulaire.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fbcdbbfceeba9_89433482',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '59d9dcce3562b389ed1c7cfeaa8fb35ef73ad79c' => 
    array (
      0 => '/var/www/html/app/Views/templates/formulaire.tpl',
      1 => 1606212473,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fbcdbbfceeba9_89433482 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18053544065fbcdbbfce8ec4_98880907', "output_area");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'main.tpl');
}
/* {block "titre_form"} */
class Block_13994801305fbcdbbfce97e7_88461289 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
formulaire.TITRE<?php
}
}
/* {/block "titre_form"} */
/* {block "formulaire"} */
class Block_14509588525fbcdbbfcee030_52426827 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                zone du formulaire d'inscription ou de connexion
            <?php
}
}
/* {/block "formulaire"} */
/* {block "output_area"} */
class Block_18053544065fbcdbbfce8ec4_98880907 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'output_area' => 
  array (
    0 => 'Block_18053544065fbcdbbfce8ec4_98880907',
  ),
  'titre_form' => 
  array (
    0 => 'Block_13994801305fbcdbbfce97e7_88461289',
  ),
  'formulaire' => 
  array (
    0 => 'Block_14509588525fbcdbbfcee030_52426827',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="flex-container" style="margin-top: 2rem;">
        <div class="formulaire-container w33 item-center">
            <h2><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13994801305fbcdbbfce97e7_88461289', "titre_form", $this->tplIndex);
?>
</h2>
            <?php if ((isset($_smarty_tpl->tpl_vars['error']->value))) {?>
                <h6 style="color:red; font-style:italic;"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</h6>
            <?php }?>
            
            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14509588525fbcdbbfcee030_52426827', "formulaire", $this->tplIndex);
?>

        </div>
    </div>
<?php
}
}
/* {/block "output_area"} */
}
