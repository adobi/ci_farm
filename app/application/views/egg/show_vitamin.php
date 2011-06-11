<fieldset class = "round">
    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash()?>" id = "csrf-token"/>  
    
    <table class="inner-table">
        <thead>
            <tr>
                <td>&nbsp;</td>
                <td class = "text-center">Vitamin</td>
                <td>&nbsp;</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($stocks as $item): ?>
                <tr>
                    <td class = "td-first"><?= $item['stock']->code; ?></td>
                    <?php if ($item['data'] && $item['data']->vitamin): ?>
                        
                        <td class = "td-data">
                            <textarea name="vitamin" cols="60" rows="3"><?= ($item['data']->vitamin) ?></textarea>
                        </td>
                        <td class = "td-last">
                            <a href="<?= base_url() ?>productionday/edit_vitamin/<?= $item['data']->id ?>" class = "update-production-vitamin">mentés</a>
                            <br />
                            <a href="<?= base_url() ?>productionday/delete_vitamin/<?= $item['data']->id ?>" class = "delete-production-vitamin">töröl</a>
                        </td>
                    <?php else: ?>
                        <td colspan = "4"><em>nincs bejegyzés</em></td>
                    <?php endif ?>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</fieldset>