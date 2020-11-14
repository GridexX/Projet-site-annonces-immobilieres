<?php
/* Smarty version 3.1.34-dev-7, created on 2020-11-13 10:58:35
  from '/var/www/html/Projet-site-annonces-immobilieres/app/Views/templates/main.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5faebb3b791588_29981522',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6844456e9fef2a44a084d12959f8786b4f1e2ec8' => 
    array (
      0 => '/var/www/html/Projet-site-annonces-immobilieres/app/Views/templates/main.tpl',
      1 => 1605286714,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5faebb3b791588_29981522 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8"/>
        <meta name="description" content="Projet site petites annonces immobilières. Réalisé dans le cadre du S3 en DUT Informatique">
        <meta name="author" content="Andréa Duhamel, Arsène Fougerouse">
        <meta name="keywords" content="HTML, CSS, CodeIgniter, PHP, SQL, Smarty">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
		<link rel="stylesheet" href="../css/colors.css" />
        <link rel="icon" type="image/png" href="../images/logo_site.png" />
        <title><?php echo $_smarty_tpl->tpl_vars['titre']->value;?>
</title>
	</head>

    <body>
        <div class="navbar navbar-fixed_top">
    <div class="flex-container purple">
        <div class="w33"><button class="btn--primary">Afficher les annonces</button></div>
        <span class="item-fluid">
            <img src="/Views/images/house_logo.png" alt="House logo">
        </span>
        <span class="item-fluid"><button class="btn--success">Connexion</button></span>
    </div>
</div>

        <footer>
            <p>&copy; 2020 Andréa Duhamel & Arsène Fougerouse, IUT D'Aix-Marseille campus d'Arles</p>
        </footer>
    </body>
</html><?php }
}
