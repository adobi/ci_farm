<?php if (!$machine): ?>
    <div class="error">
        Nem lett kiválasztva gép, vagy nincs ilyen gép
    </div>
<?php else: ?>
    <h2 style="padding:5px;"><?= $machine->name ?> (<?= $machine->code ?>) állományai</h2>
    
    <?php if ($eggstocks): ?>
        <table cellspacing="5" cellpadding="5" class = "week-table first">
            <thead>
                <tr>
                    <td>Berakva</td>
                    <td>Darabszám</td>
                    <td>Tojás</td>
                    <td>Opciók</td>
                </tr>
            </thead>
            <tbody class = "week-tbody">
                <?php foreach ($eggstocks as $item): ?>
                    <!--
                    <div class="span-19 machine">
                        Berakva 
                        <strong>
                            <?= to_date($item->put_in_date) ?>:
                            <?= $item->piece ?> 
                        </strong>
                        darab
                        <?= $item->egg_type_description ?>
                        (<?= $item->egg_type_code ?>)
                        <div class="inner-nav">
                            <a href="#">Lámpázás</a> |
                            <a href="#">Bujtatás</a> |
                            <a href="#">Kelés</a>
                        </div>
                    </div>
                    -->
                    <tr class="week-tr">
                        <td class="text-center"><?= to_date($item->put_in_date) ?></td>
                        <td class="text-center"><?= $item->piece ?> </td>
                        <td><?= $item->egg_type_description ?> (Kód: <?= $item->egg_type_code ?>)</td>
                        <td class="text-center">
                            <a href="<?= base_url() ?>hatching/step/1/<?= $item->id ?>" rel = "dialog" title = "Lámpázás">Lámpázás</a> |
                            <a href="<?= base_url() ?>hatching/step/2/<?= $item->id ?>" rel = "dialog" title = "Bujtatás">Bujtatás</a> |
                            <a href="<?= base_url() ?>hatching/step/3/<?= $item->id ?>" rel = "dialog" title = "Kelés">Kelés</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    <?php else: ?>
        
    <?php endif ?>
    
<?php endif ?>

<p>
    <a href="<?= base_url() ?>hatching">&laquo; vissza a keltetéshez</a>
</p>
