<fieldset class = "round">
    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash()?>" id = "csrf-token"/>  
    <table class = "inner-table">
        <thead>
            <tr>
                <td>&nbsp;</td>
                <?php foreach ($egg_types as $type): ?>
                    <td><?= $type->code; ?> - <?= $type->description; ?></td>
                <?php endforeach ?>
                <td>&nbsp;</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($stocks as $item): ?>
                <tr>
                    <td class = "td-first"><?= $item['stock']->code; ?></td>
                    <?php if ($item['data']): ?>
                        
                        <?php foreach ($item['data'] as $eggPieces): ?>
                            <td class = "td-data">
                                <input type="text" name = "pieces[]" value = "<?= $eggPieces->piece; ?>" size="7" />
                                <input type="hidden" name = "types[]" value = "<?= $eggPieces->egg_type_id; ?>" />
                            </td>
                        <?php endforeach ?>
                        
                        <?php $diff = sizeof($egg_types) - sizeof($item['data']) ?>
                        <?php if ($diff): ?>
                            <?php for ($i = 0; $i < $diff; $i++) : ?>
                                <td>0</td>
                            <?php endfor ?>
                            <td class = "td-last">&nbsp;</td>
                        <?php else: ?>
                            <td class = "td-last">
                                <a href="<?= base_url(); ?>productiondata/edit/<?= $item['production_day_id']; ?>" class="update-production-data">mentés</a>
                                <br />
                                <a href="<?= base_url(); ?>productiondata/delete/<?= $item['production_day_id']; ?>" class = "delete-production-data">töröl</a>
                            </td>
                        <?php endif ?>
                    <?php else: ?>
                        <!-- 
                        <?php for ($i = 0; $i < sizeof($egg_types); $i++) : ?>
                            <td>0</td>
                        <?php endfor ?>
                        <td class = "td-last">&nbsp;</td>
                        -->
                        <td colspan = "<?= sizeof($egg_types)+1; ?>"><em>nincs bejegyzés</em></td>
                    <?php endif ?>
                    
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    
</fieldset>
