
<div class = "col-sm-3 sm-text-center mt-4">
    <label class="text-primary font-weight-bold" for = "nif"><?php echo _('NIF');?></label>
</div>
<input type = "hidden" id = "existe" name = "existe">
<div class = "col-sm-9 sm-text-center mt-4">
    <input oninvalid = "validarModificarNIF()" type = "text" class = "form-control" id = "nif" name ="nif" aria-describedby = "" placeholder = "<?php echo _('Introduce NIF');?>" required pattern = "^\d{8}[a-zA-Z]$" value = '<?php if (isset($_REQUEST['existe'])) echo $_REQUEST['nif'] ?>' >
</div>



<div class="col-sm-3 sm-text-center mt-4">
    <label class="text-primary font-weight-bold" for="pass"><?php echo _('Password');?></label>
</div>

<div class="col-sm-9 sm-text-center mt-4">
    <input onchange="ajaxCargar();comprobarContrasena(this.value);" type="password" class="form-control" id="pass" name="pass" aria-describedby="" placeholder="<?php echo _('Insert password');?>" required>
</div>
