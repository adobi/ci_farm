<li>
    <a href="<?= base_url(); ?>education/index2" <?= $this->uri->segment(1) === 'education' && (!$this->uri->segment(2) || $this->uri->segment(2) === 'index') ? 'class = "selected-sidemenu-item"' : ''?>>Betelepítés</a>
</li>
<li>
    <a href="<?php echo base_url() ?>education/log2" <?php echo $this->uri->segment(2) === 'log' ? 'class="selected-sidemenu-item"':'' ?>>Nevelési napló</a>
</li>
