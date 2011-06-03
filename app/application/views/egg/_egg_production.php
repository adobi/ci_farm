<table class = "inner-table">
    <thead>
        <tr>
            <td></td>
            <td>Kicsi</td>
            <td>Nagy</td>
            <td>Közepes</td>
        </tr>
    </thead>
    <tbody>
        <?php for ($j = 0; $j < 7; $j++) : ?>
            <tr>
                <td class = "td-first">Fakk <?= $j ?></td>
                <td>10</td>
                <td>20</td>
                <td>5</td>
            </tr>
        <?php endfor; ?>
    </tbody>
</table>
