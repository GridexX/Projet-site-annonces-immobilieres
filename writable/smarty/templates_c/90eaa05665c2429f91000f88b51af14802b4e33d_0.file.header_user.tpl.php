<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-26 08:47:46
  from 'C:\xampp\htdocs\Projet-site-annonces-immobilieres\app\Views\templates\header_user.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fe74d12d7b042_86792505',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '90eaa05665c2429f91000f88b51af14802b4e33d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Projet-site-annonces-immobilieres\\app\\Views\\templates\\header_user.tpl',
      1 => 1608993997,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fe74d12d7b042_86792505 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13229039635fe74d12d69321_53920222', "divBtnConnexion");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_522512165fe74d12d78973_21409028', "script");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'header.tpl');
}
/* {block "divBtnConnexion"} */
class Block_13229039635fe74d12d69321_53920222 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'divBtnConnexion' => 
  array (
    0 => 'Block_13229039635fe74d12d69321_53920222',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


        <div class="w33 navbar-div item-center dropdown txtcenter">
                <button onclick="myFunction()" id="dropdown-button" class="dropdown-button center w40"><?php echo $_SESSION['pseudo'];?>
</button>
                <div id="dropdown-content" class="dropdown-content w40">
                    <a href="/annonce/view/nouvelle_annonce">Créer une annonce <i class="fas fa-plus"></i></a>
                    <a href="/pages/view/edition_profil">Gérer le Profil <i class="fas fa-user-edit"></i></a>
                    <a href="/annonce/mesAnnonces">Editer les annonces <i class="fas fa-edit"></i></a>
                    <a href="/messagerie/createConv/<?php echo $_SESSION['mail'];?>
">Messagerie <i class="fas fa-envelope"></i></a>
                    <a class="red" href="/pages/deconnexion">Déconnexion <i class="fas fa-sign-out-alt"></i></a>
                </div>                
        </div>

<?php
}
}
/* {/block "divBtnConnexion"} */
/* {block "script"} */
class Block_522512165fe74d12d78973_21409028 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_522512165fe74d12d78973_21409028',
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
