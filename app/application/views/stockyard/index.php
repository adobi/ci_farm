<div class = "span-19" style="margin-bottom:20px">
    <div class = "span-19 first inline-block">
        
        <?php if (isset($breeder_sites_select) && count($breeder_sites_select) !== 1): ?>
            <label for="breedersite-select" style="display:inline">Válasszon tenyészetet</label>
            <?= form_dropdown('breeder_site_id', $breeder_sites_select, $this->session->userdata('selected_breedersite')); ?>
        <?php endif ?>
        <a class="button" href="<?= base_url(); ?>breedersite/edit/breeder/<?= $breeder->id; ?>" rel = "dialog" title = "Új telephely felvitele">Új tenyészet felvitele</a>
    </div>
</div>

<?php if ($this->session->userdata('selected_breedersite')): ?>
    <fieldset class="round">
        <legend>Istállók</legend>
        
        <p>
            <a style="float:none;" href="<?= base_url(); ?>stockyard/edit/breeder_site/<?= $this->session->userdata('selected_breedersite'); ?>" class="button  " rel="dialog" title = "Új istálló felvitele">új istálló felvitele</a>
        </p>

        <?php if ($stockyards): ?>
            <?php foreach ($stockyards as $item): ?>
                <div class="span-19 zebra">
                    <div class="span-12" style="line-height:2em;">
                        <p><strong><?= $item->name ?></strong></p>
                    </div>                
                    <div class="span-6 last text-right">    
                        <a href="<?= base_url(); ?>stockyard/delete/<?= $item->id; ?>" class="button delete">töröl</a>
                        <a href="<?= base_url(); ?>stockyard/edit/<?= $item->id; ?>" class="button " rel = "dialog" title = "<?= $item->name; ?> szerkesztése">szerkeszt</a>
                    </div>                
                </div>
            <?php endforeach ?>
  
        <?php else: ?>
            <p class="message-info">Nincs adat</p> 
                
        <?php endif ?>
        
    </fieldset>
<?php endif ?>
