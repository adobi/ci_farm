<fieldset class = "round">

    <table class = "inner-table">
        <thead>
            <tr>
                <td>&nbsp;</td>
                <?php foreach ($egg_types as $type): ?>
                    <td><?= $type->code; ?> - <?= $type->description; ?>(<?= $type->id; ?>)</td>
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
                            <td class = "td-data"><?= $eggPieces->piece; ?></td>
                        <?php endforeach ?>
                        
                        <?php $diff = sizeof($egg_types) - sizeof($item['data']) ?>
                        <?php if ($diff): ?>
                            <?php for ($i = 0; $i < $diff; $i++) : ?>
                                <td>0</td>
                            <?php endfor ?>
                            <td class = "td-last">&nbsp;</td>
                        <?php else: ?>
                            <td class = "td-last">
                                <a href="#">szerkeszt</a>
                                <br />
                                <a href="#" class = "delete-production-data">töröl</a>
                            </td>
                        <?php endif ?>
                    <?php else: ?>
                        <?php for ($i = 0; $i < sizeof($egg_types); $i++) : ?>
                            <td>0</td>
                        <?php endfor ?>
                        <td class = "td-last">&nbsp;</td>
                    <?php endif ?>
                    
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    
</fieldset>
