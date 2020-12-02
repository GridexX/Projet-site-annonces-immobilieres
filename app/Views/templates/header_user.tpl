<div class="navbar navbar-fixed_top">
    <div class="flex-container">
        <div class="w33 navbar-div item-center txtcenter">
            <button class="bouton btn-bleu center"><a class="lien" href="/pages/view/liste_annonce">Afficher les annonces</a></button>
        </div>
        <div class="w33 navbar-div item-center txtcenter">
            <img src="/Images/logo_house.png" class="center" alt="House logo">
        </div>
        <div class="w33 navbar-div item-center dropdown txtcenter">
                <button onclick="myFunction()" id="dropdown-button" class="dropdown-button center w40">Mon Profil</button>
                <div id="dropdown-content" class="dropdown-content w40">
                    <a href="#">Gérer le Profil</a>
                    <a href="#">Editer les annonces</a>
                    <a href="#">Messagerie</a>
                    <a class="red" href="#">Déconnexion</a>
                </div>                
        </div>
    </div>
</div>
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