
<style type="text/css">
    fieldset .inline-block {
        width:230px;
    }
</style>
<fieldset class="span-17" style="border:0px; padding:0;">
    <?= form_open(); ?>
    
        <fieldset class="round">
        
            <p>
                <label class = "inline-block" for="stock_code">Törzsállomány</label>
                <input type="text" name = "stock_code" id = "stock_code" value="<?= $current_item ? $current_item->stock_code : '' ?>" size = "15"/>
            </p>
            <p>
                <label class = "inline-block" for="intra_code">INTRA/KÁBÓ szám</label>
                <input type="text" name = "intra_code" id = "intra_code" value="<?= $current_item ? $current_item->intra_code : '' ?>" size = "25"/>
            </p>
            <p>
                <label class = "inline-block" for="hatching_breeder_site_id">Keltető tenyészet kódja</label>
                <!-- <input class="required" type="text" name = "hatching_breeder_site_id" id = "hatching_breeder_site_id" value="<?= $current_item ? $current_item->hatching_breeder_site_id : '' ?>" /> -->
                <strong><?php echo $current_delivery->seller_code ?></strong>
            </p>
            <p>
                <label class = "inline-block" for="hatching_date">Kelés dátuma</label>
                <input type="text" name = "hatching_date" id = "hatching_date" value="<?= $current_item ? to_date($current_item->hatching_date) : to_date($current_delivery->sell_date) ?>" class = "datepicker required" />
            </p>
            <p>
                <label class = "inline-block" for="piece">Darabszám</label>
                <input class="required" type="text" name = "piece" id = "piece" value="<?= $current_item ? $current_item->piece : '' ?>"  size = "15"/>
            </p>
        </fieldset>

        <fieldset  class="round">
            <p>
                <button>Mentés</button>
            </p>        
        </fieldset>
    <?= form_close(); ?>
</fieldset>