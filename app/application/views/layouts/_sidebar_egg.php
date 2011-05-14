<li>
    <strong style = "font-size:1.4em">›</strong>
    <a href="<?= base_url(); ?>breeder" <?= $this->uri->segment(1) === 'breeder' ? 'class = "selected-sidemenu-item"' : ''?>>Tenyésztők</a>
    
</li>
<li>
    <strong style = "font-size:1.4em">›</strong>
    <a href="<?= base_url(); ?>breedersite">Tenyésztők telephelyei</a>
    
</li>
<li>
    <strong style = "font-size:1.4em">›</strong>
    <a href="<?= base_url(); ?>eggtype" <?= $this->uri->segment(1) === 'eggtype' ? 'class = "selected-sidemenu-item"' : '' ?>>Tojás típusok</a>
</li>
<li>
    <strong style = "font-size:1.4em">›</strong>
    <a href="<?= base_url(); ?>chickentype" <?= $this->uri->segment(1) === 'chickentype' ? 'class = "selected-sidemenu-item"' : '' ?>>Tyúk típusok</a>
</li>
