<h2>
    <?= $current_stock_yard->name; ?> fakkcsoportjai
</h2>

<p>
    <a class = "button" href="<?= base_url() ?>fakkgroup/edit/stockyard/<?= $current_stock_yard->id; ?>" dialog_id = "0" rel = "dialog" title = "Fakkcsoport felvitele">új csoport felvitele</a>
</p>

<?= $template['partials']['fakk_groups']; ?>