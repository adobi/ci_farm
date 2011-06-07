<fieldset class = "round">

    <table class = "inner-table">
        <thead>
            <tr>
                <td></td>
                <?php foreach ($egg_types as $type): ?>
                    <td><?= $type->code; ?> - <?= $type->description; ?>(<?= $type->id; ?>)</td>
                <?php endforeach ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($stocks as $item): ?>
                <tr>
                    <td class = "td-first"><?= $item['stock']->code; ?></td>
                    <?php if ($item['data']): ?>
                        
                        <?php foreach ($item['data'] as $eggPieces): ?>
                            <td><?= $eggPieces->piece; ?></td>
                        <?php endforeach ?>
                        
                        <?php $diff = sizeof($egg_types) - sizeof($item['data']) ?>
                        <?php if ($diff): ?>
                            <?php for ($i = 0; $i < $diff; $i++) : ?>
                                <td>0</td>
                            <?php endfor ?>
                        <?php endif ?>
                        
                    <?php else: ?>
                        <?php for ($i = 0; $i < sizeof($egg_types); $i++) : ?>
                            <td>0</td>
                        <?php endfor ?>
                    <?php endif ?>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    
</fieldset>