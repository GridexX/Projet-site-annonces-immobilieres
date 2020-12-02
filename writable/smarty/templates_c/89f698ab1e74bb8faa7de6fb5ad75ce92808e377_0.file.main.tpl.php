<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-02 14:46:57
  from 'C:\xampp\htdocs\Projet-site-annonces-immobilieres\app\Views\templates\main.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fc7fd41e9b810_16318107',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '89f698ab1e74bb8faa7de6fb5ad75ce92808e377' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Projet-site-annonces-immobilieres\\app\\Views\\templates\\main.tpl',
      1 => 1606942015,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header_user.tpl' => 1,
  ),
),false)) {
function content_5fc7fd41e9b810_16318107 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8"/>
        <meta name="description" content="Projet site petites annonces immobilières. Réalisé dans le cadre du S3 en DUT Informatique">
        <meta name="author" content="Andréa Duhamel, Arsène Fougerouse">
        <meta name="keywords" content="HTML, CSS, CodeIgniter, PHP, SQL, Smarty">
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
		<link rel="stylesheet" href="/Css/stylesheet.css" />
        <link rel="stylesheet" href="/Css/knacss.css" />
        <link rel="icon" type="image/png" href="/Images/logo_site.png" />
        <title><?php echo $_smarty_tpl->tpl_vars['titre']->value;?>
</title>
	</head>
    <body>
        <div class="wrap">
            <?php $_smarty_tpl->_subTemplateRender("file:header_user.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
            <div class="container">
                <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6157320625fc7fd41e99d68_33438150', "output_area");
?>

            </div>
            <footer class="item-fluid">
                <p>&copy; 2020 Andréa Duhamel & Arsène Fougerouse, IUT D'Aix-Marseille campus d'Arles</p>
            </footer>
        </div>
    </body>
</html><?php }
/* {block "output_area"} */
class Block_6157320625fc7fd41e99d68_33438150 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'output_area' => 
  array (
    0 => 'Block_6157320625fc7fd41e99d68_33438150',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                    zone_principale
                <?php
}
}
/* {/block "output_area"} */
}
