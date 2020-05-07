<!DOCTYPE html>

<html lang="fr" class="logreg">
    <head>
        <title>Pollygon - Connexion</title>
        <?php include_once(ROOT."/views/models/head.php"); ?>
    </head>

    <body>
        <!-- Register box -->
        <div id="register">
            <h1>Inscription</h1>

            <form action="./php/register_user.php" method="POST">
                <!-- Username -->
                <div class="field floating_label_wrapper">
                    <input type="text" id="username" class="floating_label_input" name="username" minlength="1" maxlength="32" placeholder="Nom d'utilisateur" required>
                    <label for="username" class="floating_label">Nom d'utilisateur</label>
                </div>

                <!-- Email -->
                <div class="field floating_label_wrapper">
                    <input type="email" id="email" class="floating_label_input" name="email" minlength="1" maxlength="255" placeholder="E-mail" required>
                    <label for="email" class="floating_label">E-mail</label>
                </div>

                <!-- Password -->
                <div class="field floating_label_wrapper">
                    <input type="password" id="password" class="floating_label_input" name="password" minlength="1" maxlength="255" placeholder="Mot de passe" required>
                    <label for="password" class="floating_label">Mot de passe</label>
                </div>

                <!-- Gender -->
                <div class="field">
                    <label>Sexe</label>
                    <label for="gender1">Homme</label><input type="radio" id="gender1" name="gender" value="Homme" required>
                    <label for="gender2">Femme</label><input type="radio" id="gender2" name="gender" value="Femme" required>
                </div>

                <!-- Gender -->
                <div class="field">
                    <label for="birthdate">Date de naissance</label>
                    <input type="date" id="birthdate" name="birthdate" required>
                </div>

                <!-- Country -->
                <div class="field">
                    <label for="country">Pays</label>
                    <select id="country" name="country">
                    </select>
                </div>

                <!-- Job -->
                <div class="field">
                    <label for="job">M&eacute;tier</label>
                    <select id="job" name="job">
                    </select>
                </div>

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