<?php
/* Smarty version 3.1.34-dev-7, created on 2020-11-19 06:45:38
  from 'C:\xampp\htdocs\Projet-site-annonces-immobilieres\app\Views\templates\header_user.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fb668f2410958_23188847',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '90eaa05665c2429f91000f88b51af14802b4e33d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Projet-site-annonces-immobilieres\\app\\Views\\templates\\header_user.tpl',
      1 => 1605789919,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fb668f2410958_23188847 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="navbar navbar-fixed_top">
    <div class="flex-container">
        <div class="w33 navbar-div item-center txtcenter">
            <button class="btn--primary">Afficher les annonces</button>
        </div>
        <div class="w33 navbar-div item-center txtcenter">
            <img src="/Images/logo_house.png" class="center" alt="House logo">
        </div>
        <div class="w33 navbar-div item-center dropdown txtcenter">
                <button onclick="myFunction()" id="dropdown-button" class="dropdown-button center w40">Mon Profil</button>
                <div id="dropdown-content" class="dropdown-content w40">
                    <a href="#">Pseudo</a>
                    <a href="#">Gérer le Profil</a>
                    <a href="#">Editer les annonces</a>
                    <a class="red" href="#">Déconnexion</a>
                </div>                
        </div>
    </div>
</div>
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
><?php }
}
