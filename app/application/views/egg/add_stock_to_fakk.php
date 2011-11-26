<fieldset class = "round">
    
    <?= form_open() ?>
        <p>
            <label for="name" class = "block">Darabszám</label>
            <input type="text" name="piece" value="<?php echo $piece ?>" id="piece" class = "required" data-max = "<?php echo $piece ?>"/>
        </p>
        <p>
            <label for="created" class = "block">Darabszám</label>
            <input type="text" name="created" value="<?php echo date('Y-m-d', time()) ?>" id="created" class = "required datepicker" data-max = "<?php echo $piece ?>"/>
        </p>
        <p>
            <button>Mentés</button>
        </p>
    <?= form_close(); ?>
</fieldset>    

<script type="text/javascript">
    $('[name=piece]').numeric();

    $('[name=piece]').bind('keyup', function(event) {
        var self = $(this);
        
        if (self.val() > self.attr('data-max')) {
            self.val(self.attr('data-max'));
        }
    });
</script>