<p  style="padding: 10px;">
    <label for="breedersite-select" style="display:inline">Válasszon telephelyet</label>
    <?php if (isset($breeder_sites)): ?>
        <?= form_dropdown('breeder_site_id', $breeder_sites, $this->session->userdata('selected_breedersite')); ?>
    <?php endif ?>

    <a href="<?= base_url(); ?>stock/add_to_breedersite" class = "button" rel = "dialog" title = "Ój állomány felvitele">Új állomány felvitele</a>

</p>

<p  style="padding: 10px;">
    <a href="<?= base_url(); ?>stock/show/all" class = "button <?= $this->uri->segment(3) && $this->uri->segment(3) === 'all'?'ui-state-focus':''; ?>">Eddigi összes állomány</a>
    <a href="<?= base_url(); ?>stock/show/active"  class = "button <?= $this->uri->segment(3) && $this->uri->segment(3) === 'active'?'ui-state-focus':''; ?>">Beólazott állományok</a>
</p>

<?php if ($stocks): ?>
    <!-- <h3 class="text-center"><?= $this->uri->segment(3) ? "Eddigi " : "Beólazott" ?>állományok</h3> -->
    <table class="week-table" cellpadding = "0" cellspacing = "0">
        <thead>
            <tr>
                <td class="span-1">Kód</td>
                <td class="span-3">Fakk</td>
                <td class="span-4">Részletek</td>
                <td class="span-3">Szülők</td>
                <td class="span-2">Számosság</td>
                <td class="span-4">Dátum</td>
                <td class="span-2">&nbsp;</td>
            </tr>
        </thead>
        <tbody class="week-tbody">
        <?php foreach ($stocks as $item): ?>
            <tr  class="week-tr middle
                <?php if ($this->uri->segment(3) === 'all' && $item->is_finished): ?>
                    finished-stock     
                <?php endif ?>
                <?php if (!$item->fakk_id): ?>
                    not-in-fakk
                <?php endif ?>
            ">
                <td><?= $item->code; ?></td>
                <td>
                    <?php if ($item->stock_yard_name && $item->fakk_name && $item->fakk_group_name): ?>
                        <p><strong>Istálló</strong>: <?= $item->stock_yard_name; ?></p>
                        <p><strong>Fakkcsoport</strong>: <?= $item->fakk_group_name; ?></p>
                        <p><strong>Fakk</strong>: <?= $item->fakk_name; ?></p>
                    <?php else: ?>
                        <em>nincs fakk</em>
                    <?php endif ?>

                </td>
                <td>
                    <p><strong>Tyúk</strong>: <?= $item->chicken_type_name; ?></p>
                    <p><strong>Tojás kód</strong>: <?= $item->egg_code; ?></p>
                    <p><strong>Osztály</strong>: <?= $item->klass; ?></p>
                    
                </td>
                <td>
                    <p>
                        <strong>Kakas</strong>: <?= $item->parent_male_code; ?>
                    <a style="float:right;position:relative;_right:-135px;" href="<?= base_url(); ?>stock/show_parents/<?= $item->id; ?>" rel = "dialog" title = "Szülő állományok">
                        <span class = "show-details-icon"></span>
                    </a>
                    </p>
                    <p>
                        <strong>Jérce</strong>: <?= $item->parent_female_code; ?>
                    </p>
                </td>
                <td>
                    <p><strong>Kakas</strong>: <?= $item->number_of_male; ?></p>
                    <p><strong>Jérce</strong>: <?= $item->number_of_female; ?></p>
                </td>
                <td>
                    <p><strong>Kelés</strong>: <?= date('Y-m-d', strtotime($item->birth_date)); ?></p>
                    <p><strong>Érvényes</strong>: <?= date('Y-m-d', strtotime($item->validity_date)); ?></p>
                </td>
                <td>
                    <a href="<?= base_url(); ?>stock/edit/<?= $item->id; ?>" rel = "dialog" title = "Állomány szerkesztése">szerkeszt</a>
                </td>
            </tr>
        <?php endforeach ?>
        
        </tbody>
    </table>        
<?php endif ?>