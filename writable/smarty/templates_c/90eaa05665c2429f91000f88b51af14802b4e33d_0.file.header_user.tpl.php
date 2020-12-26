<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-26 08:01:54
  from 'C:\xampp\htdocs\Projet-site-annonces-immobilieres\app\Views\templates\header_user.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fe74252e6d209_32217842',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '90eaa05665c2429f91000f88b51af14802b4e33d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Projet-site-annonces-immobilieres\\app\\Views\\templates\\header_user.tpl',
      1 => 1608991313,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fe74252e6d209_32217842 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6911138705fe74252e55914_64682361', "divBtnConnexion");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6268855275fe74252e6a8b8_69706915', "script");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'header.tpl');
}
/* {block "divBtnConnexion"} */
class Block_6911138705fe74252e55914_64682361 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'divBtnConnexion' => 
  array (
    0 => 'Block_6911138705fe74252e55914_64682361',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


        <div class="w33 navbar-div item-center dropdown txtcenter">
                <button onclick="myFunction()" id="dropdown-button" class="dropdown-button center w40"><?php echo $_SESSION['pseudo'];?>
</button>
                <div id="dropdown-content" class="dropdown-content w40">
                    <a href="/annonce/view/nouvelle_annonce">Créer une annonce</a>
                    <a href="/pages/view/edition_profil">Gérer le Profil</a>
                    <a href="/annonce/mesAnnonces">Editer les annonces</a>
                    <a href="/messagerie/createConv/<?php echo $_SESSION['mail'];?>
">Messagerie</a>
                    <a class="red" href="/pages/deconnexion">Déconnexion</a>
                </div>                
        </div>

<?php
}
}
/* {/block "divBtnConnexion"} */
/* {block "script"} */
class Block_6268855275fe74252e6a8b8_69706915 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_6268855275fe74252e6a8b8_69706915',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php echo '<script'; ?>
>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("dropdown-content").classList.toggle("show");
    document.getElementById("dropdown-button").classList.toggle("dropped-button");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(e) {
  if (!e.target.matches('.dropdown-button')) {
    var dropdowns = document.getElementsByClassName("dropdown-button");
    for (var d = 0; d < dropdowns.length; d++) {
      var openDropdown = dropdowns[d];
      if (openDropdown.classList.contains('dropped-button')) {
        openDropdown.classList.remove('dropped-button');
      }
    }
  }
  if (!e.target.matches('.dropdown-button')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    for (var d = 0; d < dropdowns.length; d++) {
      var openDropdown = dropdowns[d];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
<?php echo '</script'; ?>
>
<?php
}
}
/* {/block "script"} */
}
