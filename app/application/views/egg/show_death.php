<fieldset class = "round">
    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash()?>" id = "csrf-token"/>  
    
    <table class="inner-table">
        <thead>
            <tr>
                <td>&nbsp;</td>
                <td class = "text-center" colspan = "2">Elhalálozás</td>
                <td class = "text-center" colspan = "2">Selejt</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td style="width:120px;">Jérce</td>
                <td style="width:120px;">Kakas</td>
                <td style="width:120px;">Jérce</td>
                <td style="width:120px;">Kakas</td>
                <td>&nbsp;</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($stocks as $item): ?>
                <tr>
                    <td class = "td-first"><?= $item['stock']->code; ?></td>
                    <?php if ($item['data'] && ($item['data']->dead_female || $item['data']->dead_male || $item['data']->reject_female || $item['data']->reject_male)): ?>
                        
                        <td colspan = "4" style = "padding:0px;">
                            
                            <?= form_open(); ?>
                            <table cellspacing = "0" cellpadding = "0">
                                <tr>
                                    <td class = "td-data no-border" style = "width:120px;border-right:1px solid #ccc">
                                        <input type="text" name = "dead_female" value = "<?= $item['data']->dead_female; ?>" size="7" />
                                    </td>
                                    <td class = "td-data no-border" style = "width:120px;border-right:1px solid #ccc">
                                        <input type="text" name = "dead_male" value = "<?= $item['data']->dead_male; ?>" size="7"/>
                                    </td>
                                    <td class = "td-data no-border" style = "width:120px;border-right:1px solid #ccc">
                                        <input type="text" name = "reject_female" value = "<?= $item['data']->reject_female; ?>" size="7"/>
                                    </td>
                                    <td class = "td-data no-border" style="width:120px;">
                                        <input type="text" name = "reject_male" value = "<?= $item['data']->reject_male; ?>" size="7"/>
                                    </td>                                    
                                </tr>
                            </table>
                            <?= form_close(); ?>                            
                        </td>
                        <td class = "td-last">
                            <a href="<?= base_url() ?>productionday/edit_death/<?= $item['data']->id ?>" class = "update-production-death">mentés</a>
                            <br />
                            <a href="<?= base_url() ?>productionday/delete_death/<?= $item['data']->id ?>" class = "delete-production-death">töröl</a>
                        </td>
                    <?php else: ?>
                        <td colspan = "5"><em>nincs bejegyzés</em></td>
                    <?php endif ?>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</fieldset>