{extends 'header.tpl'}
{block name="divBtnConnexion"}

        <div class="w33 navbar-div item-center dropdown txtcenter">
                <button onclick="myFunction()" id="dropdown-button" class="dropdown-button center w40">{$smarty.session.pseudo}</button>
                <div id="dropdown-content" class="dropdown-content w40">
                    <a href="/annonce/view/nouvelle_annonce">Créer une annonce <i class="fas fa-plus"></i></a>
                    <a href="/pages/view/edition_profil">Gérer le Profil <i class="fas fa-user-edit"></i></a>
                    <a href="/annonce/mesAnnonces">Editer les annonces <i class="fas fa-edit"></i></a>
                    <a href="/messagerie/createConv/{$smarty.session.mail}">Messagerie <i class="fas fa-envelope"></i></a>
                    <a class="red" href="/pages/deconnexion">Déconnexion <i class="fas fa-sign-out-alt"></i></a>
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