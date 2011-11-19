<?php if ($items): ?>

    <?= $template['partials']['delivery_item'] ?>

<?php else: ?>
    <div class="error" style="clear:left;">Nincs ilyen szállítólevél</div>
<?php endif ?>