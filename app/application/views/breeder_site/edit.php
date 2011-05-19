<?php if ($this->session->userdata('validation_error')): ?>
    
    <div class = "error">
        <?= $this->session->userdata('validation_error'); ?>
    </div>    
    <?php 
        $this->session->unset_userdata('validation_error'); 
        $this->session->unset_userdata('current_dialog_id');
    ?>
    
<?php endif ?>

<fieldset class="round">
    <?= form_open(); ?>
        <p>
            <label for="code" class = "block">Kód</label>
            <input type="text" name="code" value="<?= $current_breeder_site ? $current_breeder_site->code : ''; ?>" id="code" class = "text"/>
        </p>
        <p>
            <label for="mgszh" class = "block">MGSZH</label>
            <input type="text" name="mgszh" value="<?= $current_breeder_site ? $current_breeder_site->mgszh : ''; ?>" id="mgszh" class = "text"/>
        </p>
        <p>
            <label for="code" class = "block">Irányítószam</label>
            <input type="text" name="postal_code_id" value="<?= $current_breeder_site ? $current_breeder_site->postal_code_id : ''; ?>" id="postal_code_id" class = "text" />
        </p>
        <p>
            <label for="address" class = "block">Cím</label>
            <input type="text" name="address" value="<?= $current_breeder_site ? $current_breeder_site->address : ''; ?>" id="address" class = "text" />
        </p>
        <p>
            <label for="description" class = "block">Megjegyzés</label>
            <textarea name="description" cols="40" rows="2"><?= $current_breeder_site ? $current_breeder_site->description : ''; ?></textarea>
        </p>
        <p>
            <button>Mentés</button>
        </p>
    <?= form_close(); ?>
</fieldset>

<script type="text/javascript">
    $('#postal_code_id').autocomplete({
        source: App.URL + 'postalcode/index/',
        select: function(e, ui) {
            var id = ui.item.id;
            $('#postal_code_id').after($('<input />', {
                type: 'hidden',
                name: 'postal_code_id',
                value: id    
            }));
            
            $('#postal_code_id').removeAttr('name');
        }
    });

</script>