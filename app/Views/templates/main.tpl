<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8"/>
        <meta name="description" content="Projet site petites annonces immobilières. Réalisé dans le cadre du S3 en DUT Informatique">
        <meta name="author" content="Andréa Duhamel, Arsène Fougerouse">
        <meta name="keywords" content="HTML, CSS, CodeIgniter, PHP, SQL, Smarty">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
		<link rel="stylesheet" href="/Css/stylesheet.css" />
        <link rel="stylesheet" href="/Css/knacss.css" />
        <link rel="stylesheet" href="/Css/knacss.css" />
        <link rel="icon" type="image/png" href="/Images/logo_site.png" />
        <title>{$titre}</title>
	</head>

    <body>
        {include file="header.tpl"}
        <div class="container">
            {block name="output_area"}
                zone_principale
            {/block}

            <footer class="item-fluid">

                <p>&copy; 2020 Andréa Duhamel & Arsène Fougerouse, IUT D'Aix-Marseille campus d'Arles</p>
            </footer>
        </div>
    </body>
</html>