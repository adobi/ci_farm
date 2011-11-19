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
        <?php if ($yards_select): ?>
            <p>
                <label for="">Válasszon istállót</label>
                <?= form_dropdown('stock_yard_id', $yards_select, $this->session->userdata('selected_stockyard')); ?>
            </p>
            
            <p>
                <a href="<?= base_url() ?>egg/index/new_hatching" class = "button">Új betelepítés</a>
            </p>
            
        <?php else: ?>
            <div class="info">
                A kiválasztott tenyészethez nem szerepel istálló.
            </div>
        <?php endif ?>
    <?php endif ?>
    
</fieldset>
<?php if ($this->uri->segment(3) === 'new_hatching'): ?>
    
    <fieldset class="round span-9">
        <legend>Fakkok</legend>
        <?php if ($fakks): ?>
            <?php foreach ($fakks as $item): ?>
                <div class="span-8">
                    <?php echo $item->name ?>
                </div>
            <?php endforeach ?>
            
        <?php endif ?>
    </fieldset>
    <fieldset class="round span-9 fr">
        <legend>Állományok</legend>
    </fieldset>
<?php endif ?>
