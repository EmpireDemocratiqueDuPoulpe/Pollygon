<div id="navbar">
    <a id="navbarLogo" href="./home.php"><img src="./assets/images/pollygon_white.png" alt="Logo"></a>

    <div id="navbar_links">
        <a class="navbarIcon leftIcon" href="./my_account.php">
            <i class="fas fa-user-circle fa-2x"></i>
            <span><?= $_SESSION["username"] ?></span>
        </a>
        <a class="navbarIcon rightIcon" href="./php/user/disconnect.php">
            <span>D&eacute;connexion</span>
            <i class="fas fa-power-off fa-2x"></i>
        </a>
    </div>
</div>