<fieldset class = "round">
    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash()?>" id = "csrf-token"/>  
    <table class = "inner-table">
        <thead>
            <tr>
                <td>&nbsp;</td>
                <td style="width:150px;">Mennyiség jérce</td>
                <td style="width:150px;">Mennyiség kakas</td>
                <td style="width:150px;">Mennyiseg szemes</td>
                <td>&nbsp;</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($stocks as $item): ?>
                <tr>
                    <td class = "td-first"><?= $item['stock']->code; ?></td>
                    <?php if ($item['data'] && ($item['data']->feed_female || $item['data']->feed_male || $item['data']->feed_grain)): ?>
                        <td colspan = "3" style = "padding:0px;">
                            <?= form_open(); ?>
                            <table cellspacing = "0" cellpadding = "0">
                                <tr>
                                    <td class = "td-data no-border" style = "width:150px;border-right:1px solid #ccc">
                                        <input type="text" name = "feed_female" value = "<?= $item['data']->feed_female; ?>" size="6" /> kg
                                    </td>
                                    <td class = "td-data no-border" style = "width:150px;border-right:1px solid #ccc">
                                        <input type="text" name = "feed_male" value = "<?= $item['data']->feed_male; ?>" size="6"/> kg
                                    </td>
                                    <td class = "td-data no-border" style = "width:150px;">
                                        <input type="text" name = "feed_grain" value = "<?= $item['data']->feed_grain; ?>" size="6"/> kg
                                    </td>
                                </tr>
                            </table>
                            <?= form_close(); ?>
                        </td>
                        <td class = "td-last">
                            <a href="<?= base_url(); ?>productionday/edit_feed/<?= $item['data']->id; ?>" class="update-production-feed">mentés</a>
                            
                            <br />
                            <a href="<?= base_url(); ?>productionday/delete_feed/<?= $item['data']->id; ?>" class = "delete-production-feed">töröl</a>
                            
                        </td>
                        
                    <?php else: ?>
                        <!-- 
                        <?php for ($i = 0; $i < 3; $i++) : ?>
                            <td>0</td>
                        <?php endfor ?>
                        <td class = "td-last">&nbsp;</td>                        
                         -->
                         <td colspan = "4"><em>nincs bejegyzés</em></td>
                    <?php endif ?>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    
</fieldset>
