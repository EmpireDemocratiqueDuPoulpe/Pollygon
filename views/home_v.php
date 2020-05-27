<!DOCTYPE html>

<html lang="fr">
    <head>
        <title>Pollygon - Vos sondages</title>
        <?php include_once(ROOT."/views/models/head.php"); ?>
    </head>
    <body>
        <!-- Navbar -->
        <?php include_once(ROOT."/views/models/navbar.php"); ?>

        <!-- Error/success box -->
        <?php if(isset($messages) && !empty($messages)) echo $messages; ?>

        <?php if(isset($_GET["deleteMode"])) echo '<form action="./php/survey/delete.php" method="POST">'?>

        <!-- Buttons -->
        <div id="surveys_btn">
            <?php if(isset($_GET["deleteMode"])) { ?>
                <!-- Delete Mode -->
                <a class="btn filled smaller" href="./home.php" draggable="false">
                    <i class="fas fa-chevron-left"></i> Annuler
                </a>

                <input class="btn filled red smaller" type="submit" value="Supprimer">

                <p><em>Cliquez sur le(s) sondage(s) que vous souhaitez supprimer puis sur le bouton "Supprimer" ci-dessus.</em></p>
            <?php } else { ?>
                <!-- Normal mode -->
                <a class="btn filled smaller" href="./create_survey.php" draggable="false">
                    <i class="svgImport insideBtn"><?= file_get_contents(ROOT."/assets/images/icons/add_survey.svg"); ?></i>
                    Nouveau sondage
                </a>

                <?php if ($surveys) { ?>
                    <a class="btn filled red smaller" href="./home.php?deleteMode" draggable="false">
                        <i class="svgImport insideBtn"><?= file_get_contents(ROOT."/assets/images/icons/del_survey.svg"); ?></i>
                        Supprimer sondage
                    </a>
                <?php } ?>
            <?php } ?>
        </div>

        <div id="surveys_container">
            <h2>Mes sondages</h2>

            <ul id="surveys_list">
                <?= $surveysHTML ?>
            </ul>
        </div>

        <?php if(isset($_GET["deleteMode"])) echo '</form>'?>

        <!-- Footer -->
        <?php include_once(ROOT."/views/models/footer.php"); ?>
    </body>
</html>