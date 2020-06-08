<!DOCTYPE html>

<html lang="fr">
    <head>
        <title>Pollygon - <?= $survey_title ?></title>
        <?php include_once(ROOT."/views/models/head.php"); ?>
    </head>
    <body <?php if (isset($_GET["newQuestion"]) && empty($_GET["newQuestion"])) { echo 'class="no-scroll"'; } ?>>
        <!-- Navbar -->
        <?php include_once(ROOT."/views/models/navbar.php"); ?>

        <!-- Survey viewer -->
        <?php if (isset($_GET["newQuestion"]) && empty($_GET["newQuestion"])) { ?>
            <div id="new_question_wrapper">
                <div id="new_question">
                    <div id="new_question_header">
                        <h3>Ajouter une question</h3>
                    </div>
                    <div id="new_question_body">
                        <div id="new_question_list">
                            <a class="nQ_item" href="?survey=<?= $survey_id; ?>&newQuestion=input">
                                <img src="./assets/images/pollygon_l_black.png" alt="Ic&ocirc;ne">
                                <span>Question ouverte</span>
                            </a>
                            <a class="nQ_item" href="?survey=<?= $survey_id; ?>&newQuestion=unique">
                                <img src="./assets/images/pollygon_l_black.png" alt="Ic&ocirc;ne">
                                <span>Choix unique</span>
                            </a>
                            <a class="nQ_item" href="?survey=<?= $survey_id; ?>&newQuestion=multiple">
                                <img src="./assets/images/pollygon_l_black.png" alt="Ic&ocirc;ne">
                                <span>Choix multiple</span>
                            </a>
                            <a class="nQ_item" href="?survey=<?= $survey_id; ?>&newQuestion=number">
                                <img src="./assets/images/pollygon_l_black.png" alt="Ic&ocirc;ne">
                                <span>R&eacute;ponse num&eacute;rique</span>
                            </a>
                            <div class="nQ_break"></div>
                            <a class="btn filled smaller" href="?survey=<?= $survey_id; ?>">Retour</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

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