
    <div class="flex-container" id="notif" >
        <div class="item-center txtcenter notif-container {$notification.type}">
            <span><p>{$notification.message}<button onclick="{($notification.lien == false) ? 'hideNotif();':"window.location.href='{$notification.lien}'"}" class="btn--close"><i class="fas fa-times"></i></button></p></span>
        </div>
    </div>
    <script>
        function hideNotif()
        {
            document.getElementById("notif").style.display = "none";
        }
    </script>
