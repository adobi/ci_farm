<table class = "inner-table">
    <thead>
        <tr>
            <td></td>
            <td colspan = "2">Elhalt</td>
            <td colspan = "2">Selejt</td>
        </tr>
        <tr>
            <td></td>
            <td>Jérce</td>
            <td>Kakas</td>
            <td>Jérce</td>
            <td>Kakas</td>
        </tr>
    </thead>
    <tbody>
        <?php for ($k = 0; $k < 7; $k++) : ?>
            <tr>
                <td class = "td-first">fakk <?= $k ?></td>
                <td>10</td>
                <td>20</td>
                <td>20</td>
                <td>30</td>
            </tr>
        <?php endfor; ?>
    </tbody>
</table>
