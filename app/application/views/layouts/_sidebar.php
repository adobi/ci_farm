                <ul id = "side-navigation">
                    <?php if (in_array($this->uri->segment(1), array('backgrounddata', 'eggtype', 'chickentype', 'breeder', 'breedersite', 'fakk', 'fakkgroup'))): ?>
                        <?php require_once '_sidebar_backgrounddata.php'; ?>
                    <?php endif ?>
                </ul>