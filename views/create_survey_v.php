<!DOCTYPE html>

<html lang="fr">
    <head>
        <title>Pollygon - <?php echo $_SESSION["survey"]->getTitle(); ?></title>
        <?php include_once(ROOT."/views/models/head.php"); ?>
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
                    <?= $questions; ?>
                    <li class="newQuestion">
                        <a href="<?= $newQuestionUrl ?>">
                            <i class="svgImport insideBtn"><?php echo file_get_contents(ROOT."/assets/images/icons/add_survey.svg"); ?></i>
                            Ajouter une question
                        </a>
                    </li>
                </ul>
            </div>

            <div id="sVQuestionView">
                <?= $questionView; ?>
            </div>
        </div>

        <!-- Footer -->
        <?php include_once(ROOT."/views/models/footer.php"); ?>
    </body>
</html>