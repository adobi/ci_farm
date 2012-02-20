<style type="text/css">
    label {
        display:inline-block;
        width:150px;
    }
</style>

<h2 style="padding:5px;">Csibenevelési napló</h2>

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
        <?php else: ?>
            <div class="message-info">
                A kiválasztott tenyészethez nem szerepel istálló. 
                <a class = "button button-small" rel = "dialog" title="Új istálló felvitele" href="<?php echo base_url() ?>stockyard/edit/breeder_site/<?php echo $this->session->userdata('selected_breedersite') ?>">új istálló felvitele</a>
            </div>
        <?php endif ?>
    
    <?php endif ?>
    <?php if ($this->session->userdata('selected_breedersite') && $this->session->userdata('selected_stockyard')): ?>
        
        <?php if ($hatching): ?>
                
            <p>
                <label>Telepítésidőpontja</label>
                <span><?php echo to_date($hatching->created) ?></span>
            </p>
        
        <?php else: ?>
            <div class="message-info">Nincs aktuális betelepítés</div>
        <?php endif ?>
    <?php endif ?>
    
</fieldset>


