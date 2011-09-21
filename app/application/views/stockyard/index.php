<fieldset class="round">
    <legend>Válasszon tenyészetet</legend>
        <?php if (isset($breeder_sites_select) && count($breeder_sites_select) !== 1): ?>
            <?= form_dropdown('breeder_site_id', $breeder_sites_select, $this->session->userdata('selected_breedersite')); ?>
        <?php endif ?>
        <a class="button" href="<?= base_url(); ?>breedersite/edit/breeder/<?= $breeder->id; ?>" rel = "dialog" title = "Új telephely felvitele">Új tenyészet felvitele</a>
</fieldset>

<?php if ($this->session->userdata('selected_breedersite')): ?>
    <fieldset class="round">
        <legend>Istállók</legend>
        
        <p>
            <a href="<?= base_url(); ?>stockyard/edit/breeder_site/<?= $this->session->userdata('selected_breedersite'); ?>" class="button  " rel="dialog" title = "Új istálló felvitele">új istálló felvitele</a>
        </p>

        <?php if ($stockyards): ?>
            <?php foreach ($stockyards as $item): ?>
                <div class="span-18 zebra">
                    <div class="span-12" style="line-height:2em;">
                        <p><strong><?= $item->name ?></strong></p>
                    </div>                
                    <div class="span-5 last text-right">    
                        <a href="<?= base_url(); ?>stockyard/edit/<?= $item->id; ?>" class="button " rel = "dialog" title = "<?= $item->name; ?> szerkesztése">szerkeszt</a>
                        <a href="<?= base_url(); ?>stockyard/delete/<?= $item->id; ?>" class="button delete">töröl</a>
                    </div>                
                </div>
            <?php endforeach ?>
  
        <?php else: ?>
            <p class="message-info">Nincs adat</p> 
                
        <?php endif ?>
        
    </fieldset>
<?php endif ?>
