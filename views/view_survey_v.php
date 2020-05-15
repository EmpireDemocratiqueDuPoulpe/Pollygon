<!DOCTYPE html>

<html lang="fr">
    <head>
        <title>Pollygon - NOM DU SONDAGE</title>
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
                    <li>Question X</li>
                    <li>Question X</li>
                    <li>Question X</li>
                    <li>Question X</li>
                    <li>Question X</li>
                    <li>Question X</li>
                    <li>Question X</li>
                    <li>Question X</li>
                    <li>Question X</li>
                    <li>Question X</li>
                    <li>Question X</li>
                    <li>Question X</li>
                    <li>Question X</li>
                    <li>Question X</li>
                    <li>Question X</li>
                    <li>Question X</li>
                    <li>Question X</li>
                    <li>Question X</li>
                    <li>Question X</li>
                    <li>Question X</li>
                    <li>Question X</li>
                </ul>
            </div>

            <div id="sVQuestionView">
                <h2>Question X Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi et fermentum lectus, et mollis risus.</h2>
            </div>
        </div>

        <!-- Footer -->
        <?php include_once(ROOT."/views/models/footer.php"); ?>
    </body>
</html>