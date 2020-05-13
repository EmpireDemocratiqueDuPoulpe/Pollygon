<!DOCTYPE html>

<html lang="fr" class="logreg">
    <head>
        <title>Pollygon - Connexion</title>
        <?php include_once(ROOT."/views/models/head.php"); ?>
    </head>

    <body>
        <!-- Error/success box -->
        <?php if(isset($messages) && !empty($messages)) echo $messages; ?>

        <!-- Login box -->
        <div id="login">
            <h1>Connexion</h1>

            <form action="./php/login_user.php" method="POST">
                <?php include ROOT."/views/models/fields/username_f.php"; ?>
                <?php include ROOT."/views/models/fields/password_f.php"; ?>

                <input type="submit" class="btn filled" value="CONNEXION">

                <div class="link_spacer"></div>
                <!-- No account -->
                <a href="./register.php">Je n'ai pas de compte.</a>
            </form>
        </div>

        <!-- Footer -->
        <?php include_once(ROOT."/views/models/footer.php"); ?>
    </body>
</html>