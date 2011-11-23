<style type="text/css">
    label {
        display:inline-block;
        width:150px;
    }
</style>
<fieldset class = "round">
    <p>
        <label for="">Válasszon tenyészetet</label>

        <?= form_dropdown('breeder_site_id', $breeder_sites_select, $this->session->userdata('selected_breedersite')); ?>
    </p>
    
    <?php if ($this->session->userdata('selected_breedersite')): ?>
        <?php if (count($yards_select) !== 1): ?>
            <p>
                <label for="">Válasszon istállót</label>
                <?= form_dropdown('stock_yard_id', $yards_select, $this->session->userdata('selected_stockyard')); ?>
            </p>
            <?php if ($this->session->userdata('selected_stockyard')): ?>
                <?php if ($can_start_new_hatching): ?>
                    
                    <p>
                        <a href="<?= base_url() ?>egg/index/new_hatching" class = "button">Új betelepítés</a>
                    </p>
            
                <?php endif ?>
            <?php endif ?>
    
        <?php else: ?>
            <div class="info">
                A kiválasztott tenyészethez nem szerepel istálló.
            </div>
        <?php endif ?>
    <?php endif ?>
    
</fieldset>
<?php if (!$can_start_new_hatching && $this->session->userdata('selected_breedersite') && $this->session->userdata('selected_stockyard')): ?>
    <?php  echo form_open() ?>
    <fieldset class="round span-8" id="fakks">
        <legend>Fakkok</legend>
        <?php if ($fakks): ?>
            <?php foreach ($fakks as $item): ?>
                <div class="span-7">
                    <label class="input-wrapper">
                        <input type="radio" name = "fakk_id" value = "<?php echo $item->id ?>"/>
                        <?php echo $item->name ?>
                    </label>
                </div>
            <?php endforeach ?>
            
        <?php endif ?>
    </fieldset>
    <div class="span-2 text-center" style="margin-top:20px;">
        <a href="javascript:void(0)" class="left-arrow-big" id="add-stock-to-fakk"></a>
        <a href="<?php echo base_url() ?>egg/add_stock_to_fakk/" class="hidden" rel = "dialog" title = "Állomány fakkba telepítése" id="dialog-add-stock-to-fakk"></a>
    </div>
    <fieldset class="round span-8" id="stocks">
        <legend>Állományok</legend>
        <?php if ($stocks): ?>
            <?php foreach ($stocks as $item): ?>
                <div class="span-7">
                    <label class="input-wrapper">
                        <input type="radio" name = "stock_yard_id" value = "<?php echo $item->id ?>"/>
                        <?= $item->stock_code; ?> (<?= $item->piece; ?>  db <?= $item->cast_type_name; ?>)
                    </label>
                </div>
            <?php endforeach ?>
        <?php endif ?>
    </fieldset>
    <?php echo form_close() ?>
<?php endif ?>


