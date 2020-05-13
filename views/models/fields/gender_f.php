<!-- Gender -->
<?php
    $defaultCheck = "male";

    if(isset($user)) {
        if (isset($user["gender"])) {
            if ($user["gender"] != "Homme") {
                $defaultCheck = "female";
            }
        }
    }
?>

<div class="field">
    <h3>Sexe</h3>
    <label for="gender1" class="radio_label">
        <input type="radio" id="gender1" name="gender" value="Homme" required <?php if ($defaultCheck == "male") { echo "checked"; } ?>>
        <span class="radio"></span>
        <span>Homme</span>
    </label>
    <label for="gender2" class="radio_label">
        <input type="radio" id="gender2" name="gender" value="Femme" required  <?php if ($defaultCheck == "female") { echo "checked"; } ?>>
        <span class="radio"></span>
        Femme
    </label>
</div>