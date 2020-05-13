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

        <!-- "My account" box -->
        <div>
            <h2>Mon compte</h2>
            <form action="#" method="POST">
                <?php include ROOT."/views/models/fields/username_f.php"; ?>
                <?php include ROOT."/views/models/fields/email_f.php"; ?>
                <?php include ROOT."/views/models/fields/password_double_f.php"; ?>

                <input type="submit" class="btn filled" value="MODIFIER">
            </form>
        </div>

        <!-- "Others infos" box -->
        <div>
            <h2>Autres informations</h2>

            <form action="#" method="POST">
                <?php include ROOT."/views/models/fields/gender_f.php"; ?>
                <?php include ROOT."/views/models/fields/birthdate_f.php"; ?>
                <?php include ROOT."/views/models/fields/country_f.php"; ?>
                <?php include ROOT."/views/models/fields/job_f.php"; ?>

                <input type="submit" class="btn filled" value="MODIFIER">
            </form>
        </div>

        <!-- Footer -->
        <?php include_once(ROOT."/views/models/footer.php"); ?>
    </body>
</html>