<?php

############################
# Const
############################

define("ROOT", str_replace('\\', '/', __DIR__));

define("USRID_NOT_VALID", 1);
define("USR_NOT_VALID", 2);
define("EMAIL_NOT_VALID", 3);
define("PASSWORD_NOT_VALID", 4);
define("GENDER_NOT_VALID", 5);
define("BIRTHDATE_NOT_VALID", 6);
define("COUNTRY_NOT_VALID", 7);
define("JOB_NOT_VALID", 8);

define("USR_ALREADY_USED", 20);
define("USR_NOT_FOUND", 21);
define("EMAIL_ALREADY_USED", 22);
define("PASSWORDS_DONT_MATCH", 23);
define("PASSWORD_NOT_SECURE", 24);
define("BAD_PASSWORD", 25);

define("UNKNOWN_REGISTER_ERROR", 30);
define("REGISTRATION_COMPLETE", 31);

############################
# Session
############################

if (session_status() !== PHP_SESSION_ACTIVE) { session_start(); }

$is_connected = (isset($_SESSION["user_id"]) AND !empty($_SESSION["user_id"]));

############################
# Import config file
############################

$config = parse_ini_file(ROOT . "/config/config.ini", true);

############################
# Load classes
############################

function loadClasses($classname) { require_once ROOT . "/classes/$classname.php"; }
spl_autoload_register("loadClasses");

############################
# Connect to database
############################

$db = PDOFactory::mySql($config["DB"]["host"], $config["DB"]["dbname"], $config["DB"]["user"], $config["DB"]["password"]);

############################
# Get messages
############################

$messages = buildMessages();

############################
# Functions
############################

/**
 * Redirect to the specified php file.
 *
 * This function redirects using the header()
 * function with the file path and GET variables
 * if specified. Then the PHP script is stopped
 * with exit().
 *
 * @author      Alexis
 * @version     1.0
 *
 * @function    redirectTo
 * @param       string      $filePath   Path to the php file
 * @return      void
 */
function redirectTo($filePath) {

    header("Location: $filePath");
    exit;
}

/**
 * @param int $errorCode Error code
 * @return void
 */
function setError($errorCode) {
    $_SESSION["err"] = $errorCode;
}

/**
 * @param int $successCode Success code
 * @return void
 */
function setSuccess($successCode) {
    $_SESSION["success"] = $successCode;
}

function buildMessages() {
    $messages = [
        USRID_NOT_VALID => "Erreur lors de la récupération de l'ID utilisateur.",
        USR_NOT_VALID => "Le nom d'utilisateur renseign&eacute; n'est pas valide <em>(max. 32 caract&egrave;res)</em>.",
        EMAIL_NOT_VALID => "L'email renseign&eacute; n'est pas valide. Veuillez respecter le format <em>\"locale@domaine.ext\"</em>.",
        PASSWORD_NOT_VALID => "Le mot de passe renseign&eacute; n'est pas valide <em>(une minuscule, une majuscule, un chiffre, un caract&egrave;re sp&eacute;cial, huit caract&egrave;res)</em>.",
        GENDER_NOT_VALID => "Le sexe renseign&eacute; n'est pas valide.",
        BIRTHDATE_NOT_VALID => "La date de naissance renseign&eacute;e n'est pas valide.",
        COUNTRY_NOT_VALID => "Le pays renseign&eacute; n'est pas valide.",
        JOB_NOT_VALID => "Le m&eacute;tier renseign&eacute; n'est pas valide.",

        USR_ALREADY_USED => "Le nom d'utilisateur renseign&eacute; est d&eacute;j&agrave; utilis&eacute;.",
        USR_NOT_FOUND => "Le nom d'utilisateur renseign&eacute; n'existe pas.",
        EMAIL_ALREADY_USED => "L'email renseign&eacute; est d&eacute;j&agrave; utilis&eacute;.",
        PASSWORDS_DONT_MATCH => "Les mots de passes ne correspondent pas.",
        PASSWORD_NOT_SECURE => "Le mot de passe n'est pas s&eacute;curis&eacute; <em>(une minuscule, une majuscule, un chiffre, un caract&egrave;re sp&eacute;cial, huit caract&egrave;res)</em>.",
        BAD_PASSWORD => "Le mot de passe renseign&eacute; est incorrect.",

        UNKNOWN_REGISTER_ERROR => "Erreur inconnue, impossible de vous enregistrer. Veuillez r&eacute;essayer plus tard ou contactez le <a href=\"#\">support</a>.",
        REGISTRATION_COMPLETE => "Inscription r&eacute;ussie ! Vous pouvez d&eacute;sormais vous connecter.",

        "none" => "<em>Un probl&egrave;me est survenu lors de l'affichage de ce message</em>"
    ];

    // Turn on output buffering
    ob_start();

    // Process errors
    if (isset($_SESSION["err"]) AND !empty($_SESSION["err"])) {
        ?>
            <div class="errorBox">
                <p><?= $messages[$_SESSION["err"]] ?? $messages["none"]; ?></p>
            </div>
        <?php
        unset($_SESSION["err"]);
    }

    // Process success
    if (isset($_SESSION["success"]) AND !empty($_SESSION["success"])) {
        ?>
            <div class="successBox">
                <p><?= $messages[$_SESSION["success"]] ?? $messages["none"] ?></p>
            </div>
        <?php
        unset($_SESSION["success"]);
    }

    // Get the final HTML code and stop the output buffering
    $messages = ob_get_contents();
    ob_end_clean();

    return $messages;
}