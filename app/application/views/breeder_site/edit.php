<style type="text/css" media="screen">
    .block {
        display:inline-block; width:50%;
    }
</style>

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

    <fieldset class="scroll round">
        <p>
            <label for="registration_number" class = "block">Telephely iktatószáma:</label>
            <input type="text" name="registration_number" value="<?= $current_breeder_site ? $current_breeder_site->registration_number : ''; ?>" id="registration_number" class = "text"/>
        </p>  
        <p>
            <label for="code" class = "block">Tartó/üzemeltető ügyfél-regisztrációszsáma</label>
            <input type="text" name="code" value="<?= $current_breeder_site ? $current_breeder_site->code : ''; ?>" id="code" class = "text"/>
        </p>
        <p>
            <label for="breeder_name" class = "block">Tartó/üzemeltető neve</label>
            <input type="text" name = "breeder_name" value="<?= $current_breeder_site ? $current_breeder_site->breeder_name : $current_breeder->name; ?>" id="breeder_name" class = "text"/>
        </p>        

        <!--
        <p>
            <label for="mgszh" class = "block">MGSZH</label>
            <input type="text" name="mgszh" value="<?= $current_breeder_site ? $current_breeder_site->mgszh : ''; ?>" id="mgszh" class = "text"/>
        </p>
        -->
        <p>
            <label for="registered" class = "block">Tartó viszony kezdete</label>
            <input type="text" name = "registered" class = "datepicker text" id = "registered" value = "<?= $current_breeder_site ? to_date($current_breeder_site->registered) : '' ?>" />
        </p> 
        <p>
            <label for="designation" class = "block">Tenyészet neve</label>
            <input type="text" name = "designation" value="<?= $current_breeder_site ? $current_breeder_site->designation : ''; ?>" id="designation" class = "text"/>
        </p>         
        <!-- 
        <p>
            <label for="code" class = "block">Tenyészet irányítószama</label>
            <input type="text" value="<?= $current_breeder_site ? $current_breeder_site->postal_code . ', ' . $current_breeder_site->city : $current_breeder->postal_code . ', ' . $current_breeder->city; ?>" id="postal_code_id" class = "text" />
            <?php // if ($current_breeder_site): ?>
                <input type="hidden" name = "postal_code_id" value = "<?= $current_breeder_site ? $current_breeder_site->postal_code_id : $current_breeder->postal_code_id; ?>" />
            <?php // endif ?>
        </p>
         -->       
        <p>
            <label for="address" class = "block">Tenyészet cím</label>
            <input type="text" name="address" value="<?= $current_breeder_site ? $current_breeder_site->address : $current_breeder->address; ?>" id="address" class = "text" />
        </p>
        <!-- 
        <p>
            <label for="postal_zip" class = "block">Tenyészet levelezési irányítószáma</label>
            <input type="text" class = "text" id = "postal_zip" value = "<?= $current_breeder_site ? $current_breeder_site->postal_postal_code . ', ' . $current_breeder_site->postal_city : $current_breeder->postal_code . ', ' . $current_breeder->city ?>" />
            <?php //if ($current_breeder_site): ?>
                <input type="hidden" name = "postal_zip" value = "<?= $current_breeder_site ? $current_breeder_site->postal_zip : $current_breeder->postal_code_id; ?>" />
            <?php //endif ?>
        </p> 
         -->        
        <p>
            <label for="postal_address" class = "block">Tenyészet levelezési címe</label>
            <input type="text" name = "postal_address" class = "text" id = "postal_address" value = "<?= $current_breeder_site ? $current_breeder_site->postal_address : $current_breeder->address ?>" />
        </p> 
               
        <p>
            <label for="type" class = "block">Típus</label>
            <input type="text" name = "type" class = "text" id = "type" value = "<?= $current_breeder_site ? $current_breeder_site->type : '' ?>" />
        </p>
        <p>
            <label for="enar_name" class = "block">ENAR felelős/kapcsolattartó/keltetésvezető neve</label>
            <input type="text" name = "enar_name" class = "text" id = "enar_name" value = "<?= $current_breeder_site ? $current_breeder_site->enar_name : $current_breeder->name ?>" />
        </p> 
        <p>
            <label for="enar_phone" class = "block">ENAR felelős/kapcsolattartó/keltetésvezető telefonszáma</label>
            <input type="text" name = "enar_phone" class = "text" id = "enar_phone" value = "<?= $current_breeder_site ? $current_breeder_site->enar_phone : @$current_breeder->phone ?>" />
        </p> 
        <p>
            <label for="enar_fax" class = "block">ENAR felelős/kapcsolattartó/keltetésvezető faxszáma</label>
            <input type="text" name = "enar_fax" class = "text" id = "enar_fax" value = "<?= $current_breeder_site ? $current_breeder_site->enar_fax : @$current_breeder->fax ?>" />
        </p> 
        <p>
            <label for="enar_email" class = "block">ENAR felelős/kapcsolattartó/keltetésvezető email címe</label>
            <input type="text" name = "enar_email" class = "text" id = "enar_email" value = "<?= $current_breeder_site ? $current_breeder_site->enar_email : $current_breeder->email ?>" />
        </p>                                
        
    </fieldset>
    <fieldset class="round">
        <legend>Tartási helyek</legend>
        <p>
            <label for="holding_place_id" class = "block">Tartási/vágási hely azonosítója</label>
            <input type="text" name = "holding_place_id" class = "text" id = "holding_place_id" value = "<?= $current_breeder_site ? $current_breeder_site->holding_place_id : '' ?>" />
        </p>        
        <p>
            <label for="holding_place_name" class = "block">Tartási/vágási hely megnevezése</label>
            <input type="text" name = "holding_place_name" class = "text" id = "holding_place_name" value = "<?= $current_breeder_site ? $current_breeder_site->holding_place_name : '' ?>" />
        </p>
        <!-- 
        <p>
            <label for="holding_place_zip" class = "block">Tartási/vágási hely irányítószáma</label>
            <input type="text" class = "text" id = "holding_place_zip" value = "<?= $current_breeder_site ? $current_breeder_site->holding_place_postal_code . ', ' . $current_breeder_site->holding_place_city : $current_breeder->postal_code . ', '. $current_breeder->city ?>" />
            <?php //if ($current_breeder_site): ?>
                <input type="hidden" name = "holding_place_zip" value = "<?= $current_breeder_site ? $current_breeder_site->holding_place_zip : $current_breeder->postal_code_id; ?>" />
            <?php //endif ?> 
        </p>  
         -->
        <p>
            <label for="holding_place_address" class = "block">Tartási/vágási hely címe</label>
            <input type="text" name = "holding_place_address" class = "text" id = "holding_place_address" value = "<?= $current_breeder_site ? $current_breeder_site->holding_place_address : $current_breeder->address ?>" />
        </p>        
    </fieldset>
    <fieldset class="round">
        <legend>Tartási adatok</legend>
        <p>
            <label for="holding_data_type" class = "block">Faj</label>
            <input type="text" name = "holding_data_type" class = "text" id = "holding_data_type" value = "<?= $current_breeder_site ? $current_breeder_site->holding_data_type : '' ?>" />
        </p>   
        <p>
            <label for="holding_data_start" class = "block">Tartás/vágás kezdete</label>
            <input type="text" name = "holding_data_start" class = "text datepicker" id = "holding_data_start" value = "<?= $current_breeder_site ? $current_breeder_site->holding_data_start : '' ?>" />
        </p>   
        <p>
            <label for="holding_data_end" class = "block">Tartás/vágás kezdete</label>
            <input type="text" name = "holding_data_end" class = "text datepicker" id = "holding_data_end" value = "<?= $current_breeder_site ? $current_breeder_site->holding_data_end : '' ?>" />
        </p>
        <p>
            <label for="holding_data_count" class = "block">Létszám</label>
            <input type="text" name = "holding_data_count" class = "text" id = "holding_data_count" value = "<?= $current_breeder_site ? $current_breeder_site->holding_data_count : '' ?>" />
        </p>                             
        <p>
            <label for="holding_data_utilization" class = "block">Hasznosítás</label>
            <input type="text" name = "holding_data_utilization" class = "text" id = "holding_data_utilization" value = "<?= $current_breeder_site ? $current_breeder_site->holding_data_utilization : '' ?>" />
        </p>                             
    </fieldset>
    
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
    <fieldset>
            
        <p>
            <button>Mentés</button>
        </p>
    </fieldset>    
    
<?= form_close(); ?>
