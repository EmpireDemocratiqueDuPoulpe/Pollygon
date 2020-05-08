<?php ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Accueil</title>
        <?php include_once(ROOT."/views/models/head.php"); ?>

    </head>
    <body>
        <div id="new_survey_btn_div">
            <a class="btn filled" href="#" draggable="false"><img src="./assets/images/home_img/add_survey.png" alt="Nouveau sondage">&nbsp;Nouveau sondage</a>
        </div>
        <div id="my_surveys_body">
            <h2>Mes sondages</h2>
            <div id="surveys_list">
                <div class="survey">
                    <h3>Pain au chocolat VS Chocolatine</h3>
                    <div class="div_img">
                        <img src="./assets/images/home_img/show_survey_analytics.png" alt="Voir les résultats">
                        <img src="./assets/images/home_img/delete_survey.png" alt="Supprimer le sondage">
                    </div>
                </div>
                <div class="survey">
                    <h3>Ma note doit-elle être arrondie de 9.95 à 10 ?</h3>
                    <div class="div_img">
                        <img src="./assets/images/home_img/show_survey_analytics.png" alt="Voir les résultats">
                        <img src="./assets/images/home_img/delete_survey.png" alt="Supprimer le sondage">
                    </div>
                </div>
                <div class="survey">
                    <h3>Que pensez vous de la politique de non ingérence du Proche et Moyen-Orient dans les années 80 ?</h3>
                    <div class="div_img">
                        <img src="./assets/images/home_img/show_survey_analytics.png" alt="Voir les résultats">
                        <img src="./assets/images/home_img/delete_survey.png" alt="Supprimer le sondage">
                    </div>
                </div>
                <div class="survey">
                    <h3>Ton tonton tonds ton thon</h3>
                    <div class="div_img">
                        <img src="./assets/images/home_img/show_survey_analytics.png" alt="Voir les résultats">
                        <img src="./assets/images/home_img/delete_survey.png" alt="Supprimer le sondage">
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <?php include_once(ROOT."/views/models/footer.php"); ?>
    </body>
</html>