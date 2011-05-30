


<?php if ($groups): ?>

    <p class = "info">
        <em>
            fakk áthelyezéséhez egyik csoportból a másika, az adott fakk egérrel való mozgatásával történik
        </em>
    </p>

    <?php foreach ($groups as $item): ?>
        <div class = "zebra span-9 round">
            <h3>
                <?= $item['group']->name; ?>
                <?php if ($this->uri->segment(1) === 'egg'): ?>
                    <span class = "sub">- <?= $item['group']->breeder_name; ?> (<?= $item['group']->breeder_site_code; ?>)</span>
                <?php endif ?>
            </h3>
            <div class = "fakks round">
                <div class = "fakks-list" group = "<?= $item['group']->id; ?>">
                    <?php if ($item['fakks']): ?>
                        <?php foreach ($item['fakks'] as $fakk): ?>
                            <p class = "p-list-item yellow round" fakkid = "<?= $fakk->id; ?>" style = "cursor:move;">
                                <?= $fakk->name; ?>
                                <?php if ($this->uri->segment(1) === 'egg'): ?>
                                
                                    <a href = "#" _href="<?= base_url(); ?>stock/for_fakk/<?= $fakk->id; ?>">állományok</a>
                                <?php endif ?>
                                
                                <?php if ($this->uri->segment(1) === 'fakkgroup'): ?>
                                    <a style = "float:right;" href="<?= base_url(); ?>fakk/delete/<?= $fakk->id; ?>">töröl</a>
                                    
                                    <a href="<?= base_url(); ?>stock/for_fakk/<?= $fakk->id; ?>">állományok</a>
                                <?php endif ?>
                            </p>
                        <?php endforeach ?>
                    <?php else: ?>
                        
                    <?php endif ?>
                </div>
                <p style = "margin-bottom:5px;">
                    <a style = "float:none;" rel = "dialog" title = "Új fakk a(z) <?= $item['group']->name; ?> csoporthoz" 
                       href="<?= base_url(); ?>fakk/add_to_group/<?= $item['group']->id; ?>">új fakk</a>
                </p>
            </div>
            <?php if ($this->uri->segment(1) === 'egg'): ?>
                <a href="<?= base_url(); ?>fakkfeed/for_fakk_group/<?= $item['group']->id; ?>" rel = "dialog" dialog_id = "<?= $item['group']->id; ?>" title = "Tápanyagok">tápanyag felvitel</a>
                <a href="<?= base_url(); ?>fakkfeed/list_for_group/<?= $item['group']->id; ?>" rel = "dialog" dialog_id = "<?= $item['group']->id; ?>" title = "Tápanyagok">eddigi bejegyzések</a>
            <?php endif ?>
            
            <?php if ($this->uri->segment(1) === 'fakkgroup'): ?>
                <a href="<?= base_url(); ?>fakkgroup/delete/<?= $item['group']->id; ?>" class = "delete">töröl</a>
                <a href="<?= base_url(); ?>fakkgroup/edit/<?= $item['group']->id; ?>" dialog_id = "<?= $item['group']->id; ?>" rel = "dialog" title = "Fakkcsoport szerkesztése">szerkeszt</a>
            <?php endif ?>
        </div>
    <?php endforeach ?>
<?php endif ?>

<script type="text/javascript">
    $(function() {
        App.FakkSortable();       
    });    
</script>