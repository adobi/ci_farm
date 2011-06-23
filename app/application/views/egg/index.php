
<div class = "span-20">
    <div class = "span-9 first inline-block">
        
        
        <label for="breedersite-select" style="display:inline">Válasszon telephelyet</label>
        <?php if (isset($breeder_sites)): ?>
            <?= form_dropdown('breeder_site_id', $breeder_sites, $this->session->userdata('selected_breedersite')); ?>
        <?php endif ?>
        <a href="<?= base_url(); ?>breedersite/edit/breeder/<?= $breeder->id; ?>" rel = "dialog" title = "Új telephely felvitele">Új telephely</a>
        
    </div>
    <div class = "span-10 last text-right">
        <a href="<?= base_url(); ?>stock/add_to_breedersite" class = "button" rel = "dialog" title = "Új állomany felvitele és beólazása">Beólazás</a>
        <a href="#" class = "button">Állomány felszámolása</a>
        <!-- 
        <?php if (isset($stocks)): ?>
            <br />
            <label for="selected_chickenstock">Válasszon állományt</label>
            <?= form_dropdown('chicken_stock_id', $stocks, $this->session->userdata('selected_chickenstock')); ?>
        <?php endif ?>
         -->
    </div>
</div>

<div class = "span-20" style = "padding-left:0px" data-week = "<?= $this->uri->segment(3); ?>" id = "the-egg-week">
</div>
