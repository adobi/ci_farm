
<style type="text/css">
    fieldset .inline-block {
        width:230px;
    }
</style>
<?php echo form_open() ?>
    <fieldset class="round">
        <legend>Szülőpárállomány</legend>
        <p>
            <label class = "inline-block" for="parent_male_code">Hímivar azonosítója</label>
            <!-- <input type="text" name = "parent_male_code" id = "parent_male_code" value="<?= $current_item ? $current_item->parent_male_code : '' ?>"  size = "15"/> -->
            <?php if (!$current_item): ?>
                <?php echo form_dropdown('male_stock_id', $stocks, $current_item ? $current_item->male_stock_id : '') ?> 
            <?php else: ?>
                <?php echo $current_item->stock_info ? $current_item->stock_info->male_stock_code . ' ' . $current_item->stock_info->male_piece : '' ?>
            <?php endif ?>
            darab &nbsp;
            <?= form_dropdown('male_cast_type', $cast_types, $current_item ? $current_item->male_cast_type : ''); ?> fajta
        </p>
    
        <p>
            <label class = "inline-block" for="parent_female_code">Nőivar azonosítója</label>
            <!--<input type="text" name = "parent_female_code" id = "parent_female_code" value="<?= $current_item ? $current_item->parent_female_code : '' ?>"  size = "15"/> -->
            <?php if (!$current_item): ?>
                <?php echo form_dropdown('female_stock_id', $stocks, $current_item ? $current_item->female_stock_id : '') ?> 
            <?php else: ?>
                <?php echo $current_item->stock_info ? $current_item->stock_info->female_stock_code . ' ' . $current_item->stock_info->female_piece : '' ?>
            <?php endif ?>
            
            darab &nbsp;
            <?= form_dropdown('female_cast_type', $cast_types, $current_item ? $current_item->female_cast_type : ''); ?> fajta
        </p>    
    </fieldset>
    <fieldset class="round" id = "proof-of-origin">
        <p>
            <label class = "inline-block" for="mgszh_code">MgSzH által adott azonosító</label>
            <input type="text" name = "mgszh_code" id = "mgszh_code" value="<?= $current_item ? $current_item->mgszh_code : '' ?>" size = "15"/>
        </p>
    
        <p>
            <label class = "inline-block" for="cast_type_id">Fajta/hibrid neve</label>
            <!-- <input type="text" name = "cast_type_id" id = "cast_type_id" value="<?= $current_item ? $current_item->cast_type_id : '' ?>" />-->
            <?= form_dropdown('cast_type_id', $cast_types, $current_item ? $current_item->cast_type_id : ''); ?>
        </p>
    
        <p>
            <label class = "inline-block" for="klass">Törzskönyvi osztály</label>
            <input type="text" name = "klass" id = "klass" value="<?= $current_item ? $current_item->klass : '' ?>" size = "15"/>
        </p>
    
        <p>
            <label class = "inline-block" for="stock_reason">Csoport létrejöttének oka</label>
            <input type="text" name = "stock_reason" id = "stock_reason" value="<?= $current_item ? $current_item->stock_reason : '' ?>" size = "52"/>
        </p>
    
        <p>
            <label class = "inline-block" for="egg_code">Tojásjelölő kód</label>
            <input type="text" name = "egg_code" id = "egg_code" value="<?= $current_item ? $current_item->egg_code : '' ?>" size = "15"/>
        </p>
        <p>
            <label class = "inline-block" for="validity_until">Származási igazolás érvényessége</label>
            <input type="text" name = "validity_until" id = "validity_until" value="<?= $current_item ? to_date($current_item->validity_until) : '' ?>" class = "datepicker" />
        </p>
        <p>
            <label class = "inline-block" for="created">Keltezés</label>
            <input type="text" name = "created" id = "created" value="<?= $current_item ? to_date($current_item->created) : '' ?>" class = "datepicker" />
        </p>
    </fieldset>
    
    <fieldset  class="round">
        <p>
            <button>Mentés</button>
        </p>        
    </fieldset>     
<?php echo form_close() ?>   