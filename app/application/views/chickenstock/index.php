<fieldset class="round">
    <legend>Válasszon tenyészetet</legend>
        <?= form_dropdown('breeder_site_id', $breeder_sites_select, $this->session->userdata('selected_breedersite')); ?>
        <a class="button" href="<?= base_url(); ?>breedersite/edit/breeder/<?= $breeder_id; ?>" rel = "dialog" title = "Új telephely felvitele">Új tenyészet felvitele</a>
</fieldset>

<fieldset class="round">
    <?php dump($items) ?>
</fieldset>