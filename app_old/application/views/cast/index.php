
<fieldset class="round">
    <legend>Válasszon Fajt</legend>
    
    <div class="span-19">
        <?= form_dropdown('cast_id', $items, $this->session->userdata('selected_cast'), 'id = "cast_id"'); ?>
        
        <a href="<?= base_url() ?>cast/edit" class="button" dialog_id = "0" rel = "dialog" title = "Állatfaj felvitele">új állatfaj felvitele</a>
    </div>
    
    <?php if ($this->session->userdata('selected_cast')): ?>
        <div class="span-19 text-right">
            <a href="<?= base_url(); ?>cast/edit/<?= $this->session->userdata('selected_cast'); ?>" class="button fl" rel="dialog">szerkeszt</a>
            <a href="<?= base_url(); ?>cast/delete/<?= $this->session->userdata('selected_cast'); ?>" class="delete button fr">töröl</a>
        </div>
    <?php endif ?>
    
</fieldset>

<?php if ($this->session->userdata('selected_cast')): ?>
    
    <fieldset class="round">
        <legend>Fajták</legend>
        <p>
            <a style="float:none;" href="<?= base_url(); ?>casttype/edit/cast/<?= $this->session->userdata('selected_cast'); ?>" class="button  " rel="dialog" title = "Új fajta felvitele">új fajta felvitele</a>
        </p>
        
        <?php if ($types): ?>
                <?php if ($types): ?>
                    <?php foreach ($types as $item): ?>
                        <div class="span-18 zebra">
                            <div class="span-12">
                                <p><strong><?= $item->code; ?> - <?= $item->name ?></strong></p>
                            </div>                
                            <div class="span-5 last text-right">    
                                <a href="<?= base_url(); ?>casttype/edit/<?= $item->id; ?>" class="button  " rel = "dialog" title = "<?= $item->name; ?> szerkesztése">szerkeszt</a>
                                <a href="<?= base_url(); ?>casttype/delete/<?= $item->id; ?>" class="button   delete">töröl</a>
                            </div>                
                        </div>
                    <?php endforeach ?>
                <?php endif ?>
          
        <?php else: ?>
            <p class="message-info">Nincs adat</p> 
                
        <?php endif ?>
    </fieldset> 
    
<?php endif ?>    

<!-- 
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
                        
                        <a class="button   delete" href="<?= base_url() ?>cast/delete/<?= $item->id ?>">töröl</a>
                    <?php endif ?>
                    <a class="button  " href="<?= base_url() ?>cast/edit/<?= $item->id ?>" dialog_id = "<?= $item->id ?>" rel = "dialog" title = "Állatfaj szerkesztése">szerkeszt</a>

                </div>
                <fieldset class="inner-fieldset">
                    <legend>Fajták</legend>
                    <p>
                        <a style="float:none;" href="<?= base_url(); ?>casttype/edit/cast/<?= $item->id; ?>" class="button  " rel="dialog" title = "Új fajta felvitele">új fajta</a>
                    </p>
                    
                    <?php if ($item->cast_types): ?>
                        <?php foreach ($item->cast_types as $jtem): ?>
                            <div class="span-17 zebra">
                                <p>
                                    <strong style="float:left"><?= $jtem->name; ?></strong>
                                    <a href="<?= base_url(); ?>casttype/delete/<?= $jtem->id; ?>" class="button   delete">töröl</a>
                                    <a href="<?= base_url(); ?>casttype/edit/<?= $jtem->id; ?>" class="button  " rel = "dialog" title = "<?= $jtem->name; ?> szerkesztése">szerkeszt</a>
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
 -->
  