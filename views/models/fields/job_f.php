<!-- Job -->
<?php
    $defaultCheck = "";

    if(isset($user)) {
        if (isset($user["job"])) {
            $defaultCheck = $user["job"];
        }
    }
?>

<div class="field">
    <h3>M&eacute;tier</h3>
    <label for="job"></label>
    <select id="job" name="job" required>
        <option value="" <?php if ($defaultCheck == "") echo "selected"; ?>>-- S&eacute;lectionnez votre m&eacute;tier --</option>
        <option value="Salari&eacute;" <?php if ($defaultCheck == "Salarié") echo "selected"; ?>>Salari&eacute;</option>
        <option value="Sans emploi" <?php if ($defaultCheck == "Sans emploi") echo "selected"; ?>>Sans emploi</option>
        <option value="Ind&eacute;pendant" <?php if ($defaultCheck == "Indépendant") echo "selected"; ?>>Ind&eacute;pendant</option>
        <option value="Retrait&eacute;" <?php if ($defaultCheck == "Retraité") echo "selected"; ?>>Retrait&eacute;</option>
        <option value="&Eacute;tudiant" <?php if ($defaultCheck == "Étudiant") echo "selected"; ?>>&Eacute;tudiant</option>
    </select>
</div>