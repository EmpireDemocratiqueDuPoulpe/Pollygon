<!DOCTYPE html>

<html lang="fr">
    <head>
        <title>Pollygon</title>
        <?php include_once(ROOT."/views/models/head.php"); ?>
    </head>
    <body>
        <!-- Header -->
        <div id="header_wrapper">
            <header>
                <div id="brand_wrapper">
                    <img id="logo" src="./assets/images/pollygon_white.png" alt="Pollygon logo"/>
                    <p id="catchphrase">Gather <span id="catchphrasePoint">points</span> to draw something</p>
                </div>

                <div id="start_buttons">
                    <a class="btn filled" href="./register.php" draggable="false">S'inscrire</a>
                    <a class="btn empty" href="./login.php" draggable="false">Se connecter</a>
                </div>
            </header>
        </div>

        <!-- Content -->
        <div class="index_content_wrapper">
            <div class="index_content">
                <div class="iCHead">
                    <h2>Cr&eacute;ez vos sondages en toute simplicit&eacute;</h2>
                </div>

                <div class="iCBody">
                    <img src="./assets/images/index_img/create.png" alt="Create picture">
                    <p>
                        Pollygon propose un syst&egrave;me de cr&eacute;ation de sondage simple, accessible aux entreprises et aux particuliers.
                        Avec son design &eacute;pur&eacute; et moderne il permet de cr&eacute;er facilement et rapidement un sondage que vous pourrez
                        partager.
                    </p>
                </div>
            </div>
        </div>

        <div class="index_content_wrapper">
            <div class="index_content">
                <div class="iCHead">
                    <h2>Analysez vos sondages afin d’am&eacute;liorer votre vision</h2>
                </div>

                <div class="iCBody">
                    <p>
                        La fonction Analyse de Pollygon permet de tirer le meilleur parti des r&eacute;sultats de vos sondages &agrave; l’aide
                        de graphiques simples et explicites. La visualisation de donn&eacute;es peut &ecirc;tre filtr&eacute;e pour affiner au mieux
                        vos r&eacute;sultats. Pollygon vous aide &agrave; am&eacute;liorer votre prise de d&eacute;cision.
                    </p>
                    <img src="./assets/images/index_img/analyze.jpg" alt="Analyze picture">
                </div>
            </div>
        </div>

        <div class="index_content_wrapper">
            <div class="index_content">
                <div class="iCHead">
                    <h2>Am&eacute;liorez vos sondages</h2>
                </div>

                <div class="iCBody">
                    <img src="./assets/images/index_img/upgrade.png" alt="Upgrade picture">
                    <p>
                        Pollygon propose des offres adapt&eacute;es &agrave; votre situation, dans le but de r&eacute;pondre le plus fid&egrave;lement &agrave; vos besoins.
                        Que vous soyez un particulier ou une entreprise, Pollygon vous apporte la solution qu’il vous faut. 
                        Pour plus d’informations, <a href="#" draggable="false">cliquez ici.</a>
                    </p>
                </div>
            </div>
        </div>

        <div class="index_content_wrapper">
            <div class="index_content">
                <div class="iCHead">
                    <h2>Vos sondages accessibles partout</h2>
                </div>

                <div class="iCBody">
                    <p>
                        Pollygon vous permet de g&eacute;rer vos sondages depuis une large s&eacute;lection de supports : t&eacute;l&eacute;phone, tablette,
                        ordinateur et m&ecirc;me t&eacute;l&eacute;vision. Afin d’&ecirc;tre disponible o&ugrave; et quand vous le souhaitez.
                    </p>
                    <img src="./assets/images/index_img/responsive.png" alt="Responsive picture">
                </div>
            </div>
        </div>

        <!-- Footer -->
        <?php include_once(ROOT."/views/models/footer.php"); ?>
    </body>
</html>
