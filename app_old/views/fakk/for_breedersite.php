<!-- 
<fieldset class="round">
    <legend>Válasszon istállót</legend>
</fieldset>
 -->
 
<style type="text/css">
     .fakk-tmpl {
         background:#f7f7f7; margin-bottom:5px;
     }
 </style> 

<h3 class="span-20" style="margin-top:10px; margin-left:10px;">Telephely: <?= $site->name; ?></h3>
 
<?php if (count($stockyards) !== 1): ?>
    
    <?php if (validation_errors()): ?>
        <div class="span-19 error"><?= validation_errors(); ?></div>
        
    <?php endif ?>
    
    <fieldset class="round">
        <legend>Fakk kialakítása</legend>
        <?= form_open(); ?>
            <div class = "span-5">
                <legend class="inline-block">Vélasszon istállót</legend>
                <?= form_dropdown('stock_yard_id', $stockyards, ($_POST && isset($_POST['stock_yard_id']) ? $_POST['stock_yard_id'] : '')); ?>
            </div>
            <div class = "span-6">
                <legend class = "inline-block">Fakkok darabszáma:</legend>
                <input type="text" name = "number_of" value = "<?= $_POST && isset($_POST['number_of']) ? $_POST['number_of'] : ''; ?>" size = "10" />
            </div>
            <div class="span-2" style="margin-top:5px;">
                <button>Mehet</button>
            </div>
        <?= form_close() ?>
    </fieldset>
    
    <?php if (!validation_errors() && isset($is_permitted_to_create_fakks) && $is_permitted_to_create_fakks): ?>
        
        <?php if (isset($_POST['number_of']) && isset($_POST['stock_yard_id'])): ?>
            <fieldset class="round fakk-tmpl-container">
                <?= form_open(); ?>
                <?php for ($i = 0; $i < $_POST['number_of']; $i++) : ?>
                    
                    <div class="span-18 fakk-tmpl">
                        <label for="name">Megnevezés:</label>
                        <input type="text" name = "names[]" value = "" size = "40" />
                        <!-- <a href="javascript:void(0)" class = "delete-fakk-tmpl" >töröl</a> -->
                    </div>
                    
                <?php endfor; ?>
                
                <div class="span-18 fakk-tmpl">
                    <input type="hidden" name = "stock_yard_id" value = "<?= $_POST['stock_yard_id']; ?>" />
                    <input type="hidden" name = "number_of" value = "<?= $_POST['number_of']; ?>" />
                    <button>Mentés</button>
                </div>
                <?= form_close() ?>
            </fieldset>
            
        <?php endif ?>
    <?php else: ?>
        <?php if ($_POST): ?>
            
            <?php if (!isset($is_permitted_to_create_fakks) || !$is_permitted_to_create_fakks): ?>
                <div class="error">
                    A kivállasztott istállóban szerepel olyan fakk ami még tartalmaz jószágot.
                </div>
            <?php endif ?>
        <?php endif ?>
    <?php endif ?>

    <?php if (isset($fakks)): ?>
        <fieldset class="round">
            <legend>Jelenlegi fakkok</legend>
            <table class="bordered-table zebra-striped">
                <thead>
                    <tr>
                        <th>Név</th>
                        <th class="text-center">Létrehozva</th>
                        <th class="text-center">Felszámolva</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($fakks as $item): ?>
                        <tr>
                            <td><?= $item->name; ?></td>
                            <td class="text-center"><?= to_date($item->created); ?></td>
                            <td class="text-center"><?= to_date($item->closed); ?></td>
                            <td>
                                
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </fieldset>
    <?php endif ?>
    
<?php else: ?>
    <div class="span-20 error">
        Nincs istálló az kiválasztott telephelyhez
        <a style="color:#4F4F4F" href="<?= base_url(); ?>stockyard/edit/breeder_site/<?= $this->uri->segment(3); ?>" class="button  " rel="dialog" title = "Új istálló felvitele">új istálló felvitele</a>
    </div>
 <?php endif ?> 
 
<script type="text/javascript">
     $(function() {
         $('body').delegate('.delete-fakk-tmpl', 'click', function() {
             var self = $(this);
             
             self.parent().fadeOut(function() {
                 $(this).remove(); 
                 
                 if (!$('.fakk-tmpl').length) {
                     
                     $('.fakk-tmpl-container').remove();
                 }
             });
             
             
             return false;
         })
     })
 </script> 

