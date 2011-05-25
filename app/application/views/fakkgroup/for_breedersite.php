<h2><?= $current_breeder_site->code; ?>/<?= $current_breeder_site->mgszh; ?> fakkcsoportjai</h2>

<p class = "info">
    <em>
        fakk áthelyezéséhez egyik csoportból a másika, az adott fakk egérrel való mozgatásával történik
    </em>
</p>

<p>
    <a href="<?= base_url() ?>fakkgroup/edit/breedersite/<?= $current_breeder_site->id; ?>" dialog_id = "0" rel = "dialog" title = "Fakkcsoport felvitele">új csoport felvitele</a>
</p>

<?php if ($groups): ?>
    <?php foreach ($groups as $item): ?>
        <div class = "zebra span-9 round">
            <h3><?= $item['group']->name; ?></h3>
            <div class = "fakks round">
                <div class = "fakks-list" group = "<?= $item['group']->id; ?>">
                    <?php if ($item['fakks']): ?>
                        <?php foreach ($item['fakks'] as $fakk): ?>
                            <p class = "p-list-item yellow round" fakkid = "<?= $fakk->fakk_id; ?>" style = "cursor:move;">
                                <?= $fakk->fakk_name; ?>
                                <a style = "float:right;" href="<?= base_url(); ?>fakk/delete/<?= $fakk->fakk_id; ?>">töröl</a>
                                <a href="<?= base_url(); ?>stock/for_fakk/<?= $fakk->fakk_id; ?>">állományok</a>
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
            <a href="<?= base_url(); ?>fakkgroup/delete/<?= $item['group']->id; ?>" class = "delete">töröl</a>
            <a href="<?= base_url(); ?>fakkgroup/edit/<?= $item['group']->id; ?>" dialog_id = "<?= $item['group']->id; ?>" rel = "dialog" title = "Fakkcsoport szerkesztése">szerkeszt</a>
        </div>
    <?php endforeach ?>
<?php endif ?>

<script type="text/javascript">
    $(function() {
        $(".fakks-list").sortable({
			connectWith: ".fakks-list",
			stop: function (event, ui) {
			    var el = ui.item,
			        id = el.attr('fakkid'),
			        o = $(event.target).attr('group'),
			        n = el.parents('.fakks-list').attr('group');
			    
			    $.post(App.URL+'fakkingroup/change_group', 
			        {
			            ci_csrf_token:$.cookie('ci_csrf_token'),
			            old_group: o,
			            new_group: n,
			            fakk_id: id
			        }, 
			        function() {
			        
			        }
    		    );
			    
			    //console.log($(e));
			}
		}).disableSelection();        
    })    
</script>