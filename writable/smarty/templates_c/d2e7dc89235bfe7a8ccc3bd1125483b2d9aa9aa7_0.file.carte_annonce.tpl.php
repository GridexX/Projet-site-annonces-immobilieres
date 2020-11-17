<?php
/* Smarty version 3.1.34-dev-7, created on 2020-11-17 09:00:06
  from 'C:\xampp\htdocs\Projet-site-annonces-immobilieres\app\Views\templates\carte_annonce.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fb3e576b6e072_20360687',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd2e7dc89235bfe7a8ccc3bd1125483b2d9aa9aa7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Projet-site-annonces-immobilieres\\app\\Views\\templates\\carte_annonce.tpl',
      1 => 1605625199,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fb3e576b6e072_20360687 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3016964515fb3e576b6d482_61934645', "output_area");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'main.tpl');
}
/* {block "output_area"} */
class Block_3016964515fb3e576b6d482_61934645 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'output_area' => 
  array (
    0 => 'Block_3016964515fb3e576b6d482_61934645',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="carte_annonce">
    <div class="annonce">
        <img src="/Images/logo_site.png" alt="House logo">
    </div>
</div>
<?php
}
}
/* {/block "output_area"} */
}
