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
            <a class="btn filled" href="#" draggable="false">Nouveau sondage</a>
        </div>
        <div id="my_surveys_body">
            <h2>Mes sondages</h2>
            <div id="surveys_list">
                <div class="survey">
                    <h3>Pain au chocolat VS Chocolatine</h3>
                    <div>
                        <img src="/assets/images/show_survey_analytics.png" alt="Voir les résultats">
                        <img src="/assets/images/delete_survey.png" alt="Supprimer le sondage">
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>