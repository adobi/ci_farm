
    <?php if ($items): ?>
        <h2>Összsen: <?php echo $items['total_piece'] ?> darab</h2>
        <?php foreach ($items['items'] as $item): ?>
            <?= form_open(base_url().'egg/edit_stock_in_fakk/'.$item->id) ?>
            <fieldset class="round">
                
                <legend>Állomány: <?php echo $item->stock_code ?></legend>

                <p>
                    <label for="name" class = "block">Darabszám</label>
                    <input type="text" name="piece" value="<?php echo $item->piece ?>" id="piece" class = "required" data-max = "<?php echo $item->max_piece ?>"/>
                </p>
                <p>
                    <label for="created" class = "block">Dátum</label>
                    <input type="text" name="created" value="<?php echo to_date($item->created) ?>" id="created" class = "required datepicker"/>
                </p>
                <p>
                    <button>Mentés</button>
                </p>
            </fieldset>
            <?= form_close(); ?>
        <?php endforeach ?>
    <?php endif ?>

<script type="text/javascript">
    $('[name=piece]').numeric();
    
    $('[name=piece]').bind('keyup', function(event) {
        var self = $(this);
        
        if (parseInt(self.val(), 10) > parseInt(self.attr('data-max'), 10)) {
            self.val(self.attr('data-max'));
        }
    });
    
    
    
</script>