<li>
    <span>›</span>
    <a href="<?= base_url(); ?>breeder/index/priority/asc" <?= $this->uri->segment(1) === 'breeder' || $this->uri->segment(1) === 'breedersite' ? 'class = "selected-sidemenu-item"' : ''?>>Tenyésztők</a>
    
</li>
 
<li>
    <span>›</span>
    <a href="<?= base_url(); ?>cast" <?= $this->uri->segment(1) === 'cast' ? 'class = "selected-sidemenu-item"' : ''?>>Fajok, fajták</a>
</li>
<li>
    <span>›</span>
    <a href="<?= base_url(); ?>eggtype" <?= $this->uri->segment(1) === 'eggtype' ? 'class = "selected-sidemenu-item"' : '' ?>>Tojás típusok</a>
</li>

<li>
    <span>›</span>
    <a href="<?= base_url(); ?>stockyard/index/sidebar" <?= $this->uri->segment(1) === 'stockyard' ? 'class = "selected-sidemenu-item"' : '' ?>>Istállók</a>
</li>
<li>
    <span>›</span>
    <a href="<?= base_url(); ?>delivery/index2" <?= $this->uri->segment(1) === 'delivery' ? 'class = "selected-sidemenu-item"' : '' ?>>Szállítólevelek</a>
</li>
<li>
    <span>›</span>
    <a href="<?= base_url(); ?>chickenstock" <?= $this->uri->segment(1) === 'chickenstock' ? 'class = "selected-sidemenu-item"' : '' ?>>Állományok</a>
</li>
<!-- 
<li>
    <span>›</span>
    <a href="<?= base_url(); ?>stock" <?= $this->uri->segment(1) === 'stock' ? 'class = "selected-sidemenu-item"' : '' ?>>Állományok</a>
</li>

<li>
    <span>›</span>
    <a href="<?= base_url(); ?>machine" <?= $this->uri->segment(1) === 'machine' ? 'class = "selected-sidemenu-item"' : '' ?>>Keltető gépek</a>
</li>
 -->