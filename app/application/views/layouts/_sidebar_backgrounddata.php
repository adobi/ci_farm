<li>
    <span>›</span>
    <a href="<?= base_url(); ?>breeder" <?= $this->uri->segment(1) === 'breeder' ? 'class = "selected-sidemenu-item"' : ''?>>Tenyésztők</a>
    
</li>
<!-- 
<li>
    <span>›</span>
    <a href="<?= base_url(); ?>breedersite" <?= $this->uri->segment(1) === 'breedersite' ? 'class = "selected-sidemenu-item"' : ''?>>Tenyésztők telephelyei</a>
    
</li>
 -->
<li>
    <span>›</span>
    <a href="<?= base_url(); ?>eggtype" <?= $this->uri->segment(1) === 'eggtype' ? 'class = "selected-sidemenu-item"' : '' ?>>Tojás típusok</a>
</li>
<li>
    <span>›</span>
    <a href="<?= base_url(); ?>chickentype" <?= $this->uri->segment(1) === 'chickentype' ? 'class = "selected-sidemenu-item"' : '' ?>>Tyúk (1) fajtakódok</a>
</li>

<li>
    <span>›</span>
    <a href="<?= base_url(); ?>stock" <?= $this->uri->segment(1) === 'stock' ? 'class = "selected-sidemenu-item"' : '' ?>>Állományok</a>
</li>

<li>
    <span>›</span>
    <a href="<?= base_url(); ?>machine" <?= $this->uri->segment(1) === 'machine' ? 'class = "selected-sidemenu-item"' : '' ?>>Keltető gépek</a>
</li>
