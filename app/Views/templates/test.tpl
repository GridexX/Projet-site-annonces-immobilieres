{extends file="main.tpl"}
{block name="output_area"}
    <div class="flex-container" id="notif">
        <div class="item-center txtcenter notif-container success">
            <span><p>Votre annonce machin <button onclick="hideNotif();" class="btn--close"><i class="fas fa-times"></i></button></p></span>
        </div>
    </div>
    <script>
        function hideNotif()
        {
            document.getElementById("notif").style.display = "none";
        }
    </script>
{/block}