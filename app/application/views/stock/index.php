<p  style="padding: 10px;">
    <a href="<?= base_url(); ?>stock/add_to_breedersite" class = "button" rel = "dialog" title = "Ój állomány felvitele">Új állomány felvitele</a>
    <a href="<?= base_url(); ?>stock/show/all" style="float:right;" class = "button <?= $this->uri->segment(3) && $this->uri->segment(3) === 'all'?'ui-state-focus':''; ?>">Eddigi összes állomány</a>
    <a href="<?= base_url(); ?>stock/show/active" style="float:right;" class = "button <?= $this->uri->segment(3) && $this->uri->segment(3) === 'active'?'ui-state-focus':''; ?>">Beólazott állományok</a>
</p>

<?php if ($stocks): ?>
    <!-- <h3 class="text-center"><?= $this->uri->segment(3) ? "Eddigi " : "Beólazott" ?>állományok</h3> -->
    <table class="week-table" cellpadding = "0" cellspacing = "0">
        <thead>
            <tr>
                <td class="span-1">Kód</td>
                <td class="span-2">Fakk</td>
                <td class="span-4">Részletek</td>
                <td class="span-4">Szülők</td>
                <td class="span-2">Számosság</td>
                <td class="span-4">Dátum</td>
                <td class="span-2">&nbsp;</td>
            </tr>
        </thead>
        <tbody class="week-tbody">
        <?php foreach ($stocks as $item): ?>
            <tr  class="week-tr middle">
                <td><?= $item->code; ?></td>
                <td><?= $item->fakk_name; ?></td>
                <td>
                    <p>Tyúk: <?= $item->chicken_type_name; ?></p>
                    <p>Tojás kód: <?= $item->egg_code; ?></p>
                    <p>Osztály: <?= $item->klass; ?></p>
                    
                </td>
                <td>
                    <p>
                        Kakas: <?= $item->parent_male_code; ?>
                    <a style="float:right;position:relative;_right:-135px;" href="<?= base_url(); ?>stock/show_parents/<?= $item->id; ?>" rel = "dialog" title = "Szülő állományok">
                        <span class = "show-details-icon"></span>
                    </a>
                    </p>
                    <p>
                        Jérce: <?= $item->parent_female_code; ?>
                    </p>
                </td>
                <td>
                    <p>Kakas: <?= $item->number_of_male; ?></p>
                    <p>Jérce: <?= $item->number_of_female; ?></p>
                </td>
                <td>
                    <p>Kelés: <?= date('Y-m-d', strtotime($item->birth_date)); ?></p>
                    <p>Érvényes: <?= date('Y-m-d', strtotime($item->validity_date)); ?></p>
                </td>
                <td>
                    <a href="<?= base_url(); ?>stock/edit/<?= $item->id; ?>" rel = "dialog" title = "Állomány szerkesztése">szerkeszt</a>
                </td>
            </tr>
        <?php endforeach ?>
        
        </tbody>
    </table>        
<?php endif ?>