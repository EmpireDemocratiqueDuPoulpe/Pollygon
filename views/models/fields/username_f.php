<!-- Username -->
<div class="field floating_label_wrapper">
    <input type="text" id="username" class="floating_label_input" name="username"
           minlength="1" maxlength="32" placeholder="Nom d'utilisateur"
           <?php if(isset($user)) { if (isset($user["username"])) { echo 'value="'.$user["username"].'"'; }} ?>
           required>
    <label for="username" class="floating_label">Nom d'utilisateur</label>
</div>