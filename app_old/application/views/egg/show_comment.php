<fieldset class = "round">
    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash()?>" id = "csrf-token"/>  
    
    <table class="inner-table">
        <thead>
            <tr>
                <td>Istálló / Fakk / Típus / Kód</td>
                <td class = "text-center">Megjegyzés</td>
                <td>&nbsp;</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($stocks as $item): ?>
                <tr>
                    <td class = "td-first">
                        <?= $item['stock']->stock_yard_name ?> /
                        <?= $item['stock']->fakk_name ?> /
                        <?= $item['stock']->chicken_type_name ?> /
                        <?= $item['stock']->code; ?>
                    </td>
                    <?php if ($item['data'] && $item['data']->comment): ?>
                        
                        <td class = "td-data">
                            <textarea name="comment" cols="60" rows="3"><?= ($item['data']->comment) ?></textarea>
                        </td>
                        <td class = "td-last">
                            <a href="<?= base_url() ?>productionday/edit_comment/<?= $item['data']->id ?>" class = "update-production-comment">mentés</a>
                            <br />
                            <a href="<?= base_url() ?>productionday/delete_comment/<?= $item['data']->id ?>" class = "delete-production-comment">töröl</a>
                        </td>
                    <?php else: ?>
                        <td colspan = "4"><em>nincs bejegyzés</em></td>
                    <?php endif ?>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</fieldset>