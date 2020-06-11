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
                    <h2>Créez vos sondages en toute simplicité</h2>
                </div>

                <div class="iCBody">
                    <img src="./assets/images/index_img/create.png" alt="Create picture">
                    <p>
                        Pollygon propose un système de création de sondage simple, accessible aux entreprises et aux particuliers.
                        Avec son design épuré et moderne il permet de créer facilement et rapidement un sondage que vous pourrez 
                        partager.
                    </p>
                </div>
            </div>
        </div>

        <div class="index_content_wrapper">
            <div class="index_content">
                <div class="iCHead">
                    <h2>Analysez vos sondages afin d’améliorer votre vision</h2>
                </div>

                <div class="iCBody">
                    <p>
                        La fonction Analyse de Pollygon permet de tirer le meilleur parti des résultats de vos sondages à l’aide 
                        de graphiques simples et explicites.La visualisation de données peut être filtrée pour affiner au mieux 
                        vos résultats. Pollygon vous aide à améliorer votre prise de décision.
                    </p>
                    <img src="./assets/images/index_img/analyze.jpg" alt="Analyze picture">
                </div>
            </div>
        </div>

        <div class="index_content_wrapper">
            <div class="index_content">
                <div class="iCHead">
                    <h2>Améliorez vos sondages</h2>
                </div>

                <div class="iCBody">
                    <img src="./assets/images/index_img/upgrade.png" alt="Upgrade picture">
                    <p>
                        Pollygon propose des offres adaptées à votre situation, dans le but de répondre le plus fidèlement à vos besoins.
                        Que vous soyez un particulier ou une entreprise, Pollygon vous apporte la solution qu’il vous faut. 
                        Pour plus d’informations,<a href="" draggable="false">cliquez ici.</a>
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
                        Pollygon vous permet de gérer vos sondages depuis une large sélection de supports : téléphone, tablette, 
                        ordinateur et même télévision. Afin d’être disponible où et quand vous le souhaitez.
                    </p>
                    <img src="./assets/images/index_img/responsive.png" alt="Responsive picture">
                </div>
            </div>
        </div>

        <!-- Footer -->
        <?php include_once(ROOT."/views/models/footer.php"); ?>
    </body>
</html>
