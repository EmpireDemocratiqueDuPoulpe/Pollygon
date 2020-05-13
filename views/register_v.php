<!DOCTYPE html>

<html lang="fr" class="logreg">
    <head>
        <title>Pollygon - Inscription</title>
        <?php include_once(ROOT."/views/models/head.php"); ?>
    </head>

    <body>
        <!-- Error/success box -->
        <?php if(isset($messages) && !empty($messages)) echo $messages; ?>

        <!-- Register box -->
        <div id="register">
            <h1>Inscription</h1>

            <form action="./php/register_user.php" method="POST">
                <?php include ROOT."/views/models/fields/username_f.php"; ?>
                <?php include ROOT."/views/models/fields/email_f.php"; ?>
                <?php include ROOT."/views/models/fields/password_double_f.php"; ?>
                <?php include ROOT."/views/models/fields/gender_f.php"; ?>
                <?php include ROOT."/views/models/fields/birthdate_f.php"; ?>
                <?php include ROOT."/views/models/fields/country_f.php"; ?>
                <?php include ROOT."/views/models/fields/job_f.php"; ?>

                <input type="submit" class="btn filled" value="INSCRIPTION">

                <div class="link_spacer"></div>
                <!-- As an account -->
                <a href="./login.php">J'ai d&eacute;j&agrave; un compte.</a>
            </form>
        </div>

        <!-- Footer -->
        <?php include_once(ROOT."/views/models/footer.php"); ?>
    </body>
</html>