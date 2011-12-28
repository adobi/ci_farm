<p>
    <a class="button" href="<?= base_url() ?>cast/edit" dialog_id = "0" rel = "dialog" title = "Állatfaj felvitele">új állatfaj felvitele</a>
</p>

<fieldset>
    <legend>Állatfajok</legend>
    <?php if ($items): ?>
        
        <?php foreach ($items as $item): ?>
        
            <div class = "zebra span-18">
                <div class="span-13">
                    <p><strong><?= $item->name ?></strong></p>
                </div>
                <div class="span-4 last text-right">
                    <?php if ($item->id != 1): ?>
                        
                        <a class="button button-small delete" href="<?= base_url() ?>cast/delete/<?= $item->id ?>">töröl</a>
                    <?php endif ?>
                    <a class="button button-small" href="<?= base_url() ?>cast/edit/<?= $item->id ?>" dialog_id = "<?= $item->id ?>" rel = "dialog" title = "Állatfaj szerkesztése">szerkeszt</a>

                </div>
                <fieldset>
                    <legend>Fajták</legend>
                    <p>
                        <a style="float:none;" href="<?= base_url(); ?>cast_type/edit/cast/<?= $item->id; ?>" class="button button-small" rel="dialog">új fajta</a>                        
                    </p>
                    
                    <?php if ($item->cast_types): ?>
                        <?php foreach ($item->cast_type as $jtem): ?>
                            <div class="span-17 zebra">
                                <p>
                                    <strong style="float:left"><?= $jtme->name; ?></strong>
                                    <a href="" class="button button-small">töröl</a>
                                    <a href="" class="button button-small">szerkeszt</a>
                                </p>
                            </div>
                        <?php endforeach ?>
                    <?php endif ?>
                    
                </fieldset>
            </div>
        <?php endforeach ?>
    <?php else: ?>
        <p class="info">Nincs adat</p>
    <?php endif ?>
</fieldset>