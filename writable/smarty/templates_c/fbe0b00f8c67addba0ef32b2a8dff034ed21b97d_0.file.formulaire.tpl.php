<?php
/* Smarty version 3.1.34-dev-7, created on 2020-11-16 09:11:48
  from 'C:\xampp\htdocs\Projet-site-annonces-immobilieres\app\Views\templates\formulaire.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fb296b4ed6823_59042224',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fbe0b00f8c67addba0ef32b2a8dff034ed21b97d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Projet-site-annonces-immobilieres\\app\\Views\\templates\\formulaire.tpl',
      1 => 1605539237,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fb296b4ed6823_59042224 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8833613985fb296b4ed5637_61693132', "output_area");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'main.tpl');
}
/* {block "titre_form"} */
class Block_5094234715fb296b4ed5ab2_41997602 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
formulaire.TITRE<?php
}
}
/* {/block "titre_form"} */
/* {block "formulaire"} */
class Block_10235666205fb296b4ed6187_33902200 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                zone du formulaire d'inscription ou de connexion
            <?php
}
}
/* {/block "formulaire"} */
/* {block "output_area"} */
class Block_8833613985fb296b4ed5637_61693132 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'output_area' => 
  array (
    0 => 'Block_8833613985fb296b4ed5637_61693132',
  ),
  'titre_form' => 
  array (
    0 => 'Block_5094234715fb296b4ed5ab2_41997602',
  ),
  'formulaire' => 
  array (
    0 => 'Block_10235666205fb296b4ed6187_33902200',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="flex-container" style="margin-top: 2rem;">
        <div class="formulaire-container w33 item-center">
            <h2><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5094234715fb296b4ed5ab2_41997602', "titre_form", $this->tplIndex);
?>
</h2>
            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10235666205fb296b4ed6187_33902200', "formulaire", $this->tplIndex);
?>

        </div>
    </div>
<?php
}
}
/* {/block "output_area"} */
}
