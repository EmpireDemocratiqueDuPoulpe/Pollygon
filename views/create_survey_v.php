<!DOCTYPE html>

<html lang="fr">
    <head>
        <title>Pollygon - <?= $survey_title ?></title>
        <?php include_once(ROOT."/views/models/head.php"); ?>
    </head>
    <body>
        <!-- Navbar -->
        <?php include_once(ROOT."/views/models/navbar.php"); ?>

        <!-- Survey viewer -->
        <div id="survey_viewer">
            <div id="sVQuestionList">
                <!-- Question list -->
                <ul>
                    <?= $questions; ?>
                    <li class="newQuestion">
                        <a href="<?= $newQuestionUrl ?>">
                            <i class="svgImport insideBtn"><?= file_get_contents(ROOT."/assets/images/icons/add_survey.svg"); ?></i>
                            Ajouter une question
                        </a>
                    </li>
                </ul>

                <!-- Finish edit -->
                <form action="./php/survey/add.php" method="POST">
                    <input type="hidden" name="survey_id" value="<?= $survey_id; ?>">
                    <input class="btn filled" type="submit" value="CR&Eacute;ER LE SONDAGE">
                </form>
            </div>

            <!-- Question view -->
            <div id="sVQuestionView">
                <!-- Error/success box -->
                <?php if(isset($messages) && !empty($messages)) echo $messages; ?>

                <!-- Survey title -->
                <div id="sVQTitle">
                    <form action="./php/survey/set_survey_title.php" method="POST">

                        <input type="hidden" name="survey_id" value="<?= $survey_id ?>">
                        <h1>
                            <textarea name="survey_name" placeholder="Nouveau sondage"><?= $survey_title ?></textarea>
                        </h1>

                        <input class="btn filled smaller-2" type="submit" value="CHANGER"/>
                    </form>
                </div>

                <!-- Question -->
                <?= $questionView; ?>
            </div>
        </div>

        <!-- Footer -->
        <?php include_once(ROOT."/views/models/footer.php"); ?>
    </body>
</html>