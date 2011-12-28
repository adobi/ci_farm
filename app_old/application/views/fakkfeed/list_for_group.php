<?php if ($feeds): ?>
    <fieldset class = "round" style = "width:500px; padding:5px;">
        
        <?php foreach ($feeds as $item): ?>
            <p class = "zebra">
                <strong><?= to_date($item->to_date); ?></strong> - 
                kakas: <strong><?= $item->feed_male; ?></strong> 
                jérce: <strong><?= $item->feed_female; ?></strong> 
                szemes: <strong><?= $item->feed_grain; ?></strong>
                
                <a href="<?= base_url(); ?>fakkfeed/delete/<?= $item->id; ?>" class = "delete">töröl</a>
            </p>
        <?php endforeach ?>
    </fieldset>
<?php else: ?>
    <div class="notice">Nincs bejegyzés</div>
<?php endif ?>