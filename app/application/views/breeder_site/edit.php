<?php if ($this->session->userdata('validation_error')): ?>
    
    <div class = "error">
        <?= $this->session->userdata('validation_error'); ?>
    </div>    
    <?php 
        $this->session->unset_userdata('validation_error'); 
        $this->session->unset_userdata('current_dialog_id');
    ?>
    
<?php endif ?>

<?= form_open(); ?>
    <fieldset class="round">
        <p class="highlighted">
            <label for="site_type" class = "block">Telephely típusa</label>
            <?= form_dropdown('site_type', $site_types, $current_breeder_site ? $current_breeder_site->site_type : ''); ?>
        </p> 
        <p class="highlighted">
            <label for="name" class = "block">Telephely fantázianeve</label>
            <input type="text" name="name" value="<?= $current_breeder_site ? $current_breeder_site->name : ''; ?>" id="name" class = "text"/>
        </p>
        
    </fieldset>

    <fieldset class="round">
        <p>
            <label for="registration_number" class = "block">Telephely iktatószáma</label>
            <input type="text" name="registration_number" value="<?= $current_breeder_site ? $current_breeder_site->registration_number : ''; ?>" id="registration_number" class = "text"/>
        </p>  
        <p>
            <label for="designation" class = "block">Telephely megnevezése</label>
            <input type="text" name="designation" value="<?= $current_breeder_site ? $current_breeder_site->designation : ''; ?>" id="designation" class = "text"/>
        </p>        
        <p>
            <label for="code" class = "block">Tenyészet kódja</label>
            <input type="text" name="code" value="<?= $current_breeder_site ? $current_breeder_site->code : ''; ?>" id="code" class = "text"/>
        </p>
        <!--
        <p>
            <label for="mgszh" class = "block">MGSZH</label>
            <input type="text" name="mgszh" value="<?= $current_breeder_site ? $current_breeder_site->mgszh : ''; ?>" id="mgszh" class = "text"/>
        </p>
        -->
        <p>
            <label for="code" class = "block">Irányítószam</label>
            <input type="text" value="<?= $current_breeder_site ? $current_breeder_site->postal_code . ', ' . $current_breeder_site->city : ''; ?>" id="postal_code_id" class = "text" />
            <?php if ($current_breeder_site): ?>
                <input type="hidden" name = "postal_code_id" value = "<?= $current_breeder_site ? $current_breeder_site->postal_code_id : ''; ?>" />
            <?php endif ?>
        </p>
        <p>
            <label for="address" class = "block">Cím</label>
            <input type="text" name="address" value="<?= $current_breeder_site ? $current_breeder_site->address : ''; ?>" id="address" class = "text" />
        </p>
        <p>
            <label for="registered" class = "block">Tartó viszony kezdete</label>
            <input type="text" name = "registered" class = "datepicker text" id = "registered" value = "<?= $current_breeder_site ? to_date($current_breeder_site->registered) : '' ?>" />
        </p>
        <p>
            <label for="postal_zip" class = "block">Tenyészet levelezési irányítószáma</label>
            <input type="text" class = "text" id = "postal_zip" value = "<?= $current_breeder_site ? $current_breeder_site->postal_postal_code . ', ' . $current_breeder_site->postal_city : '' ?>" />
            <?php if ($current_breeder_site): ?>
                <input type="hidden" name = "postal_zip" value = "<?= $current_breeder_site ? $current_breeder_site->postal_zip : ''; ?>" />
            <?php endif ?>
        </p>        
        <p>
            <label for="postal_address" class = "block">Tenyészet levelezési címe</label>
            <input type="text" name = "postal_address" class = "text" id = "postal_address" value = "<?= $current_breeder_site ? $current_breeder_site->postal_address : '' ?>" />
        </p>        
        <p>
            <label for="type" class = "block">Típus</label>
            <input type="text" name = "type" class = "text" id = "type" value = "<?= $current_breeder_site ? $current_breeder_site->type : '' ?>" />
        </p>
        <p>
            <label for="enar_name" class = "block">ENAR-felelős neve</label>
            <input type="text" name = "enar_name" class = "text" id = "enar_name" value = "<?= $current_breeder_site ? $current_breeder_site->enar_name : '' ?>" />
        </p> 
        <p>
            <label for="enar_phone" class = "block">ENAR-felelős telefonszáma</label>
            <input type="text" name = "enar_phone" class = "text" id = "enar_phone" value = "<?= $current_breeder_site ? $current_breeder_site->enar_phone : '' ?>" />
        </p> 
        <p>
            <label for="enar_fax" class = "block">ENAR-felelős faxszáma</label>
            <input type="text" name = "enar_fax" class = "text" id = "enar_fax" value = "<?= $current_breeder_site ? $current_breeder_site->enar_fax : '' ?>" />
        </p> 
        <p>
            <label for="enar_email" class = "block">ENAR-felelős email címe</label>
            <input type="text" name = "enar_email" class = "text" id = "enar_email" value = "<?= $current_breeder_site ? $current_breeder_site->enar_email : '' ?>" />
        </p>                                
        <p>
            <label for="description" class = "block">Megjegyzés</label>
            <textarea name="description" cols="40" rows="2"><?= $current_breeder_site ? $current_breeder_site->description : ''; ?></textarea>
        </p>
        <p>
            <button>Mentés</button>
        </p>
    </fieldset>
<?= form_close(); ?>
