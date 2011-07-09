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
            <label for="type" class = "block">Faj</label>
            <input type="text" name = "type" id = "type" value = "<?= $current_item ? $current_item->type : '' ?>" class = "text"/>
        </p>
        <p>
            <label for="start_date" class = "block">Tartás kezdete</label>
            <input type="text" name = "start_date" id = "start_date" value = "<?= $current_item ? to_date($current_item->start_date) : '' ?>" class = "text datepicker"/>
        </p>
        <p>
            <label for="end_date" class = "block">Tartás kezdete</label>
            <input type="text" name = "end_date" id = "end_date" value = "<?= $current_item ? to_date($current_item->end_date) : '' ?>" class = "text datepicker"/>
        </p>
        <p>
            <label for="size" class = "block">Létszám</label>
            <input type="text" name = "size" id = "type" value = "<?= $current_item ? $current_item->size : '' ?>" class = "text"/>
        </p>
        <p>
            <label for="utilization" class = "block">Hasznosítás</label>
            <input type="text" name = "utilization" id = "utilization" value = "<?= $current_item ? $current_item->utilization : '' ?>" class = "text"/>
        </p>
        
        <p>
            <button>Mentés</button>
        </p>
    <?= form_close(); ?>
</fieldset>      