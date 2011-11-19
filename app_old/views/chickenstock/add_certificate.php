<fieldset class="span-10" style="border:0px; padding:0;">
    <?= form_open(); ?>
    
        <fieldset class="round">
            <p>
                <label for="certificate_code" class = "block">Törzsállomány azonosító száma</label>
                <input type="text" name = "certificate_code" id = "certificate_code" class = "required" value = "<?= $item ? $item->certificate_code : ''; ?>"/>
            </p>
            <p>
                <button>Mentés</button>
            </p>              
        </fieldset>
    <?= form_close(); ?>
</fieldset>