<!-- Email -->
<div class="field floating_label_wrapper">
    <input type="email" id="email" class="floating_label_input" name="email"
           minlength="1" maxlength="255" placeholder="E-mail"
           <?php if(isset($user)) { if (isset($user["email"])) { echo 'value="'.$user["email"].'"'; }} ?>
           required>
    <label for="email" class="floating_label">E-mail</label>
</div>