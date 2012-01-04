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
                    <?php //if ($fakks && $stocks): ?>
                        
                        <p>
                            <a href="<?= base_url() ?>egg/index/new_hatching" class = "button">Új betelepítés</a>
                        </p>
                    <?php //else: ?>
                    <?php //endif ?>
            
                <?php endif ?>
            <?php endif ?>
    
        <?php else: ?>
            <div class="message-info">
                A kiválasztott tenyészethez nem szerepel istálló. 
                <a class = "button button-small" rel = "dialog" title="Új istálló felvitele" href="<?php echo base_url() ?>stockyard/edit/breeder_site/<?php echo $this->session->userdata('selected_breedersite') ?>">új istálló felvitele</a>
            </div>
        <?php endif ?>
    <?php endif ?>
    
</fieldset>
<?php if (!$can_start_new_hatching && $this->session->userdata('selected_breedersite') && $this->session->userdata('selected_stockyard')): ?>
    <?php  echo form_open('', array('id'=>'fakks-and-stocks')) ?>
        <fieldset class="round span-8" id="stocks">
            <legend>Állományok</legend>
            <?php if ($stocks): ?>
                <?php foreach ($stocks as $item): ?>
                    <?php //if ($item->piece - $item->piece_in_fakk): ?>
                        <div class="span-7">
                            <label class="input-wrapper">
                                <input type="radio" name = "stock_yard_id" value = "<?php echo $item->id ?>"/>
                                <?= $item->stock_code; ?> (<?= $item->piece - $item->piece_in_fakk; ?>  db <?= $item->cast_type_name; ?>)
                            </label>
                        </div>
                    <?php //endif ?>
                <?php endforeach ?>
            <?php else: ?>
                <div class="error">
                    Előbb vigyen fel szállítólevelet és állományt.
                </div>                
            <?php endif ?>
        </fieldset>
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
            <?php else: ?>
                <div class="error">
                    Előbb vigyen fel fakkot 
                    <a href="<?php echo base_url() ?>fakk/for_breedersite/<?php echo $this->session->userdata('selected_breedersite') ?>" class="button">Fakk kialakítása</a>
                </div>
            <?php endif ?>
        </fieldset>
        <div class="span-2 text-center" style="margin-top:5px;">
            <a href="javascript:void(0)" class="right-arrow-big_ button" id="add-stock-to-fakk" style="margin-top:50%">Beólaz</a>
            <a href="<?php echo base_url() ?>egg/add_stock_to_fakk/" class="hidden" rel = "dialog" title = "Állomány fakkba telepítése" id="dialog-add-stock-to-fakk"></a>
        </div>
    <?php echo form_close() ?>
<?php endif ?>

<?php if ($stock_in_fakk): ?>
    <fieldset class="round" style="clear:both;">
        <legend>Betelepített állományok</legend>
        <table class="bordered-table zebra-striped">
            <thead>
                <tr>
                    <th>Dátum</th>
                    <th>Fakk</th>
                    <th>Állomány</th>
                    <th>Fajta</th>
                    <th>Darab</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($stock_in_fakk as $item): ?>
                    <tr>
                        <td><?php echo to_date($item->created) ?></td>
                        <td><?php echo $item->fakk_name ?></td>
                        <td><?php echo $item->stock_code ?></td>
                        <td><?php echo $item->cast_type_name ?></td>
                        <td><?php echo $item->piece ?></td>
                        <td>
                            <a href="<?php echo base_url() ?>egg/edit_stock_in_fakk/<?php echo $item->id ?>" rel = "dialog" title = "Fakkban lévő állomány szerkesztése" class = "button button-small">szerkeszt</a>
                            <a href="<?= base_url() ?>egg/remove_stock_from_fakk/<?php echo $item->id ?>" class = "button button-small delete">töröl</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </fieldset>
<?php endif ?>


