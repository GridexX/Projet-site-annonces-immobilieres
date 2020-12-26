{extends 'header.tpl'}
{block name="divBtnConnexion"}

        <div class="w33 navbar-div item-center dropdown txtcenter">
                <button onclick="myFunction()" id="dropdown-button" class="dropdown-button center w40">{$smarty.session.pseudo}</button>
                <div id="dropdown-content" class="dropdown-content w40">
                    <a href="/annonce/view/nouvelle_annonce">Créer une annonce</a>
                    <a href="/pages/view/edition_profil">Gérer le Profil</a>
<<<<<<< HEAD
                    <a href="/annonce/mesAnnonces">Editer les annonces</a>
                    <a href="/pages/view/messagerie">Messagerie</a>
=======
                    <a href="#">Editer les annonces</a>
                    <a href="/messagerie/createConv/{$smarty.session.mail}">Messagerie</a>
>>>>>>> 2c764e2420132116e01612d8e025c8bb315dac3c
                    <a class="red" href="/pages/deconnexion">Déconnexion</a>
                </div>                
        </div>

{/block}
{block name="script"}
<script>
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
</script>
{/block}