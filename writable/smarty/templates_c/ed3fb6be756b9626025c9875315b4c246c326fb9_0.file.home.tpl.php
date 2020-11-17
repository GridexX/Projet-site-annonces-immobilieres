<?php
/* Smarty version 3.1.34-dev-7, created on 2020-11-12 13:55:53
  from '/var/www/html/Projet-site-annonces-immobilieres/app/Views/templates/home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fad934915b194_20566537',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ed3fb6be756b9626025c9875315b4c246c326fb9' => 
    array (
      0 => '/var/www/html/Projet-site-annonces-immobilieres/app/Views/templates/home.tpl',
      1 => 1605209179,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fad934915b194_20566537 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Test</title>
</head>

<body>
    <h1><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8699426805fad93491597c7_80533639', "titre");
?>
</h1>
    <footer>&copy; Arsène Fougerouse & Andréa Duhamel, UIT d'Aix-Marseille site d'Arles</footer>
</body>
</html><?php }
/* {block "titre"} */
class Block_8699426805fad93491597c7_80533639 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titre' => 
  array (
    0 => 'Block_8699426805fad93491597c7_80533639',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
home.TITRE<?php
}
}
/* {/block "titre"} */
}
