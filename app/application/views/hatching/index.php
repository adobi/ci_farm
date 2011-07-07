
<div class = "span-20">
    <div class = "span-9 first inline-block">
        
        
        <?php if (isset($breeder_sites) && count($breeder_sites) !== 1): ?>
            <label for="breedersite-select" style="display:inline">Válasszon telephelyet</label>
            <?= form_dropdown('breeder_site_id', $breeder_sites, $this->session->userdata('selected_breedersite')); ?>
        <?php else: ?>
            <strong>Előbb vigyen fel telephelyet</strong>              
        <?php endif ?>
        <a href="<?= base_url(); ?>breedersite/edit/breeder/<?= $breeder->id; ?>" rel = "dialog" title = "Új telephely felvitele">Új telephely</a>
        
    </div>
    <?php if (isset($breeder_sites) && count($breeder_sites) !== 1): ?>
    
        <div class = "span-10 last text-right">
            <a href="<?= base_url(); ?>stockegg/add_to_breedersite" class = "button" rel = "dialog" title = "Új állomany felvitele és beólazása">Új tojás állomány</a>
            <!-- <a href="#" class = "button">Állomány felszámolása</a> -->
        </div>
    <?php endif; ?>
</div>

<?php if (isset($breeder_sites) && count($breeder_sites) !== 1): ?>
    
    
    <div class = "span-20" style = "padding-left:0px">
        <h3 style="padding:5px;">Keltető gépek</h3>
        
        <?php if ($machines): ?>
            <?php foreach ($machines as $item): ?>
                <div class = "span-19 machine">
                    <strong><?= $item->name; ?></strong> kód: <?= $item->code; ?>
                    <div class = "inner-nav">
                        <a href="<?= base_url() ?>hatching/add_to_machine/<?= $item->id ?>" rel = "dialog" title = "Tojás állomány gépbe rakása" class = "button button-small">tojás allomány berakása</a>
                        <a href="<?= base_url() ?>hatching/eggstocks_in_machine/<?= $item->id ?>" class = "button button-small">tojás állományok</a>
                        <a href="#" class = "button button-small">előző kelések</a>
                    </div>
                </div>
            <?php endforeach ?>
        <?php else: ?>
            <p>
                <a href="<?= base_url(); ?>machine/edit" rel = "dialog" class = "button" title = "Új keltetögép felvitele">Új keltetőgép</a>
            </p>
        <?php endif ?>
    
    </div>
    
<?php endif ?>