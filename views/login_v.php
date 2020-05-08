<!DOCTYPE html>

<html lang="fr" class="logreg">
    <head>
        <title>Pollygon - Connexion</title>
        <?php include_once(ROOT."/views/models/head.php"); ?>
    </head>

    <body>
        <!-- Login box -->
        <div id="login">
            <h1>Connexion</h1>

            <form action="./php/login_user.php" method="POST">
                <!-- Username -->
                <div class="field floating_label_wrapper">
                    <input type="text" id="username" class="floating_label_input" name="username" minlength="1" maxlength="32" placeholder="Nom d'utilisateur" required>
                    <label for="username" class="floating_label">Nom d'utilisateur</label>
                </div>

                <!-- Password -->
                <div class="field floating_label_wrapper">
                    <input type="password" id="password" class="floating_label_input" name="password" minlength="8" maxlength="255" placeholder="Mot de passe" required>
                    <label for="password" class="floating_label">Mot de passe</label>
                </div>

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