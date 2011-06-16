<h2>
    <?= $current_breeder_site->name; ?> - 
    <?= $current_breeder_site->code; ?>/<?= $current_breeder_site->mgszh; ?> fakkcsoportjai
    
</h2>

<p>
    <a href="<?= base_url() ?>fakkgroup/edit/breedersite/<?= $current_breeder_site->id; ?>" dialog_id = "0" rel = "dialog" title = "Fakkcsoport felvitele">új csoport felvitele</a>
</p>

<?= $template['partials']['fakk_groups']; ?>