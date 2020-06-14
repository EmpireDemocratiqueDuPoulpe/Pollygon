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
                <ul>
                    <?= $questions ?>
                </ul>
            </div>

            <div id="sVQuestionView">
                <!-- Error/success box -->
                <?php if(isset($messages) && !empty($messages)) echo $messages; ?>

                <?= $questionView; ?>
            </div>
        </div>

        <!-- Footer -->
        <?php include_once(ROOT."/views/models/footer.php"); ?>
    </body>
</html>