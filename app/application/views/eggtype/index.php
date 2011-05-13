<p>
    <a href="<?= base_url() ?>eggtype/edit" rel = "dialog" title = "Tojás típus felvitele">új típus felvitele</a>
</p>

<?php if ($eggtypes): ?>
    <?php foreach ($eggtypes as $et): ?>
        <p class = "zebra">
            <strong><?= $et->code ?></strong> - <?= $et->description ?>
            <a href="<?= base_url() ?>eggtype/delete/<?= $et->id ?>" class = "delete">töröl</a>
        </p>
    <?php endforeach ?>
<?php endif ?>

<?php if ($this->session->userdata('validation_error')): ?>
    <script type="text/javascript">
        $(function() {
            $('a[rel=dialog]').trigger('click');
        });
        
    </script>
<?php endif ?>
