<!DOCTYPE html>

<html lang="fr">
    <head>
        <title>Pollygon - <?= $survey_title ?></title>
        <?php include_once(ROOT."/views/models/head.php"); ?>
        <link rel="stylesheet" href="./assets/css/datatables.css"/>
    </head>
    <body>
        <!-- Navbar -->
        <?php include_once(ROOT."/views/models/navbar.php"); ?>

        <!-- Error/success box -->
        <?php if(isset($messages) && !empty($messages)) echo $messages; ?>

        <!-- Survey viewer -->
        <div id="survey_viewer">
            <div id="sVQuestionList">
                <ul>
                    <li id="sVQBack"><a href="./home.php"><i class="fas fa-chevron-left"></i> Retour</a></li>
                    <?= $questions ?>
                </ul>
            </div>

            <div id="sVQuestionView">
                <?= $questionView; ?>
            </div>
        </div>

        <!-- Footer -->
        <?php include_once(ROOT."/views/models/footer.php"); ?>

        <script type="text/javascript" src="./assets/js/jquery-3.5.1.min.js"></script>
        <script type="text/javascript" src="./assets/js/datatables/datatables.min.js"></script>
        <script type="text/javascript" src="./assets/js/datatables/init-datatables-temp.js"></script>
    </body>
</html>