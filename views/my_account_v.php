<!DOCTYPE html>

<html lang="fr">
    <head>
        <title>Pollygon - Mon compte</title>
        <?php include_once(ROOT."/views/models/head.php"); ?>
    </head>

    <body>
        <!-- Navbar -->
        <?php include_once(ROOT."/views/models/navbar.php"); ?>

        <!-- Error/success box -->
        <?php if(isset($messages) && !empty($messages)) echo $messages; ?>

        <!-- "Back" link -->
        <a id="backToHome" class="btn filled smaller" href="./home.php"><i class="fas fa-chevron-left"></i> Retour</a>

        <!-- "My account" box -->
        <div class="account_box">
            <h2>Mon compte</h2>
            <form action="./php/user/update_account.php" method="POST">
                <?php include ROOT."/views/models/fields/user_id_f.php"; ?>
                <?php include ROOT."/views/models/fields/username_f.php"; ?>
                <?php include ROOT."/views/models/fields/email_f.php"; ?>
                <?php include ROOT."/views/models/fields/password_f.php"; ?>

                <input type="submit" class="btn filled" value="MODIFIER">
            </form>
        </div>

        <!-- "Security" box -->
        <div class="account_box">
            <h2>S&eacute;curit&eacute;</h2>
            <form action="./php/user/update_password.php" method="POST">
                <?php include ROOT."/views/models/fields/user_id_f.php"; ?>
                <?php include ROOT."/views/models/fields/password_f.php"; ?>
                <?php include ROOT."/views/models/fields/password_new_f.php"; ?>

                <input type="submit" class="btn filled" value="MODIFIER">
            </form>
        </div>

        <!-- "Personal infos" box -->
        <div class="account_box">
            <h2>Informations personnelles</h2>

            <form action="./php/user/update_personal.php" method="POST">
                <?php include ROOT."/views/models/fields/user_id_f.php"; ?>
                <?php include ROOT."/views/models/fields/gender_f.php"; ?>
                <?php include ROOT."/views/models/fields/birthdate_f.php"; ?>
                <?php include ROOT."/views/models/fields/country_f.php"; ?>
                <?php include ROOT."/views/models/fields/job_f.php"; ?>

                <input type="submit" class="btn filled" value="MODIFIER">
            </form>
        </div>

        <!-- "Others infos" box -->
        <div class="account_box">
            <h2>Autres informations</h2>

            <div id="stats_container">
                <div class="stat">
                    <?= file_get_contents(ROOT."/assets/images/icons/survey_created.svg"); ?>
                    <p><span>Sondage(s) cr&eacute;&eacute;(s) :</span> <?= $surveys_count ?></p>
                </div>

                <div class="stat">
                    <?= file_get_contents(ROOT."/assets/images/icons/survey_answered.svg"); ?>
                    <p><span>Sondage(s) r&eacute;pondu(s) :</span> <?= $surveys_answered_count ?></p>
                </div>

                <div class="stat">
                    <?= file_get_contents(ROOT."/assets/images/icons/survey_members.svg"); ?>
                    <p><span>Participant(s) à vos sondages :</span> <?= $surveys_members ?></p>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <?php include_once(ROOT."/views/models/footer.php"); ?>
    </body>
</html>